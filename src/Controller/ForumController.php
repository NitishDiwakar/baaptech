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
class ForumController extends AppController
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

            // Get Categories
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM f_categories WHERE fc_is_deleted = 0 
                AND fc_id != 1 
                ORDER BY fc_name
                 ');
            $categories = $stmt ->fetchAll('assoc');
            $this->set(compact('categories'));
            // end get categories

            // forum post
            if ($this->request->is('post'))
            {

                // check user auth
                $user_id = $this->request->getSession()->read('user_id');
                    // Check if user is logged in
                   if($user_id == NULL)
                    {
                        echo "Please login to add discussion"; exit;
                    }
                    // Check if user is banned
                    if($user_id !== NULL)
                    {
                        $conn = ConnectionManager::get('default');
                        $stmt = $conn->execute('SELECT id, is_banned FROM users WHERE id = "'.$user_id.'" ');
                        $user = $stmt ->fetchAll('assoc');
                        // print_r($user); exit;
                        $banned_status = $user[0]['is_banned'];
                        if($banned_status == 1)
                        {
                            $this->Flash->custom_error(__('You are banned from posting new discussions.'));

                            return $this->redirect(['action' => 'index']);
                        }
                    }
                // end check user auth
                // Get form data
                $cat = $this->request->getData('cat');
                $fd_title = $this->request->getData('fd_title');
                $fd_post = $this->request->getData('fd_post');
                // echo $fd_title; exit; 
                /*echo $cat . "<br>"; 
                echo $fd_title . "<br>"; 
                echo $fd_post; exit; */

                $conn = ConnectionManager::get('default');
                $stmt = $conn->execute('
                INSERT INTO f_discussions (`fd_user_id`,`fd_title`, `fd_cat`, `fd_post`, `fd_created`)
                VALUES 
                ("'.$user_id.'", "'.$fd_title.'", "'.$cat.'", "'.$fd_post.'", NOW())
                ');
            $this->Flash->custom_success(__('Discussion Posted.'));
            return $this->redirect(['action' => 'index']);


            }
            // end forum post

    // Get all discussions
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM f_discussions
            INNER JOIN f_categories ON f_discussions.fd_cat = f_categories.fc_id
            INNER JOIN users ON f_discussions.fd_user_id = users.id
            WHERE 
            f_discussions.fd_is_delete = 0
            AND users.is_banned = 0 
            AND users.is_deleted = 0 
            ORDER BY f_discussions.fd_id DESC
         ');
        $all_discussions = $stmt ->fetchAll('assoc');
        $this->set(compact('all_discussions'));
         
    // endGet discussions

        $this->viewBuilder()->setLayout('custom_home');
       
    } // end index()

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
    

    // test
    public function test()
    {
        // echo "test"; exit;
        if ($this->request->is('post')) 
        {
            echo "form submitted";
        }
         $this->viewBuilder()->setLayout('custom_home');
    }

    public function testing()
    {
        // echo "test"; exit;
        if ($this->request->is('post')) 
        {
            $txt_fname = $this->request->getData('txt_fname');
            // echo "form submitted";
             $conn = ConnectionManager::get('default');
             $stmt = $conn->execute('INSERT INTO f_discussions (fd_title) VALUES 
                ("'.$txt_fname.'")
         ');

            echo $txt_fname . " form submitted";
        }
         $this->viewBuilder()->setLayout('custom_home');
    }

    // Get forum categories
    public function categories()
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM f_categories WHERE fc_is_deleted = 0
             ');
        $categories = $stmt ->fetchAll('assoc');
        $this->set(compact('categories'));

    }
    // End get forum categories
    

}
