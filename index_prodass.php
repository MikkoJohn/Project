<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
  header("location:index.php");
}else if ($_SESSION["sess_type"] != 3){
  header("location:index?access=denied");
  session_unset();
    session_destroy();
    session_start();
 
} else {
  
}
?>
<?php 
include('navs/prodass/header.php'); 
include('navs/prodass/navbar.php');
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
            <!-- <h1 class="h3 mb-0 text-gray-800">THIS IS PRODUCTION ASSISTANT</h1> -->
            <iframe src="notif_jt.php" style="width: 30%; margin-left: 50px;top:20%;height: 50px;position: ;">
            </iframe>
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
                                    <div class="col col-lg-6">
                                    <form method="POST" action="modal/prodass/editjobticket">
                       
                          <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                          <button name="view_jticket" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
          
          ';

          if($row['date_checked'] != "0000-00-00 00:00:00"){
           
           echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                        <button name="checked" class="btn btn-primary" style="width:100%;"disabled><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Checked</button>
                  </form>  
                  ';
          }else {
              echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                        <button name="checked" class="btn btn-primary" style="width:100%;" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Checked</button>
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



 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Job Orders</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <table id="jo" class="table table-striped table-bordered" width="100%">  
                        <thead>  
                          <tr>  
                              <th><center>J.O. No.</center></th>
                              <th><center>Project Name</center></th>
                              <th><center>Client Name</center></th>
                              <th><center>Date Created</center></th>
                              <th><center>Status</center></th>
                              <th width="30%"><center>Actions</center></th>
                  
                               </tr>  
                        </thead> 
                        <?php
                            $sql = 'SELECT `job_order_control_no`, `sales_number`, `client_name`, `item_desc_and_title`, `proj_name`, `date_created`, `costing_run`, `finishing_required`, `packaging_required`, `date_to_warehouse`, `requested_delivery`, `quantity`, `size`, `pages`, `paper`, `remarks`, `status` FROM job_order';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                           
                           while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <tr>
                                      <td><center>'.$row['job_order_control_no'].'</center></td>
                                      <td><center>'.$row['proj_name'].'</center></td>
                                      <td><center>'.$row['client_name'].'</center></td>
                                      <td><center>'.$row['date_created'].'</center></td>
                                      <td><center>'.$row['status'].'</center></td>
                                      <td><center>
                          <div class="row">
                                    <div class="col col-lg-4">
                                    <form method="POST" action="modal/prodass/editjoborder">
                       
                          <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                          <button name="view_jo" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>

                        <div class="col col-lg-4">
              ';

          if($row['status'] == "Disabled" || $row['status'] == "Rejected"){
              echo '
                          <form method="POST" action="convert_ass">
                          <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                          <button name="convert_jo" class="btn btn-info" disabled><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Convert</button>
                                    </form>
          ';
        }else {
           echo '
                          <form method="POST" action="convert_ass">
                          <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                          <button name="convert_jo" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Convert</button>
                                    </form>
          ';
        }


        echo '
                                    </div>
                                    <div class="col col-lg-4">';

 if($row['status'] == "Disabled" || $row['status'] == "Rejected"){
        echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                        <button name="enable_jo_ass" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Enable</button>
                  </form>  
                ';
      } else{
           echo '
                  <form method="POST" action="delete">   
                     <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                        <button name="delete_jo_ass" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Disable</button>
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
      $('#jo').DataTable();  
 });  
 </script>  



 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Supplier Info</h6>
            </div>
  <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <table id="aa" class="table table-striped table-bordered" width="100%">  
                        <thead>  
                          <tr>  
                              <th><center>Supplier Name</center></th>
                              <th><center>E-mail Address</center></th>
                              <th><center>Major Products</center></th>
                              <th><center>Status</center></th>
                              <th><center>Action</center></th>
                               </tr>  
                        </thead> 
                        <tbody>
                    <?php
                      $sql = "SELECT * FROM supplier_info";
                      $result = mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                        echo '
                            <tr>
                              <td><center>'.$row['supplier_name'].'</center></td>
                              <td><center>'.$row['email_address'].'</center></td>
                              <td><center>'.$row['major_products'].'</center></td>
                               '; 
                    if($row['status'] == 0){
                      echo '<td><center>Active</center></td>';
                    }else if($row['status'] == 1){
                      echo '<td><center>Disabled</center></td>';
                    }
                             
                            echo '
                              <td>
                              <center>
                          <div class="row">
                                    <div class="col col-lg-12">
                                    <form method="POST" action="modal/prodass/supplier">
                       
                          <input type="hidden" name="supplier_id" value="'.$row['supplier_id'].'">
                          <button name="view_supplier" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="modal" data-target="#viewModal"></span> View</button>
                                    </form>
                                    </div>
                                  
                                  </div></center>

                              </td>
                            </tr>
                        ';
                      }
                    ?>
                      
                   </tbody>
                        
                </table>
  <script>  
 $(document).ready(function(){  
      $('#aa').DataTable();  
 });  
 </script> 









<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transmittal</h6>
            </div>
  <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <table id="tr" class="table table-striped table-bordered" width="100%">  
                        <thead>  
                          <tr>  
                              <th><center>Transmittal ID</center></th>
                              <th><center>Prepared By</center></th>
                              <th><center>Job Order No</center></th>
                              <th><center>Description</center></th>
                              <th><center>Action</center></th>
                               </tr>  
                        </thead> 
                        <tbody>
                    <?php
                      $sql = "SELECT * FROM trasmittal";
                      $result = mysqli_query($conn,$sql);
                      while($row_trans=mysqli_fetch_assoc($result)){
                        echo '
                            <tr>
                              <td><center>'.$row_trans['transmittal_id'].'</center></td>
                              <td><center>'.$row_trans['prep_by'].'</center></td>
                              <td><center>'.$row_trans['jo_no'].'</center></td>
                              <td><center>'.$row_trans['description'].'</center></td>
                               '; 
                            echo '
                              <td>
                              <center>
                          <div class="row">
                                    <div class="col col-lg-12">
                                    <form method="POST" action="modal/prodass/edittransmittal">
                       
            <input type="hidden" name="transmittal_id" value="'.$row_trans['transmittal_id'].'">
                          <button name="view_transmittal" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="modal" data-target="#viewModal"></span> View</button>
                                    </form>
                                    </div>
                                  
        </div></center>

                              </td>
                            </tr>
                        ';
                      }
                    ?>
                      
                   </tbody>
                        
                </table>
  <script>  
 $(document).ready(function(){  
      $('#tr').DataTable();  
 });  
 </script> 








        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->

 
<?php  
include ('navs/prodass/script.php');
include ('navs/prodass/footer.php');
?>
  

