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
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <!-- Some text and donation button -->
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-0">
                        <!-- Features section device mockup-->
                        <div class="features-device-mockup">
                            <!-- image related to donation here -->
                        </div>
                    </div>
                </div>

                <!-- n -->
                <div class="row">
                    <div class="col-md-3">
                        <!-- User sidebar -->
                        <div  class="text-white bg-gradient-primary-to-secondary p-2">
                            <span>Support us by donation</span>
                        </div>
                        <img src="<?php echo $this->Url->build('/webroot/img/image_upi.jpg');?>" class="img-fluid" >
                        <!-- <a href="#">Donate</a>  -->
                        <br>
                        <br>
                        <a class="btn btn-link" href="<?php echo $this->Url->build('/users/donations');?>">My Donations</a>

                    </div>
                    <div class="col-md-9">
                        
                        <div>
                            <?php echo $this->Flash->render() ?>
                        </div>
                        <!-- Donation form start -->
                        <?php // echo $this->request->getSession()->read('user_id'); ?>
                        <?= $this->Form->create($donation) ?>
                            <!-- Name input-->
                            <legend><?= __('Fill this form to get tokens at binance after successful payment') ?></legend>
                            <div class="row">
                                <div class="col-md-6"><div class="form-floating mb-3">
                                
                                <?php  echo $this->Form->control('full_name', ['class' => 'form-control', 'required']); ?>
                                
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-floating mb-3">

                                <?php  echo $this->Form->control('email', ['class' => 'form-control', 'required']); ?>
                                <!-- <label for="email">Email address</label> -->
                               
                                    </div> 
                                </div>
                            </div> <!-- End row -->
                            
                            <!-- mobile and bnb address -->
                            <div class="row">
                                <div class="col-md-6"><div class="form-floating mb-3">
                                
                                <?php  echo $this->Form->control('mobile', ['class' => 'form-control', 'required']); ?>
                                
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-floating mb-3">

                                <?php  echo $this->Form->control('binanceaddress', ['class' => 'form-control', 'label' => 'Binance Address']); ?>
                                <!-- <label for="email">Email address</label> -->
                               
                                    </div> 
                                </div>
                            </div> <!-- End row -->


                            <!-- State and city -->
                            <div class="row">
                                <div class="col-md-6"><div class="form-floating mb-3">
                                
                                <?php  echo $this->Form->control('state', ['class' => 'form-control', 'required']); ?>
                                
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-floating mb-3">

                                <?php  echo $this->Form->control('city', ['class' => 'form-control', 'label' => 'City', 'required']); ?>
                                <!-- <label for="email">Email address</label> -->
                               
                                    </div> 
                                </div>
                            </div> <!-- End row -->
                            <!-- End state and city -->

                            <!-- amount and bank ref no -->
                            <div class="row">
                                <div class="col-md-6"><div class="form-floating mb-3">
                                
                                <?php  echo $this->Form->control('amt_donated', ['class' => 'form-control', 'label' => 'Amount Donated', 'required']); ?>
                                
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-floating mb-3">

                                <?php  echo $this->Form->control('bank_refno', ['class' => 'form-control', 'label' => 'Bank Reference #', 'required']); ?>
                                <!-- <label for="email">Email address</label> -->
                               
                                    </div> 
                                </div>
                            </div> <!-- End row -->
                            <!-- end amount and bank ref no -->

                            <!-- message -->
                            <div class="row">
                                <div class="col-md-12"><div class="form-floating mb-3">
                                
                                <?php  echo $this->Form->control('message', ['class' => 'form-control', 'label' => 'Message', 'type' => 'textarea']); ?>
                                
                                    </div>
                                </div>
                                
                            </div>

                         
                             

                            <!-- Submit Button-->
                            <div class="d-grid">
                                <!-- <button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button> -->
                                 <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary rounded-pill btn-lg']) ?>
                            </div>
                        <!-- </form> -->
                        <?= $this->Form->end() ?>
                        <!-- End donation form -->
                    </div>
                </div>
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
