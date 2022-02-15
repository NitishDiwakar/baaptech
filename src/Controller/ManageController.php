<?php
declare(strict_types=1);

namespace App\Controller;
ob_start();
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManageController extends AppController
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

    public function login()
    {
        // $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $email = $this->request->getData('email'); 
            $password = $this->request->getData('password');
            $password = md5($password);
            // echo $password;

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM users WHERE email = "'.$email.'"
            AND password = "'.$password.'" AND email_verified = 1 
            AND user_level = 1
             ');
            $results = $stmt ->fetchAll('assoc');

            // get email
            if(!empty($results))
            {
                $user_email = $results[0]["email"];
                $admin_id = $results[0]["id"];
            }

            // if no record found then redirect
            if(!isset($user_email))
            {
                // echo "No user email";
                // $this->redirect(['action' => '']);
                $this->Flash->custom_error(__('Email or password is wrong.'));

            }

            if(!empty($user_email))
            {
                $this->request->getSession()->write('admin_id', $admin_id);

                $this->redirect(['action' => 'dashboard']);
                // echo "hello"; exit;
            }
            

            
            
        }
        
        $this->viewBuilder()->setLayout('custom_manage_login');

    }


    public function dashboard()
    {
        $this->viewBuilder()->setLayout('custom_manage');
    }

    public function logout()
    {
        $this->request->getSession()->destroy();

        $this->Flash->custom_success(__('You are logged out.'));
        return $this->redirect(['action' => 'login']);
        // exit;
    }

    public function users()
    {


        $this->viewBuilder()->setLayout('custom_manage');

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
