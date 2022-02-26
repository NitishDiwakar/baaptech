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

     <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.2/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    </head>
    <body id="page-top">
        <!-- Navigation-->
         <?= $this->element('header') ?>
        <!-- Mashead header-->
        
        <!-- Quote/testimonial aside-->
        
        <!-- App features section-->
        <section id="features">
            <?php 
            // writeMessage();
            /*if($this->request->getSession()->read('admin_id') !== NULL)
            {
                echo "admin is set";
            }*/
            /*if($this->request->getSession()->read('admin_id') === NULL)
            {
                // echo "admin id is not set";
               return $this->redirect(['action' => 'login']);
            }*/
            ?>
            <div class="container px-5">
                <div id="">
                    <div class="DiscussionPage">
                        <div class="DiscussionPage-discussion"><header class="Hero DiscussionHero"><div class="container"><ul class="DiscussionHero-items"><li class="item-badges"><ul class="DiscussionHero-badges badges"><li class="item-subscription">

<!-- Following badge -->
<!-- <div class="Badge Badge--following" style="" title="" aria-label="Following" data-original-title="Following"><i aria-hidden="true" class="icon fas fa-star Badge-icon"></i></div> -->

                        </li></ul></li><li class="item-tags"><span class="TagsLabel "><a style="" class="TagLabel " title="Sample tag 1" href="#/flarum_test/public/t/tag-1"><span class="TagLabel-text"><i class="icon fa fa-tag"></i> <?php echo $discussion[0]['fc_name']; ?></span></a></span></li><li class="item-title"><h2 class="DiscussionHero-title"><?php echo $discussion[0]['fd_title']; ?></h2></li></ul></div></header>
                        <div class="container">
                            <nav class="DiscussionPage-nav">
                            <ul>
<!-- If not login -->
<li>
    <?php 
    $user_id = $this->request->getSession()->read('user_id');
    // Check if user is logged in
   if($user_id == NULL)
        {
            // echo "User is not logged in"; 
    ?>
    <a href="<?php echo $this->Url->build('/login');?>" class="btn btn-primary btn-sm">Login to Reply</a>
    <!-- n -->
    <?php } ?>
<!-- Actions -->
<?php  
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
 <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Admin Actions <i class="fa fa-caret-down"></i></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#">Close Discussion</a>
    <a href="#">Delete Discussion</a>
    <!-- <a href="#">Link 3</a> -->
  </div>
</div> 
<?php 
} // end user level 
}
?>
    <!-- en -->
</li>
                            <li class="item-controls">
                            <!-- <div class="ButtonGroup Dropdown dropdown App-primaryControl Dropdown--split itemCount3">
                            <button class=" SplitDropdown-button Button Button--primary hasIcon" type="button"><i aria-hidden="true" class="icon fas fa-reply Button-icon"></i><span class="Button-label">Reply</span></button>
                            <button class="Dropdown-toggle Button Button--icon Button--primary" aria-haspopup="menu" aria-label="Toggle discussion actions dropdown menu" data-toggle="dropdown"><i aria-hidden="true" class="icon fas fa-ellipsis-v Button-icon"></i><i aria-hidden="true" class="icon fas fa-caret-down Button-caret"></i></button><ul class="Dropdown-menu dropdown-menu  Dropdown-menu--right"><li class="item-reply"><button class="hasIcon" type="button"><i aria-hidden="true" class="icon fas fa-reply Button-icon"></i><span class="Button-label">Reply</span></button></li><li class="Dropdown-separator"></li><li class="item-hide"><button class="hasIcon" type="button"><i aria-hidden="true" class="icon far fa-trash-alt Button-icon"></i><span class="Button-label">Delete</span></button></li></ul></div> -->
                                
                            </li>
                            <li class="item-subscription"><!-- <div class="Dropdown ButtonGroup SubscriptionMenu"><button class="Button SubscriptionMenu-button SubscriptionMenu-button--follow hasIcon" type="button"><i aria-hidden="true" class="icon fas fa-star Button-icon"></i><span class="Button-label">Following</span></button><button class="Dropdown-toggle Button Button--icon SubscriptionMenu-button--follow" data-toggle="dropdown"><i aria-hidden="true" class="icon fas fa-caret-down Button-icon"></i></button><ul class="Dropdown-menu dropdown-menu Dropdown-menu--right"><li><button class="SubscriptionMenuItem hasIcon"><span class="SubscriptionMenuItem-label"><i aria-hidden="true" class="icon far fa-star Button-icon"></i><strong>Not Following</strong><span class="SubscriptionMenuItem-description">Be notified only when @mentioned.</span></span></button></li><li><button class="SubscriptionMenuItem hasIcon"><i aria-hidden="true" class="icon fas fa-check Button-icon"></i><span class="SubscriptionMenuItem-label"><i aria-hidden="true" class="icon fas fa-star Button-icon"></i><strong>Following</strong><span class="SubscriptionMenuItem-description">Be notified of all replies.</span></span></button></li><li><button class="SubscriptionMenuItem hasIcon"><span class="SubscriptionMenuItem-label"><i aria-hidden="true" class="icon far fa-eye-slash Button-icon"></i><strong>Ignoring</strong><span class="SubscriptionMenuItem-description">Never be notified. Hide from the discussion list.</span></span></button></li></ul></div> --></li>

    <!-- <li class="item-scrubber"><div class="PostStreamScrubber Dropdown App-titleControl"><button class="Button Dropdown-toggle" data-toggle="dropdown"><span class="Scrubber-index">1</span> of <span class="Scrubber-count">5</span> posts <i aria-hidden="true" class="icon fas fa-sort "></i></button><div class="Dropdown-menu dropdown-menu">
                    <div class="Scrubber"><a class="Scrubber-first"><i aria-hidden="true" class="icon fas fa-angle-double-up "></i> Original Post</a><div class="Scrubber-scrollbar" style="max-height: 254.4px;"><div class="Scrubber-before" style="height: 0%;"></div><div class="Scrubber-handle" style="height: 61.1181%;"><div class="Scrubber-bar"></div><div class="Scrubber-info"><strong><span class="Scrubber-index">1</span> of <span class="Scrubber-count">5</span> posts</strong><span class="Scrubber-description">February 2022</span></div></div><div class="Scrubber-after" style="height: 38.8819%;"></div><div class="Scrubber-unread" style="top: 100%; height: 0%;">0 unread</div></div><a class="Scrubber-last"><i aria-hidden="true" class="icon fas fa-angle-double-down "></i> Now</a></div>

                </div></div>
            </li> -->
                                    </ul></nav><div class="DiscussionPage-stream"><div class="PostStream"><div class="PostStream-item" data-index="0" data-time="2022-02-23T18:22:19.000Z" data-number="1" data-id="13" data-type="comment"><article class=" CommentPost Post Post--by-actor"><div><header class="Post-header"><ul><li class="item-user"><div class="PostUser"><h3><a href="#/flarum_test/public/u/john"><img class="Avatar PostUser-avatar" src="<?php echo $this->Url->build('/img/uploads/avatars/default.png');?>" alt="">
<!-- user online icon -->
<!-- <span class="UserOnline"><i aria-hidden="true" class="icon fas fa-circle "></i></span> -->
                                        <span class="username">
                                        <?php echo $discussion[0]['Name']; ?></span></a></h3><ul class="PostUser-badges badges"></ul></div></li><li class="item-meta"><div class="Dropdown PostMeta"><a class="Dropdown-toggle" data-toggle="dropdown"><time pubdate="" datetime="2022-02-23T23:52:19+05:30" title="Wednesday, February 23, 2022 11:52 PM" data-humantime="">2 days ago</time></a><div class="Dropdown-menu dropdown-menu"><span class="PostMeta-number">Post #1</span> <span class="PostMeta-time"><time pubdate="" datetime="2022-02-23T23:52:19+05:30">Wednesday, February 23, 2022 11:52 PM</time></span> <span class="PostMeta-ip"></span><input class="FormControl PostMeta-permalink"></div></div></li></ul></header>
                                        <!-- <div class="Post-body"><h3>Header</h3> -->
<!-- <p><strong>This is some text</strong></p> -->
<?php echo $discussion[0]['fd_post']; ?>
</div>

<!-- <aside class="Post-actions">
    <ul><li class="item-reply"><button class="Button Button--link" type="button"><span class="Button-label">Reply</span></button></li><li class="item-like"><button class="Button Button--link" type="button"><span class="Button-label">like</span></button></li></ul>
</aside> -->
    <!-- <footer class="Post-footer">
    <ul><li class="item-liked"><div class="Post-likedBy"><i aria-hidden="true" class="icon far fa-thumbs-up "></i><a href="/flarum_test/public/u/john">You</a> like this.</div></li></ul>
    </footer> -->
</div></article>

<div class="Post-quoteButtonContainer"></div>
</div>

<div class="PostStream-item" data-index="1" data-time="2022-02-23T18:26:44.000Z" data-number="2" data-id="14" data-type="comment">


<!-- If user is logged in -->
<?php 
    $user_id = $this->request->getSession()->read('user_id');
    // Check if user is logged in
   if($user_id == NULL)
    {
        // echo "User is not logged in"; 
?>

<div class="alert alert-warning">
    <span class="mt-3">Please <a href="<?php echo $this->Url->build('/login');?>">login</a> to add a reply to this discussion.</span>
</div>   
<?php } ?>
<!-- temp div -->
<div id="form-content1"></div>
<?php  
    if($user_id !== NULL)
    {
       
?>
        <article class="Post ReplyPlaceholder"><header class="Post-header"><img class="Avatar PostUser-avatar mt-1" src="<?php echo $this->Url->build('/img/uploads/avatars/default.png');?>" alt="">
            <!-- form start -->
            <div id="form-content">
            <?= $this->Form->create($user, ['id' => 'reg-form', 'method' => 'post', 'action' => '']) ?>
            <textarea name="fcm_text" class="form-control mb-2" placeholder="Write a Reply..."></textarea> 
<button class="Button Button--primary IndexPage-newDiscussion hasIcon" type="submit" itemclassname="App-primaryControl"><i aria-hidden="true" class="icon fa fa-edit Button-icon"></i><span class="Button-label">Post Reply</span></button>
<?php // echo $this->Form->button(__('submit'),['class'=>'btn btn-primary rounded-pill btn-lg']) ?>
                <?= $this->Form->end() ?>  
            </div> 
        <!-- Form end -->
    </header></article>
<?php 
    } 
?>
<!-- End if user is logged in -->

    </div></div></div></div></div></div>
                </div>
            </div>
        </section>
        <!-- Basic features section-->

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
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
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
        <script type="text/javascript">
            $(document).ready(function() {  
                
                // submit form using $.ajax() method
                
                $('#reg-form').submit(function(e){
                    
                    e.preventDefault(); // Prevent Default Submission
                    
                    $.ajax({
                        url: '../addcomment',
                        type: 'POST',
                        data: $(this).serialize() // it will serialize the form data
                    })
                    .done(function(data){
                        $('#form-content').fadeOut('slow', function(){
                            $('#form-content').fadeIn('slow').html(data);
                        });
                        console.log('data submitted');
                        // $("#form-content").fadeIn('slow');
                    })
                    .fail(function(){
                        alert('Ajax Submit Failed ...');    
                    });
                });
            });
        </script>
    </body>
</html>
