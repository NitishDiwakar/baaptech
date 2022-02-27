<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <!-- <a class="navbar-brand fw-bold" href="#page-top">BAAP</a> -->
                 <?php 
                    echo $this->Html->link(
                        'BAAP',
                        ['controller' => 'Home', 'action' => 'index', '_full' => true], ['class' => 'navbar-brand fw-bold']
                    );
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0" style="font-size: 80%;">
                        <li class="nav-item">
                            <?php 
                                echo $this->Html->link(
                                    'About Us',
                                    ['controller' => 'AboutUs', 'action' => 'index', '_full' => true], ['class' => 'nav-link me-lg']
                                );
                            ?>
                        </li>
                        <li class="nav-item"> 
                             <?php 
                                echo $this->Html->link(
                                    'Contact Us',
                                    ['controller' => 'ContactUs', 'action' => 'index', '_full' => true], ['class' => 'nav-link me-lg']
                                );
                            ?>
                        </li>
                        <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="/login">Login</a></li> -->
                        <li class="nav-item">
                            <?php 
                            
                                echo $this->Html->link(
                                    'Submit group links',
                                    ['controller' => 'Groups', 'action' => 'add', '_full' => true], ['class' => 'nav-link me-lg']
                                );
                            ?>

                        </li>

                        <li class="nav-item">
                            <?php 
                                echo $this->Html->link(
                                    'Donation',
                                    ['controller' => 'Donation', 'action' => '', '_full' => true], ['class' => 'nav-link me-lg']
                                );
                            ?>
                        </li>

                        <li class="nav-item">
                            <?php 
                                echo $this->Html->link(
                                    'Events',
                                    ['controller' => 'Events', 'action' => 'index', '_full' => true], ['class' => 'nav-link me-lg']
                                );
                            ?>
                        </li>

                        <li class="nav-item">
                            <?php 
                                echo $this->Html->link(
                                    'Forum',
                                    ['controller' => 'Forum', 'action' => 'index', '_full' => true], ['class' => 'nav-link me-lg']
                                );
                            ?>
                        </li>
                       
                    </ul>
                    <!--  -->
                    <!-- <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">Donation</span>
                        </span>
                    </button> -->
                    <!--  -->
                    <?php 
                    // Show login button if user is not logged in
                    if(empty($this->request->getSession()->read('user_id')))
                            {
                                // echo "sest";
                    ?>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" onclick="location.href='<?php echo $this->Url->build('/users/login');?>';">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <!-- <i class="bi bi-currency-bitcoin me-2"></i> -->
                            <span class="small">Login</span>
                        </span>
                    </button>
                    <?php 
                    } ?>

                    <?php if(!empty($this->request->getSession()->read('user_id')))
                            {
                                // echo "sest";
                    ?>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" onclick="location.href='<?php echo $this->Url->build('/users/logout');?>';">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <!-- <i class="bi bi-currency-bitcoin me-2"></i> -->
                            <span class="small">Logout</span>
                        </span>
                    </button>
                    <?php 
                    } ?>
                    

                    <!-- n -->
                    &nbsp;
                    <button class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0" onclick="location.href='<?php echo $this->Url->build('/groups');?>';">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-whatsapp me-2"></i>
                            <!-- <i class="bi bi-currency-bitcoin me-2"></i> -->
                            <span class="small">Join Local Groups</span>
                        </span>
                    </button>
                    <!-- en -->
                    
                </div>
            </div>
        </nav>