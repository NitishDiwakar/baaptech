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
class HomeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('custom_home');
       
    }

    // Method for testing custom functions
    public function test()
    {
        $this->viewBuilder()->setLayout('custom_home');
       
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    // Login

    // send sugg start
    public function sendsug()
    {
 
        if ($this->request->is('post')) 
        {
            // echo "test"; exit;
            $name = $this->request->getData('name');
            $message = $this->request->getData('msg');
            $ip = $_SERVER['REMOTE_ADDR'];

            
            // echo "form submitted";
             $conn = ConnectionManager::get('default');
             $stmt = $conn->execute('INSERT INTO suggestions (name, message, sender_ip, created) VALUES 
                ("'.$name.'", "'.$message.'", "'.$ip.'", NOW())
         ');

            // echo "working";
            // echo $fcm_text . " <a href='' class='float-end text-red'> Add more reply</a>";
            echo '<div class="text-success mb-3">Thanks for your suggestion</div>';
            
            // echo $txt_fname . " form submitted";
        }

         $this->viewBuilder()->setLayout('custom_home');
        // exit;
    }
    // send sugg end
    

}
