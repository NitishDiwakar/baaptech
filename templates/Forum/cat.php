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
        <div id="loading">

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
            <!-- <h5 class="text-white text-center bg-gradient-primary-to-secondary p-2">Forum</h5> -->
            <header class="Hero TagHero" style=""><div class="container"><div class="containerNarrow"><h2 class="Hero-title"><i class="icon fa fa-tag"></i> 
<?php  
echo $cat_detail[0]['fc_name'];
?>
            </h2><div class="Hero-subtitle">
                <?php  
                    echo $cat_detail[0]['fc_short_descr'];
                ?>
            </div></div></div></header>
        </div>
    </div>

<div class="row">
    
</div> <!-- End row -->
<div class="sideNavContainer"><nav class="IndexPage-nav sideNav"><ul><li class="item-newDiscussion App-primaryControl">
<?php 
   $user_id = $this->request->getSession()->read('user_id');
   if($user_id == NULL)
   {
    // echo "User is not logged in";
    ?> 
<button title="Login to start discussion" class="Button Button--primary IndexPage-newDiscussion hasIcon" type="button" itemclassname="App-primaryControl" disabled><i aria-hidden="true" class="icon fas fa-edit Button-icon"></i><span class="Button-label">Start a Discussion</span></button>
<?php 
   }
   else 
   {
    // echo "user is logged in";
    ?> 
        <button id="show1" class="Button Button--primary IndexPage-newDiscussion hasIcon" type="button" itemclassname="App-primaryControl"><i aria-hidden="true" class="icon fas fa-edit Button-icon"></i><span class="Button-label">Start a Discussion</span></button>
<?php 
   }
?>
    
</li><li class="item-nav"><div class="ButtonGroup Dropdown dropdown App-titleControl Dropdown--select itemCount7"><button class="Dropdown-toggle Button" aria-haspopup="menu" aria-label="Toggle navigation dropdown menu" data-toggle="dropdown">
    <span class="Button-label">All Discussions</span><i aria-hidden="true" class="icon fas fa-sort Button-caret"></i></button><ul class="Dropdown-menu dropdown-menu "><li class="item-allDiscussions active">
        <a class="hasIcon" href="<?php echo $this->Url->build('/forum');?>" class="img-fluid" active="true"><i aria-hidden="true" class="icon far fa-comments Button-icon"></i><span class="Button-label">All Discussions</span></a>
    </li><li class="item-tags">
        <a class="hasIcon" href="<?php echo $this->Url->build('/forum/categories');?>" active="false"><i aria-hidden="true" class="icon fas fa-th-large Button-icon"></i><span class="Button-label">Categories</span></a>
    </li><li class="Dropdown-separator"></li>

    <li class="item-tag1">
        <a class="TagLinkButton hasIcon" href="<?php echo $this->Url->build('/forum/cat/1');?>" style="--color: #888;" title=""><span class="Button-icon icon TagIcon" style="--color: #888;"></span><span class="Button-label">General</span></a>
    </li>

    <?php // print_r($categories); ?>
    <?php
        foreach($categories as $category)
        {
            $category_id = $category['fc_id'];
    ?>
    <li class="item-tag2"><a class="TagLinkButton hasIcon" href="<?php echo $this->Url->build('/forum/cat/'.$category_id.'');?>" style="" title="Sample tag 1"><i class="Button-icon icon fa fa-tag" style=""></i><span class="Button-label"><?php echo $category['fc_name'] ?></span></a></li>
    <?php  } ?>
    <!-- <li class="item-tag3"><a class="TagLinkButton hasIcon" href="#/flarum_test/public/t/tag-2" style="" title="Sample tag 2"><i class="Button-icon icon fa fa-tag" style=""></i><span class="Button-label">tag_2</span></a></li>
    <li class="item-tag4"><a class="TagLinkButton hasIcon" href="#/flarum_test/public/t/tag-3" style="" title="description of tag"><i class="Button-icon icon fa fa-tag" style=""></i><span class="Button-label">tag_3</span></a></li> -->

</ul></div></li></ul></nav><div class="IndexPage-results sideNavOffset"><div class="IndexPage-toolbar">

    <ul class="IndexPage-toolbar-view">

<!-- new dropdown shorter -->
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn btn btn-primary">Sort by <i class="fa fa-caret-down"></i></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="<?php echo $this->Url->build('/forum?sort=desc');?>">Latest</a>
    <a href="<?php echo $this->Url->build('/forum?sort=asc');?>">Oldest</a>
    <!-- <a href="#">Link 3</a> -->
  </div>
</div> 
<!-- end new dropdown shorter -->
<!-- earlier shorting button -->
<!-- <li class="item-sort"><div class="ButtonGroup Dropdown dropdown  itemCount4">
    <button class="Dropdown-toggle Button" aria-haspopup="menu" aria-label="Change discussion list sorting" data-toggle="dropdown"><span class="Button-label">Latest</span><i aria-hidden="true" class="icon fas fa-caret-down Button-caret"></i></button>
    <ul class="Dropdown-menu dropdown-menu "><li class=""><button class="hasIcon" type="button" active=""><i aria-hidden="true" class="icon fas fa-check Button-icon"></i><span class="Button-label">Latest</span></button></li><li class=""><button class="hasIcon" type="button"><i aria-hidden="true" class="icon true Button-icon"></i><span class="Button-label">Top</span></button></li><li class=""><button class="hasIcon" type="button"><i aria-hidden="true" class="icon true Button-icon"></i><span class="Button-label">Newest</span></button></li><li class=""><button class="hasIcon" type="button"><i aria-hidden="true" class="icon true Button-icon"></i><span class="Button-label">Oldest</span></button></li>
    </ul>
    </div>
</li> -->

<?php 
    // Show button only if user is logged in
   $user_id = $this->request->getSession()->read('user_id');
   if($user_id !== NULL)
   {
?>
</ul><ul class="IndexPage-toolbar-action show1"><li class="item-refresh"><button class="Button Button--icon hasIcon" id="show3" type="button" aria-label="Refresh"><i aria-hidden="true" class="icon fa fa-edit Button-icon"></i><span class="Button-label"></span></button></li></ul>
<?php } ?>


<?php 
    // Show button only if user is not logged in
   $user_id = $this->request->getSession()->read('user_id');
   if($user_id == NULL)
   {
?>
</ul><ul class="IndexPage-toolbar-action"><li class="item-refresh"><a href="" class="Button Button--icon hasIcon btn-secondary" type="button" aria-label="Refresh"><i aria-hidden="true" class="icon fas fa-sync Button-icon"></i><span class="Button-label"></span></a></li></ul>
<?php } ?>

</div>

<div class="DiscussionList">
    <?php echo $this->Flash->render() ?>
    <!-- n -->
    <?php  
        if(empty($all_discussions))
        {
            echo "<div class='alert alert-warning'>No discussion posted in this category yet.</div>";
        }
    ?>
    <!-- en -->
<!-- Forum add form -->
    <div class="forum_add mb-4" id="forum_add" style="display: none">
        <?= $this->Form->create($forumAdd) ?>
                            <!-- Name input-->
                            
                            <!-- Email address input-->
    <div class="row">
        <legend><?= __('Start a Discussion') ?>
            <!-- <button id="hide2" class="Button Button--secondary float-end" type="button"><i aria-hidden="true" class="icon fa fa-close fa-2x Button-icon"></i><span class="Button-label"></span></button> -->
            <button id="hide2" class="Button Button--icon hasIcon float-end" type="button" aria-label="Refresh"><i aria-hidden="true" class="icon fas fa-close Button-icon"></i><span class="Button-label"></span></button>
        </legend>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Discussion Category</label>
                <select name="cat" class="form-select">
                    <option value="1">General</option>
<?php 
    foreach($categories as $category)
        {
            $category_id   = $category['fc_id'];
            $category_name = $category['fc_name'];
?>
    <option value="<?= $category_id ?>"><?= $category_name ?></option>
<?php } ?>
                    <!-- <option value="b">b</option>
                    <option value="c">c</option> -->
                </select>
            </div>
        </div> <!-- End col-md-6 -->
        <div class="col-md-6">
            <div class="form-floating mb-3">

                <?php echo $this->Flash->render() ?>
                
                 
                <?php  echo $this->Form->control('fd_title', ['class' => 'form-control', 'label' => 'Discussion Title']); ?>
                
            </div>
        </div>
    </div>
    
                            <!-- Forum text input-->
   <div class="form-floating mb-3">
    
    <?php  echo $this->Form->control('fd_post', ['class' => 'form-control', 'type' => 'textarea', 'id' => 'editor1', 'required', 'label' => 'Discussion Details']); ?>
                            </div>

                   <!-- Submit Button-->
<!-- d-grid -->
<div class="">
     <?= $this->Form->button(__('Post Discussion'),['class'=>'Button Button--primary']) ?>
     
     <button id="hide1" class="Button Button--secondary float-end" type="button"><i aria-hidden="true" class="icon fas fa-close Button-icon"></i><span class="Button-label">Close</span></button>
</div>
                        <!-- </form> -->
                        <?= $this->Form->end() ?>
    </div>
<!-- End Forum add form -->
    <ul class="DiscussionList-discussions">
<?php  
    // print_r($all_discussions);
    foreach ($all_discussions as $all_discussion)
    {
        $discussion_id = $all_discussion['fd_id'];
        $user_id = $all_discussion['id'];
        // echo $all_discussion['fd_title'] . "<br>";
?>
<li data-id="5">
    <div class="DiscussionListItem"><span class="Slidable-underneath Slidable-underneath--left Slidable-underneath--elastic disabled"><i aria-hidden="true" class="icon fas fa-check "></i></span><div class="DiscussionListItem-content Slidable-content"><a class="DiscussionListItem-author" href="<?php echo $this->Url->build('/forum/users/view/'.$user_id.'');?>" title="" aria-label="john started 14 hours ago" data-original-title="john started 14 hours ago"><img class="Avatar " src="<?php echo $this->Url->build('/img/uploads/avatars/default.png');?>" alt=""></a><ul class="DiscussionListItem-badges badges"></ul><a href="<?php echo $this->Url->build('/forum/view/'.$discussion_id.'');?>" class="DiscussionListItem-main"><h3 class="DiscussionListItem-title"><?php echo $all_discussion['fd_title']; ?></h3>
    <ul class="DiscussionListItem-info"><li class="item-tags"><span class="TagsLabel ">
    <span style="" class="TagLabel ">
    <span class="TagLabel-text">
    <i class="icon fa fa-tag"></i> <?php echo $all_discussion['fc_name']; ?></span></span></span></li>

    <!-- <li class="item-terminalPost"><span><i aria-hidden="true" class="icon fas fa-reply "></i> <span class="username">john</span> replied <time pubdate="" datetime="2022-02-24T00:03:06+05:30" title="Thursday, February 24, 2022 12:03 AM" data-humantime="">15 hours ago</time></span></li> -->

<li class="item-terminalPost"><span> <span class="username"><?php echo $all_discussion['Name']; ?></span> started <time pubdate="" datetime="2022-02-08T13:47:49+05:30" title="<?php echo $all_discussion['fd_created']; ?>" data-humantime=""><?php 
// echo $all_discussion['fd_created']; 
$created_at = $all_discussion['fd_created'];
$fd_created = strtotime($created_at);
echo get_timeago($fd_created);
?></time></span></li>


</ul></a>

<span class="DiscussionListItem-count"><span aria-hidden="true">
    <!-- 4 -->
    <!-- Number of comments -->
    <?php  
    // echo $all_discussion['fd_id'];
    $fcm_disc_id = $all_discussion['fd_id'];
    // SELECT COUNT(*) FROM `f_comments` WHERE fcm_disc_id = 11
    $conn = ConnectionManager::get('default');
            $stmt = $conn->execute('SELECT COUNT(*) FROM `f_comments` WHERE fcm_disc_id = "'.$fcm_disc_id.'" ');
    $total_cmts = $stmt ->fetchAll('assoc');
    // print_r($total_cmts);
    echo $total_cmts[0]['COUNT(*)'];
    ?>
</span><span class="visually-hidden">4 replies</span></span>
</div>
</div>

</li>
<?php } ?>

    <!-- <li data-id="5"><div class="DiscussionListItem"><span class="Slidable-underneath Slidable-underneath--left Slidable-underneath--elastic disabled"><i aria-hidden="true" class="icon fas fa-check "></i></span><div class="DiscussionListItem-content Slidable-content"><a class="DiscussionListItem-author" href="#/flarum_test/public/u/john" title="" aria-label="john started 14 hours ago" data-original-title="john started 14 hours ago"><img class="Avatar " src="http://localhost/flarum_test/public/assets/avatars/BrlOPDK2mAm72gMn.png" alt=""></a><ul class="DiscussionListItem-badges badges"></ul><a href="#/flarum_test/public/d/5-sample-discussion-5" class="DiscussionListItem-main"><h3 class="DiscussionListItem-title">Sample Discussion 5</h3><ul class="DiscussionListItem-info"><li class="item-tags"><span class="TagsLabel "><span style="" class="TagLabel "><span class="TagLabel-text"><i class="icon fa fa-tag"></i> tag_1</span></span></span></li><li class="item-terminalPost"><span><i aria-hidden="true" class="icon fas fa-reply "></i> <span class="username">john</span> replied <time pubdate="" datetime="2022-02-24T00:03:06+05:30" title="Thursday, February 24, 2022 12:03 AM" data-humantime="">15 hours ago</time></span></li></ul></a><span class="DiscussionListItem-count"><span aria-hidden="true">4</span><span class="visually-hidden">4 replies</span></span></div></div>
</li> -->

<!-- <li data-id="2"><div class="DiscussionListItem"><span class="Slidable-underneath Slidable-underneath--left Slidable-underneath--elastic disabled"><i aria-hidden="true" class="icon fas fa-check "></i></span><div class="DiscussionListItem-content Slidable-content"><a class="DiscussionListItem-author" href="#/flarum_test/public/u/admin" title="" aria-label="admin started 16 days ago" data-original-title="admin started 16 days ago"><span class="Avatar " style="--avatar-bg: #a0e5cf;">A</span></a><ul class="DiscussionListItem-badges badges"></ul><a href="#/flarum_test/public/d/2-sample-discussion-1" class="DiscussionListItem-main"><h3 class="DiscussionListItem-title">Sample Discussion 1</h3><ul class="DiscussionListItem-info">
    <li class="item-terminalPost"><span> <span class="username">admin</span> started <time pubdate="" datetime="2022-02-08T13:47:49+05:30" title="Tuesday, February 8, 2022 1:47 PM" data-humantime="">16 days ago</time></span></li>

</ul></a><span class="DiscussionListItem-count"><span aria-hidden="true">0</span><span class="visually-hidden">0 replies</span></span></div></div>
</li> -->


</ul>
<div class="DiscussionList-loadMore"></div></div>


</div></div>
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

                //n
                $("#show3").click(function(){
                    $("#forum_add").show();
                  });
                //en

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


        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
            });
        </script>
        <script type="text/javascript">
            function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
        </script>

    </div> <!-- End loader -->
    </body>
</html>
