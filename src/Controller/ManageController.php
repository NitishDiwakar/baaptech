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
        // echo $this->request->getSession()->read('admin_id');

        $admin_id = $this->request->getSession()->read('admin_id');

        /*if(isset($admin_id))
        {

        }*/

        if(!isset($admin_id))
        {
            echo "access denied!";
            exit;
        }

        // Count total users
        $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT COUNT(*) as total FROM `users`  WHERE is_deleted = 0 AND user_level = 0 AND email_verified = 1 
             ');
            $total_users = $stmt ->fetchAll('assoc');
            // echo $total_users['count'];
            $total_users = $total_users[0]['total'];
            // print_r($total_users);
            $this->set(compact('total_users'));

        // Count pending gruop submissions
            $stmt = $conn->execute('SELECT COUNT(*) as total FROM `groups`  WHERE  is_approved = 0 
             ');
            $pending_groups = $stmt ->fetchAll('assoc');
            // echo $total_users['count'];
            $total_pending_groups = $pending_groups[0]['total'];
            // print_r($total_users);
            $this->set(compact('total_pending_groups'));

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

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM users WHERE 
                email_verified = 1 AND user_level != 1 AND is_deleted = 0
             ');
            $results = $stmt ->fetchAll('assoc');
            $this->set(compact('results'));


        $this->viewBuilder()->setLayout('custom_manage');

    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function usersDelete()
    {
        // echo "string";

        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        if(isset($admin_id))
        {
            $user_id = $_GET['id'];
            // echo $user_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE users 
                    SET is_deleted = 1
                    WHERE 
                    id = "'.$user_id.'" 
                    ');

                 $this->Flash->custom_success(__('User Deleted. '));
                 return $this->redirect(['action' => 'users']);


        }

        if(!isset($admin_id))
        {
            echo "You are not allowed for this action";
            exit;
        }

        
    }

// n
        public function groupsVerify()
    {
        // echo "string";

        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        if(isset($admin_id))
        {
            $group_id = $_GET['id'];
            // echo $user_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE groups 
                    SET is_approved = 1
                    WHERE 
                    id = "'.$group_id.'" 
                    ');

                 $this->Flash->custom_success(__('Group Approved. '));
                 return $this->redirect(['action' => 'groups']);


        }

        if(!isset($admin_id))
        {
            echo "You are not allowed for this action";
            exit;
        }

        
    }
// en


public function groups()
    {

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM groups INNER JOIN states ON 
                groups.state_id = states.s_id
             WHERE 
                groups.is_approved = 0
                ORDER BY groups.id ASC
             ');
            $unapproved_groups = $stmt ->fetchAll('assoc');
            $this->set(compact('unapproved_groups'));

            // Approved groups
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM groups INNER JOIN states ON 
                groups.state_id = states.s_id
             WHERE 
                groups.is_approved = 1
                ORDER BY groups.id ASC
             ');
            $approved_groups = $stmt ->fetchAll('assoc');
            $this->set(compact('approved_groups'));


        $this->viewBuilder()->setLayout('custom_manage');

    }
    

    // Login
    

}
