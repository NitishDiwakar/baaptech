<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BAAP Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                        <!-- <h1 class="h3 mb-0 text-gray-800">Users</h1> -->
                        <h1 class="h3 mb-0 text-gray-800">Groups</h1>
                        <a href="<?php echo $this->Url->build('/manage/groups');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa fa-comments fa-sm text-white-50"></i> Submitted Groups</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Pending Requests Card Example -->
                        
                    </div>

                    <!-- Content Row -->

                    

                    <!-- Content Row -->

<?php echo $this->Flash->render() ?>
<h4 class="text-white bg-primary p-1">Unapproved Groups</h4>
                    <div class="row">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Whatsapp Group Name</th>
      <th scope="col">Whatsapp Group Link</th>
      <th scope="col">Telegram Group Name</th>
      <th scope="col">Telegram Group Link</th>
      <th scope="col">Submitted at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i = 1;
        foreach ($unapproved_groups as $unapproved_group)
        {

    ?>
    <tr class="alert alert-warning">
      <th scope="row"><?= $i ?></th>
      <td><?php echo $unapproved_group['name']; ?></td>
      <td><?php echo $unapproved_group['city']; ?></td>
      <td><?php echo $unapproved_group['wa_name']; ?></td>
      <td><a href="<?php echo $unapproved_group['wa_link']; ?>" target="_blank">Click here</a></td>
      <td><?php echo $unapproved_group['tel_name']; ?></td>
      <td><a href="<?php echo $unapproved_group['tel_link']; ?>" target="_blank">Click here</a></td>
      <td><?php echo $unapproved_group['created']; ?></td>
      <td>
        <a title="Remove" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure, you want to delete this group?')" href="<?php echo $this->Url->build('/manage/groups_delete/?id='.$unapproved_group['id'].' ');?>"><i class="fa fa-trash"></i></a>
          <a title="Approve" class="btn btn-success btn-sm" onclick="return confirm('Are you sure, You want to approve this group?')" href="<?php echo $this->Url->build('/manage/groups_verify?id='.$unapproved_group['id'].' ');?>"><i class="fa fa-check"></i></a>
      </td>
    </tr>
<?php 
$i++;
}
?>
    <td colspan="6">
<?php 
    if(empty($unapproved_groups))
    {
        echo "There is no unapproved groups.";
    }
?>
    </td>
   
  </tbody>
</table>


<!-- Approved groups -->

                    </div>
<h4 class="text-white bg-primary p-1">Approved Groups</h4>
<div class="row">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Whatsapp Group Name</th>
      <th scope="col">Whatsapp Group Link</th>
      <th scope="col">Telegram Group Name</th>
      <th scope="col">Telegram Group Link</th>
      <th scope="col">Submitted at</th>
      <th scope="col">Actions</th>
      <!-- <th scope="col">Actions</th> -->
    </tr>
  </thead>
  <tbody>
    <?php 
        $i = 1;
        foreach ($approved_groups as $approved_group)
        {

    ?>
    <tr class="alert alert-success">
      <th scope="row"><?= $i ?></th>
      <td><?php echo $approved_group['name']; ?></td>
      <td><?php echo $approved_group['city']; ?></td>
      <td><?php echo $approved_group['wa_name']; ?></td>
      <td><a href="<?php echo $approved_group['wa_link']; ?>" target="_blank">Click here</a></td>
      <td><?php echo $approved_group['tel_name']; ?></td>
      <td><a href="<?php echo $approved_group['tel_link']; ?>" target="_blank">Click here</a></td>
      <td><?php echo $approved_group['created']; ?></td>
      <!-- <td>
          <a title="Approve" class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to delete this user?')" href="<?php echo $this->Url->build('/manage/groups_verify?id='.$approved_group['id'].' ');?>"><i class="fa fa-check"></i></a>
      </td> -->
      <td>
          <a title="Remove" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure, you want to delete this group?')" href="<?php echo $this->Url->build('/manage/groups_delete/?id='.$approved_group['id'].' ');?>"><i class="fa fa-trash"></i></a>
          <a title="Undo approve" class="btn btn-primary btn-sm " onclick="return confirm('Are you sure, you want to unapprove this group?')" href="<?php echo $this->Url->build('/manage/groups_unapprove/?id='.$approved_group['id'].' ');?>"><i class="fa fa-undo"></i></a>
      </td>
    </tr>

<?php 
$i++;
}
?>
   
  </tbody>
</table>                    

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
                        <span aria-hidden="true">??</span>
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

</body>

</html>