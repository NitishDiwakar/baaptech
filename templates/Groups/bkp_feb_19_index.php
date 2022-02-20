<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
use Cake\Datasource\ConnectionManager;
$conn = ConnectionManager::get('default');
?>
<?php // echo $this->Flash->render() ?>
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

    </head>
    <body id="page-top">
        <!-- Navigation-->
         <?= $this->element('header') ?>
        <!-- Mashead header-->
        
        <!-- Quote/testimonial aside-->
        
        <!-- App features section-->
        <section id="features">
            <?php // print_r($groups); ?>
            <?php
                /*echo "<pre>"; 
                print_r($wa_groups); 
                echo "</pre>";
                echo "states: <br/>";*/

/*$s_names = array();
                foreach ($wa_groups as $wa_group)
                {
                    // echo $wa_group['name'] . "<br>";
                    // echo $wa_group['wa_name'] . "<br>";
                    $state_name = $wa_group['name'];
                    $s_id = $wa_group['s_id'];

                    if( in_array($state_name, $s_names) ) { //If in array, skip iteration
                       continue;
                    }
                    echo $state_name . "<br>";
                    // echo $s_id . "<br>";
                    //n
                 $stmt = $conn->execute('SELECT * FROM groups
                    WHERE state_id = "'.$s_id.'" AND is_approved = 1
                    ');
                 // whatsapp groups
                 $wgs = $stmt ->fetchAll('assoc');
                    // echo $state_name . "<br/";
                 foreach ($wgs as $wg)
                 {
                    echo $wg['wa_name'];
                 }
                 // print_r($wgs);
                    
                    //en
                    $s_names[] = $state_name;
                }
*/
                /*foreach ($tel_groups as $tel_group)
                {
                    echo $tel_group['name'] . "<br>";
                    echo $tel_group['tel_name'] . "<br>";
                }*/

                // n
               /* $stmt1 = $conn->execute('SELECT * from groups');
                $asdf = $stmt1 ->fetchAll('assoc');
                // en*/
            ?>
            <div class="container px-5">
                <?php echo $this->Flash->render() ?>
                <div class="row gx-5 align-items-center">
                    <div class="col-md-6">
                        <p><span>Join your local Whatsapp group of your area</span></p>
                        <!-- table start -->
<?php 
$s_names = array();
                foreach ($wa_groups as $wa_group)
                {
                    // echo $wa_group['name'] . "<br>";
                    // echo $wa_group['wa_name'] . "<br>";
                    $state_name = $wa_group['name'];
                    $s_id = $wa_group['s_id'];

                    if( in_array($state_name, $s_names) ) { //If in array, skip iteration
                       continue;
                    }
 echo "<h6>" . $state_name . "</h6>" ;
                    // echo $s_id . "<br>";
                    //n
                
                 // print_r($wgs);
                    
                    //en
                    
?>
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">City</th>
      <th scope="col">Group Name</th>
      <th scope="col">Join Link</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     $stmt = $conn->execute('SELECT * FROM groups
                    WHERE state_id = "'.$s_id.'" AND is_approved = 1
                    ');
                 // whatsapp groups
                 $wgs = $stmt ->fetchAll('assoc');
                    // echo $state_name . "<br/";
                 $i = 1;
                 foreach ($wgs as $wg)
                 {
                    
                 
    ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $wg['city']; ?></td>
      <td><?php echo $wg['wa_name']; ?></td>
      <td><a href="<?php echo $wg['wa_link']; ?>" target="_blank">Click here</a></td>
    </tr>
<?php 
$i++;
} ?>
  </tbody>
</table>
<?php 
$s_names[] = $state_name;
} // end foreach states 
?>
                        <!-- table end  -->
                    </div>

                    <div class="col-md-6">
                        <p><span>Join your local Telegram group of your area</span></p>
<!-- Telegram Links -->
<!-- table start -->
<?php 
$s_names = array();
                foreach ($tel_groups as $tel_group)
                {
                    // echo $wa_group['name'] . "<br>";
                    // echo $wa_group['wa_name'] . "<br>";
                    $state_name = $tel_group['name'];
                    $s_id = $tel_group['s_id'];

                    if( in_array($state_name, $s_names) ) { //If in array, skip iteration
                       continue;
                    }
    echo "<h6 class='state_name'>" . $state_name . "</h6>";
                    // echo $s_id . "<br>";
                    //n
                
                 // print_r($wgs);
                    
                    //en

?>
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">City</th>
      <th scope="col">Group Name</th>
      <th scope="col">Join Link</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     $stmt = $conn->execute('SELECT * FROM groups
                    WHERE state_id = "'.$s_id.'" AND is_approved = 1
                    ');
                 // telegram groups
                 $tgs = $stmt ->fetchAll('assoc');
                    // echo $state_name . "<br/";
                 $i = 1;
                 foreach ($tgs as $tg)
                 {
                    
                 
    ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $tg['city']; ?></td>
      <td><?php echo $tg['tel_name']; ?></td>
      <td><a href="<?php echo $tg['tel_link']; ?>" target="_blank">Click here</a></td>
    </tr>
<?php 
$i++;
} ?>
  </tbody>
</table>
<?php 
$s_names[] = $state_name;
} // end foreach states 
?>
                        <!-- table end  -->
                    </div>
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

