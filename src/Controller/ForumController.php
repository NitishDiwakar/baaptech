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
        if(isset($_GET['sort']))
        {
            $sort = $_GET['sort'];
        }
        if(!isset($_GET['sort']))
        {
            $sort = 'DESC';
        }
        $stmt = $conn->execute('SELECT * FROM f_discussions
            INNER JOIN f_categories ON f_discussions.fd_cat = f_categories.fc_id
            INNER JOIN users ON f_discussions.fd_user_id = users.id
            WHERE 
            f_discussions.fd_is_delete = 0
            AND users.is_banned = 0 
            AND users.is_deleted = 0 
            ORDER BY f_discussions.fd_id '.$sort.'
         ');
        $all_discussions = $stmt ->fetchAll('assoc');
        $this->set(compact('all_discussions'));
         
    // endGet discussions

    // get user type

       /* $user_id = $this->request->getSession()->read('user_id');
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT id, user_level FROM users
            WHERE 
            id = "'.$user_id.'"');
        $user_level = $stmt ->fetchAll('assoc');
        $this->set(compact('user_level'));*/
    // end get user type

        $this->viewBuilder()->setLayout('custom_home');
       
    } // end index()

    public function view($id = null)
    {
        /*// $user = $this->Users->get($id, [
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

        // print_r($results);*/
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $last_segment = basename(parse_url($url, PHP_URL_PATH));
        // echo $last_segment; exit;

        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM f_discussions
            INNER JOIN f_categories ON f_discussions.fd_cat = f_categories.fc_id
            INNER JOIN users ON f_discussions.fd_user_id = users.id
            WHERE 
            f_discussions.fd_is_delete = 0
            AND users.is_banned = 0 
            AND users.is_deleted = 0 
            AND f_discussions.fd_id = "'.$last_segment.'"
            ORDER BY f_discussions.fd_id DESC
         ');
        $discussion = $stmt ->fetchAll('assoc');
        $this->set(compact('discussion'));

        // print_r($discussion); 
        // echo $discussion[0]['fd_post'];
        // exit;
        // submit form
        if ($this->request->is('post')) 
        {
            // echo "test"; exit;
            $fcm_text = $this->request->getData('fcm_text');
            // echo "form submitted";
            echo $fcm_text; exit;
             $conn = ConnectionManager::get('default');
             $stmt = $conn->execute('INSERT INTO f_comments (fcm_text) VALUES 
                ("'.$txt_fname.'")
         ');

            // echo $txt_fname . " form submitted";
        }
        // end submit form
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
        echo "test"; exit;
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

        $this->viewBuilder()->setLayout('custom_home');

    }
    // End get forum categories

    // add comment
    public function addcomment()
    {
        // echo "test"; exit;
        if ($this->request->is('post')) 
        {
            // echo "test"; exit;
            $fcm_text = $this->request->getData('fcm_text');
            $fcm_user_id = $this->request->getData('fcm_user_id');
            $fcm_disc_id = $this->request->getData('fcm_disc_id');

            // get user name
             $conn = ConnectionManager::get('default');
             $stmt = $conn->execute('
                SELECT id, Name FROM users WHERE id = "'.$fcm_user_id.'"
         ');
             $name = $stmt ->fetchAll('assoc');
            
             // $naam = "Hayate";
             $naam = $name[0]['Name'];

             // $dp = $this->Url->build('/img/uploads/avatars/default.png');
             $dp = '/img/uploads/avatars/default.png';
            // end get user name
            // echo "form submitted";
             $conn = ConnectionManager::get('default');
             $stmt = $conn->execute('INSERT INTO f_comments (fcm_text, fcm_user_id, fcm_disc_id, fcm_created) VALUES 
                ("'.$fcm_text.'", "'.$fcm_user_id.'", "'.$fcm_disc_id.'", NOW())
         ');

            // echo "working";
            // echo $fcm_text . " <a href='' class='float-end text-red'> Add more reply</a>";
            echo '
            <article class=" CommentPost Post Post--by-actor">
<div>
    <header class="Post-header">
        <ul>
            <li class="item-user">
                <div class="PostUser">
                    <h3>
                        <a href="#">
                        <img class="Avatar PostUser-avatar" src="'.$dp.'">
                        <span class="username">
                            ' .$naam. '
                        </span>
                        </a>
                    </h3>
                        <ul class="PostUser-badges badges"></ul>

                </div>
            </li>
            <li class="item-meta">
            <div class="Dropdown PostMeta"><a class="Dropdown-toggle" data-toggle="dropdown"><time pubdate="" datetime="2022-02-23T23:52:19+05:30" title="" data-humantime="">Just now</time></a><div class="Dropdown-menu dropdown-menu"><span class="PostMeta-number">Post #1</span> <span class="PostMeta-time"><time pubdate="" datetime="2022-02-23T23:52:19+05:30">Wednesday, February 23, 2022 11:52 PM</time></span> <span class="PostMeta-ip"></span><input class="FormControl PostMeta-permalink"></div></div>
            </li>
        </ul>
    </header>'.$fcm_text.'
</div>
</article>
            ';

            // echo $txt_fname . " form submitted";
        }
         $this->viewBuilder()->setLayout('custom_home');
    }
    // end add comment


    // Close discussion
    public function closeDisc()
    {
        // echo "hello";
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
                $stmt = $conn->execute('UPDATE f_discussions 
                    SET fd_is_close = 1
                WHERE 
                fd_id = "'.$fd_id.'" ');

                $this->Flash->custom_success(__('Discussion closed.'));
                return $this->redirect(['action' => 'view/'.$fd_id.'']);

            }

            // end check admin
            
        }
        
        exit;
    }
    // end close discussion

    // Delete discussion
    public function deleteDisc()
    {
        // echo "hello";
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
                $stmt = $conn->execute('UPDATE f_discussions 
                    SET fd_is_delete = 1
                WHERE 
                fd_id = "'.$fd_id.'" ');

                $this->Flash->custom_success(__('Discussion deleted.'));
                return $this->redirect(['action' => 'index']);

            }

            // end check admin
            
        }
        
        exit;
    }
    // end Delete discussion

    // Start cat
    public function cat()
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
        if(isset($_GET['sort']))
        {
            $sort = $_GET['sort'];
        }
        if(!isset($_GET['sort']))
        {
            $sort = 'DESC';
        }
        //n
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // echo $actual_link; exit;

        // get last segment of url
        $last_segment = basename(parse_url($url, PHP_URL_PATH));
        //en
        $stmt = $conn->execute('SELECT * FROM f_discussions
            INNER JOIN f_categories ON f_discussions.fd_cat = f_categories.fc_id
            INNER JOIN users ON f_discussions.fd_user_id = users.id
            WHERE 
            f_discussions.fd_is_delete = 0
            AND users.is_banned = 0 
            AND users.is_deleted = 0
            AND f_categories.fc_id = '.$last_segment.' 
            ORDER BY f_discussions.fd_id '.$sort.'
         ');
        $all_discussions = $stmt ->fetchAll('assoc');
        $this->set(compact('all_discussions'));

        // Get category name and description by last segment
        $stmt = $conn->execute('SELECT * FROM f_categories
            WHERE 
            fc_id = '.$last_segment.'
         ');
        $cat_detail = $stmt ->fetchAll('assoc');
        $this->set(compact('cat_detail'));
        // end Get category name and description by last segment
         
    // endGet discussions

    // get user type

       /* $user_id = $this->request->getSession()->read('user_id');
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT id, user_level FROM users
            WHERE 
            id = "'.$user_id.'"');
        $user_level = $stmt ->fetchAll('assoc');
        $this->set(compact('user_level'));*/
    // end get user type

        $this->viewBuilder()->setLayout('custom_home');
       
    } // end cat()

    
    


}
