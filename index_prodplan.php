<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
  header("location:index");
}else if ($_SESSION["sess_type"] != 4){
  header("location:index?access=denied");
  session_unset();
    session_destroy();
    session_start();
 
} else {
  
}
?>
<?php 
include('navs/prodplan/header.php'); 
include('navs/prodplan/navbar.php');
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
               <form method="POST" action="logout.php">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 large"> Welcome <i class="fa fa-user"></i>  <?php echo ucfirst($_SESSION['acct_name']);?> 
                </span>
                <button type="submit" name="logout" style="background-color: white; border-radius:12px; margin-right: 10px; "><i class="fas fa-sign-out-alt">Log-out</i></button></form>
            
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
              <h6 class="m-0 font-weight-bold text-primary">Job Tickets</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="jtickets" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>J.T. No.</center></th>
                      <th><center>Project Name</center></th>
                      <th><center>Client Name</center></th>
                      <th><center>Date Created</center></th>
                      <th><center>Status</center></th>
                      <th><center>Actions</center></th>
                    </tr>
                  </thead>
          <?php
            $sql="SELECT * FROM job_ticket";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '
                  <tr>
                      <td><center>'.$row['ticket_no'].'</center></td>
                      <td><center>'.$row['proj_name'].'</center></td>
                      <td><center>'.$row['client_name'].'</center></td>
                      <td><center>'.$row['date_time_created'].'</center></td>
                      <td><center>'.$row['status'].'</center></td>
                      <td><center>
                      <div class="row">
                                    <div class="col col-lg-4">
                                    <form method="POST" action="modal/prodplan/editjobticket">
                          <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                          <button name="view_jticket" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>

                            <div class="col col-lg-4">
                                    <form method="POST" action="modal/prodplan/convert">
                          <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                          <button name="convert_jticket" class="btn btn-info" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Convert</button>
                                    </form>
                                    </div>



                                    <div class="col col-lg-4">';
          
           if($row['status'] == "Disabled"){
        echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                        <button name="enable_jticket_plan" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Enable</button>
                  </form>  
                ';
      }else {
           echo '
                  <form method="POST" action="delete">   
                     <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                        <button name="delete_jticket_plan" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Disable</button>
                  </form>  
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
          </div>
        </div>
      </div>
    <script>  
 $(document).ready(function(){  
      $('#jtickets').DataTable();  
 });  
 </script>  

      </div>
        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->

 
<?php  
include ('navs/prodplan/script.php');
include ('navs/prodplan/footer.php');
?>
  

