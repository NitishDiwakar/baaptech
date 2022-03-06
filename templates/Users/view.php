<?php  
use Cake\Datasource\ConnectionManager;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BAAP</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->

           <?= $this->Html->css(['custom']) ?>
            <?= $this->Html->css(['styles']) ?>

        <style type="text/css">
            a {text-decoration: none !important;}
        </style>

    </head>
    <body id="page-top">
        <!-- Navigation-->
         <?= $this->element('header') ?>
        <!-- Mashead header-->
        
        <!-- Quote/testimonial aside-->
        
        <!-- App features section-->
        <section id="features">
            <?php 
           
            ?>
            <div class="container px-5">
                <!-- n -->
    <!-- <div class="row">
        <div class="col-12">
            <h5 class="text-white text-center bg-gradient-primary-to-secondary p-2">User</h5>
        </div>
    </div> -->

<div class="row">
    <div col-12>
        <!-- user profile start -->
<div class="UserPage">
    <div class="UserCard Hero UserHero" style="--usercard-bg: rgb(59, 58, 60);">
        <div class="darkenBackground"><div class="container"><div class="UserCard-profile"><h2 class="UserCard-identity"><a href=""><div class="UserCard-avatar"><img class="Avatar " src="http://localhost/flarum_test/public/assets/avatars/BrlOPDK2mAm72gMn.png" alt=""></div><span class="username">
            <?php echo $user[0]['Name']; ?>
        </span></a></h2>
        
        <ul class="UserCard-info">
            <!-- <li class="item-lastSeen">
            <span class="UserCard-lastSeen"><i aria-hidden="true" class="icon far fa-clock "></i> an hour ago</span>
            </li> -->
        <li class="item-joined">
        Joined 
        <?php  
         $created_at = $user[0]['created'];
         $fd_created = strtotime($created_at);
         echo get_timeago($fd_created); 
        ?>
    </li>
    <li>
    <!-- admin action button -->
<?php  
    $user_id = $this->request->getSession()->read('user_id');
    if($user_id !== NULL)
        {
            // echo "User is not logged in"; 
            // Check if type is admin
            $user_id = $this->request->getSession()->read('user_id');
            $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT id, user_level FROM users
            WHERE 
            id = "'.$user_id.'" ');
            $user_l = $stmt ->fetchAll('assoc');
            $user_level = $user_l[0]['user_level'];
            // echo $user_level;
            
}    
?>

<?php  
if(isset($user_level))  {
    if($user_level == 1) {
?>
<?php  
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $last_segment = basename(parse_url($url, PHP_URL_PATH));
    $user_to_be_ban = $last_segment;
?>
<a onclick="return confirm('Are you sure you want to ban this user?')" href="<?php echo $this->Url->build('/users/ban_user?id='.$user_to_be_ban.' ');?>" class="btn btn-danger">Ban this user</a>
<?php  
    }
}
?>
        <!-- end admin action button -->    
    </li>

</ul></div></div></div></div>
<div class="mt-1"></div>
<?php echo $this->Flash->render() ?>
<div class="container">
        <div class="sideNavContainer">
            <nav class="sideNav UserPage-nav">
                <ul class="">
                    <li class="item-nav"><div class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select itemCount3"><button class="Dropdown-toggle Button" aria-haspopup="menu" aria-label="Toggle dropdown menu" data-toggle="dropdown"><span class="Button-label">Posts</span><i aria-hidden="true" class="icon fas fa-sort Button-caret"></i></button><ul class="Dropdown-menu dropdown-menu "><li class="item-posts active"><a class="hasIcon" href="#" active="true"><i aria-hidden="true" class="icon far fa-comment Button-icon"></i><span class="Button-label">Discussions <span class="Button-badge">
                    <!-- 11 -->
                    <?php echo $total_discussions[0]['COUNT(*)'] ?>
                </span></span></a></li>
                        <!-- <li class="item-discussions"><a class="hasIcon" href="/flarum_test/public/u/john/discussions" active="false"><i aria-hidden="true" class="icon fas fa-bars Button-icon"></i><span class="Button-label">Discussions <span class="Button-badge">2</span></span></a>
                        </li>
                        <li class="item-mentions"><a class="hasIcon" href="/flarum_test/public/u/john/mentions" name="mentions" active="false"><i aria-hidden="true" class="icon fas fa-at Button-icon"></i><span class="Button-label">Mentions</span></a></li> -->
                    </ul></div>
                </li>
                </ul>
            </nav>
                    <div class="sideNavOffset UserPage-content">

<?php  
// print_r($all_discussions);
foreach ($all_discussions as $all_discussion){
    $discussion_id = $all_discussion['fd_id'];
?>
                        <div class="PostsUserPage"><ul class="PostsUserPage-list"><li><div class="PostsUserPage-discussion">
                        <!-- In  -->
                        <a href="<?php echo $this->Url->build('/forum/view/'.$discussion_id.'');?>"><?php echo $all_discussion['fd_title']; ?></a></div><article class=" CommentPost Post"><div><header class="Post-header"><ul><li class="item-user"><div class="PostUser"><h3><a href=""><img class="Avatar PostUser-avatar" src="http://localhost/flarum_test/public/assets/avatars/BrlOPDK2mAm72gMn.png" alt=""><span class="username"><?php echo $all_discussion['Name']; ?></span></a></h3><ul class="PostUser-badges badges"></ul></div></li><li class="item-meta"><div class="Dropdown PostMeta"><a class="Dropdown-toggle" data-toggle="dropdown"><time pubdate="" datetime="2022-02-24T00:03:06+05:30" title="Thursday, February 24, 2022 12:03 AM" data-humantime="">
<?php 
// echo $all_discussion['fd_created']; 
$created_at = $all_discussion['fd_created'];
$fd_created = strtotime($created_at);
echo get_timeago($fd_created);
?>
                        </time></a><div class="Dropdown-menu dropdown-menu"><span class="PostMeta-number">Post #5</span> <span class="PostMeta-time"><time pubdate="" datetime="2022-02-24T00:03:06+05:30">Thursday, February 24, 2022 12:03 AM</time></span> <span class="PostMeta-ip"></span><input class="FormControl PostMeta-permalink"></div></div></li></ul></header><div class="Post-body"><p>
                        <!-- <a href="http://localhost/flarum_test/public/d/5/2" class="PostMention" data-id="14">john</a> -->
                         <?php echo $all_discussion['fd_post']; ?></p></div>

                        <!-- <aside class="Post-actions"><ul><li class="item-reply"><button class="Button Button--link" type="button"><span class="Button-label">Reply</span></button></li></ul></aside>
                        <footer class="Post-footer"></footer> -->
                    </div>
            <ul class="Dropdown-menu PostMention-preview fade"></ul></article><div class="Post-quoteButtonContainer"></div></li>
            </ul>
        <div class="PostsUserPage-loadMore"></div>
        </div>
<?php } ?>


    </div></div></div></div>
        <!-- user profile end -->
    </div>
</div> <!-- End row -->
                <!-- en -->
            </div>
        </section>
        <!-- Basic features section-->
        
        <!-- Call to action section-->
        
        <!-- App badge section-->
        <?= $this->element('pre_footer') ?>
        <!-- Footer-->
        <?= $this->element('footer') ?>
        <!-- Feedback Modal-->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
    </body>
</html>
