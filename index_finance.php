<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
  header("location:index.php");
}else if ($_SESSION["sess_type"] != 10){
  header("location:index?access=denied");
  session_unset();
    session_destroy();
    session_start();
 
} else {
  
}
?>
<?php 
include('navs/finance/header.php'); 
include('navs/finance/navbar.php');
include 'config.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                 <!-- <img class="img-profile rounded-circle" src="#"> -->
               <form method="POST" action="logout.php">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 large">Welcome!  <i class="fa fa-user"></i>  <?php echo ucfirst($_SESSION['acct_name']);?> 
                </span>
                <button type="submit" name="logout" style="background-color: white; border-radius:12px; "><i class="fa fa-sign-out">Log-out</i></button></form>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="account_logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Work Order</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="workorder" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>Work Order ID</center></th>
                      <th><center>Job Description</center></th>
                      <th><center>Supplier Name</th>
                      <th><center>Status</center></th>
                      <th><center>Actions</center></th>
                    </tr>
                  </thead>
                    <?php
          $sql = "SELECT * FROM work_order";
          $result = mysqli_query($conn, $sql);
          while ($row=mysqli_fetch_assoc($result)){
            echo '
              <tr>
                  <td><center>'.$row['work_order_no'].'</center></td>
                  <td><center>'.$row['job_desc'].'</center></td>
                  <td><center>'.$row['s_name'].'</center></td>
              ';
                 if($row['status'] == "1"){
                      echo '<td><center>Disabled</center></td>';
                    }else if($row['status'] == "0"){
                        echo '<td><center>Pending</center></td>';
                    }else{
                      echo '<td><center>'.$row['status'].'</center></td>';
                    }
              echo '
                 
                  <td><center>
                    <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="modal/finance/editworkorder">
                                       <input type="hidden" name="wo_id" value="'.$row['work_order_no'].'">
                                      <button name="view_wo" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                        ';


          if($row['status'] == "1"){
            echo '
                                    <div class="col col-lg-6">
                                    <form method="POST" action="modal/finance/editworkorder">
                                       <input type="hidden" name="wo_id" value="'.$row['work_order_no'].'">
                                      <button name="view_wo" class="btn btn-primary" style="width:100%;" disabled>Approve</button>
                                    </form>
                                    </div>
                                   ';
          }else {
             echo '
                                    <div class="col col-lg-6">
                                    <form method="POST" action="modal/finance/editworkorder">
                                       <input type="hidden" name="wo_id" value="'.$row['work_order_no'].'">
                                      <button name="view_wo" class="btn btn-primary" style="width:100%;">Approve</button>
                                    </form>
                                    </div>
                                   ';
          }
    

      echo '
        </div>
        </div></center>
        </td>
              </tr>
            ';
          }
        ?>               
                </table>

  <script>  
 $(document).ready(function(){  
      $('#workorder').DataTable();  
 });  
 </script>  


          </div>
        </div>
        </div>



<!--                             -->

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Purchase Request</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="prequest" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>J.O. No.</th>
                      <th>Project Name</th>
                      <th>Client Name</th>
                      <th>Date Created</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  
                </table>

  <script>  
 $(document).ready(function(){  
      $('#prequest').DataTable();  
 });  
 </script>  


          </div>
        </div>
        </div>



      </div>
        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->

 
<?php  
include ('navs/prodass/script.php');
include ('navs/prodass/footer.php');
?>
  

