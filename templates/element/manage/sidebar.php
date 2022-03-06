 <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities_events"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <i class="fa fa-calendar"></i>
                    <span>Events</span>
                </a>
                <div id="collapseUtilities_events" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Events</h6>
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/event_add');?>">Add Event </a> 
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/events');?>">List Events </a> 
                        <!-- <a class="collapse-item" href="#">Telegram Groups <i class="fa fa-telegram"></i></a> -->
                    </div>
                </div>
            </li> <!-- End events -->

            <!-- Nav Item - Groups -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <i class="fa fa-comments"></i>
                    <span>Groups</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Submitted Groups:</h6>
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/groups');?>">All Groups </a> 
                        <!-- <a class="collapse-item" href="#">Telegram Groups <i class="fa fa-telegram"></i></a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-group"></i>
                    <span>Users</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registered Users:</h6>
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/users');?>">All users</a>
                        <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
                    </div>
                </div>
            </li>

            
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <div class="sidebar-heading">
                Other
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <i class="fa fa-inr"></i>
                    <span>Donations</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Donations</h6>
                       
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/donations_pending');?>">Pending Donations</a>
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/donations_verify');?>">Verified Donations</a>
                      
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo $this->Url->build('/manage/suggestions');?>" >
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <i class="fa fa-message"></i>
                    <span>Suggestions</span>
                </a>
            </li>

            <!-- n -->
            <div class="sidebar-heading">
                Forum
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_cat"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <i class="fa fa-list-alt"></i>
                    <span>Categories</span>
                </a>
                <div id="collapsePages_cat" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Forum Categories</h6>
                       
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/category_add');?>">Add Category</a>
                        <a class="collapse-item" href="<?php echo $this->Url->build('/manage/categories');?>">List Category</a>
                      
                    </div>
                </div>
            </li>
            <!-- en -->

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Other</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Submitted by Users</h6>
                       
                        <a class="collapse-item" href="#">Donations</a>
                        <a class="collapse-item" href="#">Contacted Us</a>
                      
                    </div>
                </div>
            </li> -->

