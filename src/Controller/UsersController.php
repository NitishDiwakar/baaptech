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
     
        /*$user = $this->Users->get($id, [
            'contain' => ['Articles'],
        ]);*/
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // echo $actual_link; exit;

        // get last segment of url
        $last_segment = basename(parse_url($url, PHP_URL_PATH));
        $user_id = $last_segment;
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM users WHERE 
            is_deleted = 0
        AND id = "'.$user_id.'"
         ');
        $user = $stmt ->fetchAll('assoc');
        $this->set(compact('user'));
        // print_r($user); exit;

        // get discussions by user
        $stmt = $conn->execute('SELECT * FROM f_discussions
            INNER JOIN f_categories ON f_discussions.fd_cat = f_categories.fc_id
            INNER JOIN users ON f_discussions.fd_user_id = users.id
            WHERE 
            f_discussions.fd_is_delete = 0
            AND users.is_banned = 0 
            AND users.is_deleted = 0
            AND users.id = '.$last_segment.' 
            ORDER BY f_discussions.fd_id DESC
         ');
        $all_discussions = $stmt ->fetchAll('assoc');
        $this->set(compact('all_discussions'));
        // end get discussions by user

        // Count discussion posted by user

        $stmt = $conn->execute('SELECT COUNT(*) FROM f_discussions
            WHERE 
            f_discussions.fd_is_delete = 0
            AND fd_user_id = '.$last_segment.' 
         ');
        $total_discussions = $stmt ->fetchAll('assoc');
        $this->set(compact('total_discussions'));

        // end Count discussion posted by user


        //$this->set(compact('user'));
        $this->viewBuilder()->setLayout('custom_home');
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


    // Ban user
    public function banUser()
    {
        if($_GET['id'])
        {
            // check admin
            $user_id = $this->request->getSession()->read('user_id');
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT id, user_level FROM users
            WHERE 
            id = "'.$user_id.'" ');
            $user_l = $stmt ->fetchAll('assoc');
            $user_level = $user_l[0]['user_level'];

            // echo $user_level;
            if($user_level == 1)
            {
                $fd_id = $_GET['id'];
                $stmt = $conn->execute('UPDATE users 
                    SET is_banned = 1
                WHERE 
                id = "'.$fd_id.'" ');

                $this->Flash->custom_success(__('User banned.'));
                return $this->redirect(['action' => '/view/'.$fd_id.'']);

            }

            // end check admin
            
        }
        
        exit;
    } // end ban user


    // password reset
    public function passwordReset()
    {
        // $user = $this->Users->newEmptyEntity();
        $this->viewBuilder()->setLayout('custom_home');
        if ($this->request->is('post')) 
        {
            $email    = $this->request->getData('email');
            // Check if there is an account with above email
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM users WHERE email = "'.$email.'"
             ');
            $results = $stmt ->fetchAll('assoc');
            if(!empty($results))
            {
                // $user_email = $results[0]["email"];
                // echo "user found"; exit;
                $user_email = $results[0]["email"];
                $user_id = $results[0]["id"];
                $otp = random_int(100000, 999999);
                $otp = strval($otp);
                // insert above details in pass_res and send otp to email
                $stmt = $conn->execute('
                INSERT INTO pass_res (`user_id`,`otp`, `created`)
                VALUES 
                ("'.$user_id.'", "'.$otp.'", NOW())
                ');

                // store user_id in session
                $this->request->getSession()->write('temp_uid', $user_id);

                mail($email,"OTP to reset password",$otp);
                return $this->redirect(['action' => 'verifyOtp']);

            } // end if not empty result
            if(empty($results))
            {
                // $user_email = $results[0]["email"];
                // echo "user not found"; exit;
                $this->Flash->custom_error(__('User not found.'));
                return $this->redirect(['action' => 'passwordReset']);
            }
        }

    }
    // end password reset

    // verify otp
    public function verifyOtp()
    {
        $this->viewBuilder()->setLayout('custom_home');

        if ($this->request->is('post')) 
        {
            $otp = $this->request->getData('otp');
            $temp_uid = $this->request->getData('temp_uid');

            // verify otp
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM pass_res WHERE otp = "'.$otp.'"
             ORDER BY id DESC LIMIT 1 ');
            $results = $stmt ->fetchAll('assoc');
            if(!empty($results))
            {
                // echo "otp matched"; exit;
                // If OTP matched redirect to enter new password page
                $temp_otp = $this->request->getSession()->write('temp_otp', $otp);
                return $this->redirect(['action' => 'passwordResetNewPassword']);
            }

            if(empty($results))
            {
                // echo "otp not matched"; exit;
                $this->Flash->custom_error(__('Wrong OTP.'));
                return $this->redirect(['action' => 'verifyOtp']);
            }


        }
    }
    // end verify otp

    // password reset retype
    public function passwordResetNewPassword()
    {
        $this->viewBuilder()->setLayout('custom_home');

        if ($this->request->is('post')) 
        {

            $password = $this->request->getData('password');
            $password_r = $this->request->getData('password_r');
            if($password !== $password_r)
            {
                $this->Flash->custom_error(__('Please type same password in both fields.'));
                return $this->redirect(['action' => 'passwordResetNewPassword']);
            }

        if($password == $password_r)
        {
            $session_otp = $this->request->getSession()->read('temp_otp');
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT id,user_id FROM pass_res WHERE otp = "'.$session_otp.'" ');
            $results = $stmt ->fetchAll('assoc');

            $id_of_user = $results[0]['user_id'];

            $pass_new = md5($password);
            $stmt = $conn->execute('UPDATE users 
                    SET password = "'.$pass_new.'"
                WHERE 
                id = "'.$id_of_user.'" ');

                $this->Flash->custom_success(__('Password changed successfully.'));
                return $this->redirect(['action' => 'login']);
        } // end if pass = pass_r


        }

    }
    // end password reset retype



}
