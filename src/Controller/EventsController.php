<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM events WHERE is_deleted = 0
            ORDER BY id DESC
             ');
            $results = $stmt ->fetchAll('assoc');
            $this->set(compact('results'));

        $this->viewBuilder()->setLayout('custom_home');
       
    }

    public function view($id = null)
    {
        // $user = $this->Users->get($id, [
        //     'contain' => ['Articles'],
        // ]);
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // echo $actual_link; exit;

        // get last segment of url
        $last_segment = basename(parse_url($url, PHP_URL_PATH));
        // echo $last_segment; exit;
        // get second last segment of url
        $second_last_segment = basename(dirname($url));

        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM events WHERE is_deleted = 0
        AND id = "'.$second_last_segment.'"
         ');
        $results = $stmt ->fetchAll('assoc');
        $this->set(compact('results'));

        // print_r($results);


        $this->viewBuilder()->setLayout('custom_home');
        // $this->set(compact('user'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    // Login
    

}
