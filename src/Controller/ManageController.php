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


        /*if(!isset($admin_id))
        {
            echo "access denied!";
            exit;
        }*/

        // Verify admin
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
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

        // Count verified donations
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT SUM(amt_donated) FROM `donation` WHERE is_approved = 1 
             ');
            $total_donation = $stmt ->fetchAll('assoc');
            // echo $total_users['count'];
            // print_r($total_donation); 
            // echo $total_donation[0]['SUM(amt_donated)'];
            $total_donation = $total_donation[0]['SUM(amt_donated)'];
            // print_r($total_users);
            $this->set(compact('total_donation'));

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
                AND groups.is_deleted = 0
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
                AND groups.is_deleted = 0
                ORDER BY groups.id ASC
             ');
            $approved_groups = $stmt ->fetchAll('assoc');
            $this->set(compact('approved_groups'));


        $this->viewBuilder()->setLayout('custom_manage');

    }
    

    // Donations

    public function donationsPending()
    {
        // Verify admin
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }
        // en

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT * FROM `donation` WHERE is_approved = 0 AND is_deleted = 0
             ');
            $donations_pending = $stmt ->fetchAll('assoc');
            $this->set(compact('donations_pending'));

            // Approved groups


        $this->viewBuilder()->setLayout('custom_manage');

    }

    // Delete Donations
    public function donationsDelete()
    {
        // echo "string";

        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        // echo $admin_id; exit;
        if(isset($admin_id))
        {
            $donation_id = $_GET['id'];
            // echo $donation_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE donation 
                    SET is_deleted = 1
                    WHERE 
                    did = "'.$donation_id.'" 
                    ');

                 $this->Flash->custom_success(__('Entry deleted. '));
                 return $this->redirect(['action' => 'donationsPending']);


        }

        if(!isset($admin_id))
        {
            echo "Something went wrong";
            exit;
        }
     
    } // end delete donation

    // Verify donation
    public function donationsVerify()
    {

        // admin verify
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }
        // echo "string";


    $conn = ConnectionManager::get('default');
    $stmt = $conn->execute('SELECT * FROM `donation` WHERE is_approved = 1 AND is_deleted = 0
     ');
    $donations_pending = $stmt ->fetchAll('assoc');
    $this->set(compact('donations_pending'));



        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        // echo $admin_id; exit;
       if(isset($_GET['id']))
       {
         if(isset($admin_id))
        {
            $donation_id = $_GET['id'];
            // echo $donation_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE donation 
                    SET is_approved = 1
                    WHERE 
                    did = "'.$donation_id.'" 
                    ');

                 $this->Flash->custom_success(__('Donation verified. '));
                 return $this->redirect(['action' => 'donations_verify']);


        }

        if(!isset($admin_id))
        {
            echo "Something went wrong";
            exit;
        }
       }

        $this->viewBuilder()->setLayout('custom_manage');
    } // end verify donation

    // Remove Group
    public function groupsDelete()
    {
        // echo "string";


        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        // echo $admin_id; exit;
       if(isset($_GET['id']))
       {
        $group_id = $_GET['id'];
        // echo $group_id; exit;
         if(isset($admin_id))
        {
            $donation_id = $_GET['id'];
            // echo $donation_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE groups 
                    SET is_deleted = 1
                    WHERE 
                    id = "'.$group_id.'" 
                    ');

                 $this->Flash->custom_success(__('Group deleted successfully. '));
                 return $this->redirect(['action' => 'groups']);


        }

        if(!isset($admin_id))
        {
            echo "Something went wrong";
            exit;
        }
       }

        $this->viewBuilder()->setLayout('custom_manage');
    } // end remove group


    // Undo approve
    public function groupsUnapprove()
    {
        // echo "string";


        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        // echo $admin_id; exit;
       if(isset($_GET['id']))
       {
        $group_id = $_GET['id'];
        // echo $group_id; exit;
         if(isset($admin_id))
        {
            $donation_id = $_GET['id'];
            // echo $donation_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE groups 
                    SET is_approved = 0
                    WHERE 
                    id = "'.$group_id.'" 
                    ');

                 $this->Flash->custom_success(__('Group is not verified anymore. '));
                 return $this->redirect(['action' => 'groups']);


        }

        if(!isset($admin_id))
        {
            echo "Something went wrong";
            exit;
        }
       }

        $this->viewBuilder()->setLayout('custom_manage');
    } // end undo approve group


    // Events add
    public function eventAdd()
    {

        // admin verify
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }

        if ($this->request->is('post')) 
        {
            // echo "form submitted"; exit;
            $title = $this->request->getData('title'); 
            $slug  = $this->request->getData('slug'); 
            $start_date  = $this->request->getData('start_date'); 
            $end_date  = $this->request->getData('end_date'); 
            $message  = $this->request->getData('message'); 
            // echo $start_date; exit;

            // image processing
            $pic= ($_FILES['image']['name']);
            // echo $pic; exit;
            // Check if if file type is valid image
            $allowed =  array('png' ,'jpg');
            $ext     = pathinfo($pic, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) 
            {
                // $_SESSION['msg'] = '<div class="alert alert-danger"><i class="fa fa-times"></i> Only .jpg and .png extenstions are allowed.</div>';
                // echo "<script>window.location = '../blog-add.php'</script>";
                echo "Invalid image type";
                // Redirect with invalid image message
                exit();
            }
            // echo "valid image"; exit;s 
            $date = date('Y-m-d h:i:s');
            $date = strtotime($date);

            $pic =  $date . '_' . $pic;
            // $target_dir = "/img/uploads/events";
            $target_dir = "img/uploads/events/";
            // echo $target_dir; exit;

            // $target_dir = "../uploads/blogs/";
            $target_file = $target_dir . $pic;
            // echo $target_file; exit;
            // mkdir("halla"); exit;
          move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
          // exit;
            // end image processing

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('INSERT INTO events (title, slug, image, start_date, end_date, message, created) VALUES  
                ("'.$title.'", "'.$slug.'", "'.$pic.'", "'.$start_date.'", "'.$end_date.'", "'.$message.'", NOW())
             ');

            $this->Flash->custom_success(__('Event added.'));
            $this->redirect(['action' => 'eventAdd']);

        }

            
            // $results = $stmt ->fetchAll('assoc');
            // $this->set(compact('results'));


        $this->viewBuilder()->setLayout('custom_manage');

    } // end event add

    // Events
    public function events()
    {

        // admin verify
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }

        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM events WHERE 
            is_deleted = 0
            ORDER BY id DESC
         ');
        $results = $stmt ->fetchAll('assoc');
        $this->set(compact('results'));
        $this->viewBuilder()->setLayout('custom_manage');
       
    } // end events

    // Delete events
    public function eventsDelete()
    {
        // echo "string";

        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        if(isset($admin_id))
        {
            $event_id = $_GET['id'];
            // echo $user_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE events 
                    SET is_deleted = 1
                    WHERE 
                    id = "'.$event_id.'" 
                    ');

                 $this->Flash->custom_success(__('Event Deleted. '));
                 return $this->redirect(['action' => 'events']);


        }

        if(!isset($admin_id))
        {
            echo "You are not allowed for this action";
            exit;
        }

        
    }

    // Edit events
     public function eventEdit()
    {

        // admin verify
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }

        // Fill text with event details
        $event_id = $_GET['id'];
        // echo $event_id;
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM events WHERE 
            id = "'.$event_id.'"
         ');
        $results = $stmt ->fetchAll('assoc');
        $this->set(compact('results'));
        // en

        if ($this->request->is('post')) 
        {
            // echo "form submitted"; exit;
            $title = $this->request->getData('title'); 
            $slug  = $this->request->getData('slug'); 
            $start_date  = $this->request->getData('start_date'); 
            $end_date  = $this->request->getData('end_date'); 
            $message  = $this->request->getData('message'); 
            // echo $start_date; exit;

            // image processing
            /*$pic= ($_FILES['image']['name']);
            // echo $pic; exit;
            // Check if if file type is valid image
            $allowed =  array('png' ,'jpg');
            $ext     = pathinfo($pic, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) 
            {
                // $_SESSION['msg'] = '<div class="alert alert-danger"><i class="fa fa-times"></i> Only .jpg and .png extenstions are allowed.</div>';
                // echo "<script>window.location = '../blog-add.php'</script>";
                echo "Invalid image type";
                // Redirect with invalid image message
                exit();
            }
            // echo "valid image"; exit;s 
            $date = date('Y-m-d h:i:s');
            $date = strtotime($date);

            $pic =  $date . '_' . $pic;
            // $target_dir = "/img/uploads/events";
            $target_dir = "img/uploads/events/";
            // echo $target_dir; exit;

            // $target_dir = "../uploads/blogs/";
            $target_file = $target_dir . $pic;
            // echo $target_file; exit;
            // mkdir("halla"); exit;
          move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
          // exit;*/
            // end image processing

            $conn = ConnectionManager::get('default');
            /*$stmt = $conn->execute('INSERT INTO events (title, slug, image, start_date, end_date, message, created) VALUES  
                ("'.$title.'", "'.$slug.'", "'.$pic.'", "'.$start_date.'", "'.$end_date.'", "'.$message.'", NOW())
             ');*/
            $stmt = $conn->execute('UPDATE events 
                SET 
                title = "'.$title.'",
                slug = "'.$slug.'",
                start_date = "'.$start_date.'",
                end_date = "'.$end_date.'",
                message = "'.$message.'"
                WHERE 
                id = "'.$event_id.'"
             ');

            $this->Flash->custom_success(__('Event Updated.'));
            $this->redirect(['action' => 'events']);

        }

            
            // $results = $stmt ->fetchAll('assoc');
            // $this->set(compact('results'));


        $this->viewBuilder()->setLayout('custom_manage');

    } // end event edit

    // Category add
    public function categoryAdd()
    {

        // admin verify
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }

        if ($this->request->is('post')) 
        {
            // echo "form submitted"; exit;
            $title = $this->request->getData('fc_name'); 
            $fc_short_descr = $this->request->getData('fc_short_descr'); 
            // echo $title; exit;

            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('INSERT INTO f_categories (fc_name, fc_short_descr, fc_created) VALUES  
                ("'.$title.'", "'.$fc_short_descr.'", NOW())
             ');

            $this->Flash->custom_success(__('Category added.'));
            $this->redirect(['action' => 'categoryAdd']);

        }

            
            // $results = $stmt ->fetchAll('assoc');
            // $this->set(compact('results'));


        $this->viewBuilder()->setLayout('custom_manage');

    } 
    // end Category add

    // Categories
    public function categories()
    {
        // admin verify
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }

        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM f_categories WHERE 
            fc_is_deleted = 0
            ORDER BY fc_id DESC
         ');
        $results = $stmt ->fetchAll('assoc');
        $this->set(compact('results'));
        $this->viewBuilder()->setLayout('custom_manage');
       
    }
    // end Categories

    // Delete Category
    public function categoryDelete()
    {
        // Verify admin
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }

        // echo $id;
        $admin_id = $this->request->getSession()->read('admin_id');
        if(isset($admin_id))
        {
            $fc_id = $_GET['id'];
            // echo $user_id; exit;
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE f_categories 
                    SET fc_is_deleted = 1
                    WHERE 
                    fc_id = "'.$fc_id.'" 
                    ');

                 $this->Flash->custom_success(__('Category Deleted. '));
                 return $this->redirect(['action' => 'categories']);


        }

        
    }
    // End Delete Category

    // Edit category
    public function categoryEdit()
    {

        // admin verify
        if($this->request->getSession()->read('admin_id') === NULL)
        {
            // echo "admin id is not set";
           return $this->redirect(['controller' => 'manage', 'action' => 'login']);
        }

        // Fill text with event details
        $fc_id = $_GET['id'];

        // echo $event_id;
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM f_categories WHERE 
            fc_id = "'.$fc_id.'"
         ');
        $results = $stmt ->fetchAll('assoc');
        $this->set(compact('results'));
        // en

        if ($this->request->is('post')) 
        {
            // echo "form submitted"; exit;
            $title = $this->request->getData('fc_name'); 
            $fc_short_descr = $this->request->getData('fc_short_descr'); 
            // echo $start_date; exit;

           
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('UPDATE f_categories 
                SET 
                fc_name = "'.$title.'",
                fc_short_descr = "'.$fc_short_descr.'"
                WHERE 
                fc_id = "'.$fc_id.'"
             ');

            $this->Flash->custom_success(__('Category Updated.'));
            $this->redirect(['action' => 'categories']);

        }

            
            // $results = $stmt ->fetchAll('assoc');
            // $this->set(compact('results'));


        $this->viewBuilder()->setLayout('custom_manage');

    } 
    // End Edit category
    

}
