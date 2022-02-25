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
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        exit;
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $token = bin2hex(random_bytes(16));


        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            //n
            // $post_data= $this->request->data;
            // $email = $this->request->getData('email'); 
            $password = $this->request->getData('password'); 
            $password = md5($password);
            $email    = $this->request->getData('email');


            // $this->request->data['User']['otp'] = "123";
            // print_r($post_data);
            // echo $passowrd;
            $otp = random_int(100000, 999999);
            $token = bin2hex(random_bytes(16));
            $this->request->getSession()->write('token', $token);

            //en
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->otp = $otp;
            $user->token = $token;
            $user->password = $password;
            if ($this->Users->save($user)) {
                // Sent otp to user
                        // $msg = "Hello";
                        $msg = $otp;
                        $msg = strval($msg);
                        // mail("user@example.com","OTP",$msg);
                        mail($email,"OTP to verify email",$msg);
                    //
                $this->Flash->custom_success(__('OTP sent to your email. Please check spam folder if not received.'));

                return $this->redirect(['action' => 'verify_email']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

        // Set custom layout
        $this->viewBuilder()->setLayout('custom');
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // Login
    public function login()
    {
        $this->viewBuilder()->setLayout('custom_home');
// $session->destroy();

        // Destroy session
        // $this->request->getSession()->destroy();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            //n

            // $post_data= $this->request->data;
            $email = $this->request->getData('email'); 
            $password = $this->request->getData('password');
            $password = md5($password); 

            // echo $passowrd;
            

            // $query = $users
            // ->find()
            // ->select(['id', 'name', 'email', 'otp'])
            // ->where(['id =' => 3]);
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM users WHERE email = "'.$email.'"
            AND password = "'.$password.'" AND email_verified = 1 ');
            $results = $stmt ->fetchAll('assoc');

            // get email of user
            // $user_email = $results[0]["email"];
            if(!empty($results))
            {
                $user_email = $results[0]["email"];
            }

            if(!isset($user_email))
            {
                // echo "No user email";
                // $this->redirect(['action' => '']);
                $this->Flash->custom_error(__('Username or password is wrong.'));

            }
            // get user id of user
            $user_id = $results[0]["id"];
            if(!empty($user_email))
            {
                // send logged in user to dashboard
                $this->request->getSession()->write('user_id', $user_id);
                // echo "success";

                $this->redirect(['action' => 'dashboard']);
                
            }
            // $this->Flash->error(__('Unable to login. Please, try again.'));

            // echo count($results);
            // $row_cnt = $results->num_rows;
            // $num_rows = mysqli_num_rows($results);
            // echo $num_rows;
            // if (!empty($results) && $results->num_rows > 0) {
            // }




            // Write session
            // $this->request->getSession()->write('user_id', 10);

            /*print_r($results);
            exit;*/

            //en
            /*$user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));*/
        }
        // $this->set(compact('user'));
    }

    // Logout
    public function logout()
    {
        $this->request->getSession()->destroy();
        // check if token set
        // if token not set then set token expired message

        $this->Flash->custom_success(__('You are logged out.'));
        return $this->redirect(['action' => 'login']);
        // exit;
    }

    public function verifyEmail()
    {
        $this->viewBuilder()->setLayout('custom');

        if ($this->request->is('post')) 
        {
            $otp = $this->request->getData('otp');
            // echo $otp;
            $token = $this->request->getSession()->read('token');

            // if otp is right
            if(!empty($token))
            {
                $conn = ConnectionManager::get('default');
                $stmt = $conn->execute('UPDATE users 
                    SET email_verified = 1
                    WHERE 
                    token = "'.$token.'" AND  
                    otp = "'.$otp.'"
                    ');

                 $this->Flash->custom_success(__('Email verified. Please Login to continue. '));
                 return $this->redirect(['action' => 'login']);

                // $results = $stmt ->fetchAll('assoc');

                // if otp is wrong
                /*if($stmt == TRUE)
                {
                    echo "updated";
                }*/
            }
           /* $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM users WHERE email = "'.$email.'"
            AND password = "'.$password.'" AND email_verified = 1 ');
            $results = $stmt ->fetchAll('assoc');*/

            exit;
        }

    }

    public function dashboard()
    {

        $user_id = $this->request->getSession()->read('user_id');
        if(empty($user_id))
        {
            return $this->redirect(['action' => 'login']);
            $this->Flash->custom_error(__('Please login to continue. '));
        }

        if ($this->request->is('post')) 
        {
            // echo "form submitted";
            $full_name = $this->request->getData('full_name');
            $email = $this->request->getData('email');
            $mobile = $this->request->getData('mobile');
            $binanceaddress = $this->request->getData('binanceaddress');
            $state = $this->request->getData('state');
            $city = $this->request->getData('city');
            $amt_donated  = $this->request->getData('amt_donated');
            $bank_refno  = $this->request->getData('bank_refno');
            $message = $this->request->getData('message');

            // echo $city; exit;

            $user_id = $this->request->getSession()->read('user_id');

            // insert
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('
                INSERT INTO donation (`full_name`,`email`, `mobile`, `binanceaddress`, `state`, `city`, `user_id`, `amt_donated`, `bank_refno`, `message`)
                VALUES 
                ("'.$full_name.'", "'.$email.'", "'.$mobile.'", "'.$binanceaddress.'", "'.$state.'", "'.$city.'", "'.$user_id.'", "'.$amt_donated.'", "'.$bank_refno.'", "'.$message.'")
                ');
            $this->Flash->custom_success(__('Thanks for your support.'));



            // echo $email;
 
            // exit;
        }

    $this->viewBuilder()->setLayout('custom');
        // exit;
    }

    public function donations()
    {

        // check if user is logged in
        $user_id = $this->request->getSession()->read('user_id');
        if(empty($user_id))
        {
            return $this->redirect(['action' => 'login']);
            $this->Flash->custom_error(__('Please login to continue. '));
        }

        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM donation WHERE user_id = "'.$user_id.'" ');
        $donations = $stmt ->fetchAll('assoc');
    
        $this->set(compact('donations'));

        $this->viewBuilder()->setLayout('custom'); 
    }

    public function usernamechecker()
    {

        echo "hola";
        if ($this->request->is('post')) 
        {
            $username = $this->request->getData('username');
        echo "hola";
        // $conn = ConnectionManager::get('default');
        // $stmt = $conn->execute('SELECT * FROM donation WHERE user_id = "'.$user_id.'" ');
        }

        $this->viewBuilder()->setLayout('custom');
    }   



}
