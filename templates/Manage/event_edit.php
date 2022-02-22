<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BAAP Admin - Event Edit</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $this->Url->build('/manage/dashboard');?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BAAP Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $this->Url->build('/manage/dashboard');?>">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           <?= $this->element('manage/sidebar') ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->element('manage/header') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800">Event Edit</h1>
                        <a href="<?php echo $this->Url->build('/manage/events');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa fa-comments fa-sm text-white-50"></i> List Events</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        
                        <!-- Pending Requests Card Example -->
                        

                        <!-- n -->
    <div class="col-9">
        <?php echo $this->Flash->render() ?>

        <?= $this->Form->create($eventAdd, ['enctype' => 'multipart/form-data']) ?>
                            <!-- Name input-->
                            
                            <!-- Email address input-->
    <div class="form-floating mb-3">
        <!-- <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" /> -->
        <!-- <legend><?= __('Event Add') ?></legend> -->
        <?php $event_title = $results[0]['title']; ?>
        <?php  echo $this->Form->control('title', ['class' => 'form-control', 'label' => 'Event Title', 'id' => 'event_title', 'required', 'value' => $event_title]); ?>
        <!-- <label for="email">Email address</label> -->
    </div>

    <div class="form-floating mb-3">
        <?php $event_slug = $results[0]['slug']; ?>
        <?php  echo $this->Form->control('slug', ['class' => 'form-control', 'label' => 'Slug', 'id' => 'slug', 'value' => $event_slug]); ?>
    </div>

<div class="row">
    <div class="col-6">
        <div class="form-floating mb-3">
        <?php $start_date = $results[0]['start_date']; ?>
        <?php  echo $this->Form->control('start_date', ['class' => 'form-control', 'label' => 'Start Date', 'type' => 'date', 'value' => $start_date]); ?>
</div>
    </div>
    <div class="col-6">
        <div class="form-floating mb-3">
        <?php $end_date = $results[0]['end_date']; ?>
        <?php  echo $this->Form->control('end_date', ['class' => 'form-control', 'label' => 'End Date', 'type' => 'date', 'value' => $end_date]); ?>
</div>
    </div>
</div>

 <!-- Banner -->
<div class="row">
    <!-- <div class="col-6">
         <?php  echo $this->Form->control('image', ['class' => 'form-control', 'label' => 'Banner', 'type' => 'file', 'onchange' => 'readURL(this);', 'accept' => 'image/jpeg, image/png', 'required']); ?>
        <img id="blah" class="img img-fluid" src="#" alt="" />
    </div> -->
    <div class="col-6"></div>
</div> 
 <!-- end Banner -->

 <!-- ck editor -->
 <?php $message = $results[0]['message']; ?>
 <?php  echo $this->Form->control('message', ['class' => 'form-control', 'label' => 'Event Description', 'id' => 'editor1', 'required', 'type' => 'textarea', 'value' => $message]); ?>

                            <!-- Submit Button-->
    <div class="d-grid">
         <?= $this->Form->button(__('Update Event'),['class'=>'btn btn-sm btn-primary shadow-sm']) ?>
    </div>
                        <!-- </form> -->
                        <?= $this->Form->end() ?>
    </div>
    <div class="col-3"></div>
                        <!-- en -->
                    </div>

                    <!-- Content Row -->

                    

                    <!-- Content Row -->
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BAAP 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo $this->Url->build('/manage/logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
<script type="text/javascript">

/*$(function(){ // this will be called when the DOM is ready
  $('#event_title').keyup(function() {
    alert('Hello');
  });
});*/

            $("#event_title").keyup(function(){
                // alert('hello');
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text);       
        });
</script>
<script type="text/javascript">
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    // .width(150)
                    .width()
                    .height(150);
            };
            // $('#hd').hide();

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
        CKEDITOR.replace('editor1');
</script>
</body>

</html>