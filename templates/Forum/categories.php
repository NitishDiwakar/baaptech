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
     <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
     <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

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
    <div class="row">
        <div class="col-12">
            <h5 class="text-white text-center bg-gradient-primary-to-secondary p-2">Categories</h5>
        </div>
    </div>

<div class="row">
    
</div> <!-- End row -->
    <!-- start page -->
    <div id="content"><div class="TagsPage"><header class="Hero WelcomeHero" style="display: none;"><div class="container"><button class="Hero-close Button Button--icon Button--link hasIcon" type="button" aria-label="Hide welcome message"><i aria-hidden="true" class="icon fas fa-times Button-icon"></i><span class="Button-label"></span></button></div></header><div class="container">

        <!-- <nav class="TagsPage-nav IndexPage-nav sideNav"><ul><li class="item-newDiscussion App-primaryControl"><button class="Button Button--primary IndexPage-newDiscussion hasIcon" type="button" itemclassname="App-primaryControl"><i aria-hidden="true" class="icon fas fa-edit Button-icon"></i>

        <span class="Button-label">Start a Discussion</span></button></li><li class="item-nav"><div class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select itemCount2"><button class="Dropdown-toggle Button" aria-haspopup="menu" aria-label="Toggle navigation dropdown menu" data-toggle="dropdown"><span class="Button-label">Tags</span><i aria-hidden="true" class="icon fas fa-sort Button-caret"></i></button><ul class="Dropdown-menu dropdown-menu "><li class="item-allDiscussions"><a class="hasIcon" href="/flarum_test/public/" active="false"><i aria-hidden="true" class="icon far fa-comments Button-icon"></i><span class="Button-label">All Discussions</span></a></li>
            <li class="item-tags active"><a class="hasIcon" href="/flarum_test/public/tags" active="true"><i aria-hidden="true" class="icon fas fa-th-large Button-icon"></i><span class="Button-label">Tags</span></a>
        </li></ul>
    </div></li></ul></nav> -->

    <div class="TagsPage-content sideNavOffset">

        <ul class="TagTiles">

        <li class="TagTile colored" style="--tag-bg: #888;"><a class="TagTile-info" href="<?php echo $this->Url->build('/forum/cat/1');?>"><h3 class="TagTile-name">General</h3><p class="TagTile-description"></p><div class="TagTile-children"></div></a><span class="TagTile-lastPostedDiscussion"></span></li>

        <?php  
            foreach($categories as $category) {
                $cat_id = $category['fc_id'];
                if($cat_id == 1) { continue; }
        ?>
        <li class="TagTile " style="">
        <a class="TagTile-info" href="<?php echo $this->Url->build('/forum/cat/'.$cat_id.'');?>"><i class="icon fa fa-tag"></i>
        <h3 class="TagTile-name">
            <?php  
                echo $category['fc_name'];
            ?>
        </h3><p class="TagTile-description">
            <?= $category['fc_short_descr'] ?>
        </p><div class="TagTile-children"></div></a>

        <?php 
        // echo $category['fc_id']; 
        $cat_id = $category['fc_id'];
        // get last discussion from above id
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT * FROM f_discussions WHERE fd_cat = "'.$cat_id.'"
            ORDER by fd_id DESC LIMIT 1
             ');
        $last_post = $stmt ->fetchAll('assoc');
        // print_r($last_post);

        ?>
        <?php  
        if(!empty($last_post)) {
            $last_post_id = $last_post[0]['fd_id'];
        ?>
        <a class="TagTile-lastPostedDiscussion" href="<?php echo $this->Url->build('/forum/view/'.$last_post_id.'');?>">
            <span class="TagTile-lastPostedDiscussion-title">
                <?php  
                   // echo $last_post[0]['fd_title'];
                    
                        echo $last_post[0]['fd_title'];
                ?>
            </span><time pubdate="" datetime="2022-02-24T00:03:06+05:30" title="Thursday, February 24, 2022 12:03 AM" data-humantime="">
                <?php  
                    $created_at = $last_post[0]['fd_created'];
                    $fd_created = strtotime($created_at);
                    echo get_timeago($fd_created);
                ?>
            </time></a>
        <?php } ?>

        </li>
        <?php } ?>


        <!-- <li class="TagTile " style=""><a class="TagTile-info" href="/flarum_test/public/t/tag-2"><i class="icon fa fa-tag"></i><h3 class="TagTile-name">tag_2</h3><p class="TagTile-description">Sample tag 2</p><div class="TagTile-children"></div></a><a class="TagTile-lastPostedDiscussion" href="/flarum_test/public/d/4-it-is-sunday-today"><span class="TagTile-lastPostedDiscussion-title">It is sunday today</span><time pubdate="" datetime="2022-02-20T20:29:34+05:30" title="Sunday, February 20, 2022 8:29 PM" data-humantime="">7 days ago</time></a></li> -->

        <!-- <li class="TagTile " style=""><a class="TagTile-info" href="/flarum_test/public/t/tag-3"><i class="icon fa fa-tag"></i><h3 class="TagTile-name">tag_3</h3><p class="TagTile-description">description of tag</p><div class="TagTile-children"></div></a><span class="TagTile-lastPostedDiscussion"></span></li> -->

    </ul></div></div></div></div>
    <!-- end page -->
                <!-- en -->
            </div>
        </section>
        <!-- Basic features section-->
        <!-- test temp -->
        
        <!-- end test temp -->
        <!-- Call to action section-->
        
        <!-- App badge section-->
        <section class="bg-gradient-primary-to-secondary" id="download">
            <div class="container px-5">
                <h2 class="text-center text-white font-alt mb-4">Join our community now!</h2>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                    <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
                </div>
            </div>
        </section>
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
         <script type="text/javascript">
            /*$(function() {
                // Code here
                // ('.forum_add'). hide(); 
                $('#forum_add'). hide(); 
            });
*/
            $( document ).ready(function() {
                // console.log( "ready!" );
                $('#forum_add'). hide();

                $("#show1").click(function(){
                    $("#forum_add").show();
                  });

                $("#hide1").click(function(){
                    $("#forum_add").hide();
                  });

                $("#hide2").click(function(){
                    $("#forum_add").hide();
                  });
            });
        </script>
        <script>
                CKEDITOR.replace('editor1');
        </script>
    </body>
</html>
