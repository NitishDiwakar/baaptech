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

        <style type="text/css">
            /*.offcanvas {
  background-color: blue; 
  width: 50%;
  height: auto;
}*/
        </style>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
            <h5 class="text-white text-center bg-gradient-primary-to-secondary p-2">Events</h5>
        </div>
    </div>

<div class="row">
    <div class="col-12">
        <div id="form-content">
                 <!-- <form method="post" action="" id="reg-form" autocomplete="off">
               
                     <div class="form-group">
                     <input type="text" class="form-control" name="txt_fname" id="lname" placeholder="Name" required />
                     </div>
                        
                     <div class="form-group">
                     <input type="email" class="form-control" name="txt_email" id="lname" placeholder="Email" required />
                     </div>
                                
                     <hr />
                        
                     <div class="form-group">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                
                </form> --> 

                <?= $this->Form->create($user, ['id' => 'reg-form', 'method' => 'post', 'action' => '']) ?>
                            <!-- Name input-->
                            
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <?php echo $this->Flash->render() ?>
                                <legend><?= __('Submit') ?></legend>
                                 
                                <?php  echo $this->Form->control('txt_fname', ['class' => 'form-control', 'label' => 'Name', 'required']); ?>

                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">

                                <?php  echo $this->Form->control('txt_email', ['class' => 'form-control', 'label' => 'Email', 'required']); ?>

                            </div>

                            <div class="d-grid">
                                 <?= $this->Form->button(__('submit'),['class'=>'btn btn-primary rounded-pill btn-lg']) ?>
                            </div>
                        
                        <?= $this->Form->end() ?>    
            </div> <!-- end form content -->
    </div>
</div> <!-- End row -->
                <!-- n -->
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button>

<div class="offcanvas offcanvas-bottom mx-5" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body ">
    ... ad fas fasdf 
  </div>
</div>
                <!-- en -->
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
$(document).ready(function() {  
    
    // submit form using $.ajax() method
    
    $('#reg-form').submit(function(e){
        
        e.preventDefault(); // Prevent Default Submission
        
        $.ajax({
            url: 'testing',
            type: 'POST',
            data: $(this).serialize() // it will serialize the form data
        })
        .done(function(data){
            $('#form-content').fadeOut('slow', function(){
                $('#form-content').fadeIn('slow').html(data);
            });
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
