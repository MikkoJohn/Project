
<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:index.php");
  exit();
}else if ($_SESSION["sess_type"] != 1){
  header("location:index?access=denied");
  session_unset();
    session_destroy();
    session_start();
 exit();
} else {

}
	
$currmonth =date('M');
$curryear =date('Y');


?>


<?php 
include('includes/header.php'); 
include('includes/navbar.php');
//include 'includes/link.php';
include 'config.php';
//session_start();
?>    <!-- Content Wrapper -->
<?php

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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

<!-- //notif bell -->
<!-- <li>
 <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none;"><span class="label label-pill label-danger count" style="border-radius:50px;color:white;background-color:red;font-size: 15px; font-family: arial;"></span> <span class="fa fa-bell" style="font-size:25px;color:#1a0000;"></span></a>
</li> -->

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
            <h1 class="h3 mb-0 text-gray-800">ADMIN DASHBOARD</h1>
            <iframe src="notif" style="width: 30%; margin-left: 0px;top:20%;height: 50px;position: ;">
            </iframe>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>


         <div class="card shadow mb-4">
            <div class="card-body">

<div class="row">
    <div class="col col-lg-3">
        <div class="icon" style="background-color: blue;">
            <a href="view_plan.php" style="cursor: pointer;"><i class="fas fa-list  " style="color:white;font-size: 50px;padding: 10px;"></i></a>
          </div>       
     <h4 class="font">Queue for Job Orders</h4>
   <?php

   ?>             
                
    </div>
    <div class="col col-lg-3">
        <div class="icon" style="background-color: #ff0048;">
           <a href="view_done_plan.php" style="cursor: pointer;"><i class="fas fa-tasks" style="color:white;font-size: 50px;padding: 10px;"></i></a>
          </div>       
                 <h4 class="font">Completed Job Order <?php echo $currmonth; ?></h4>
              <?php

   ?>         
    </div>
    <div class="col col-lg-3">
        <div class="icon" style="background-color: #44f733;">
         <a href="view_all_plan.php" style="cursor: pointer;"><i class="fas fa-chart-area" style="color:white;font-size: 50px;padding: 10px;"></i></a>
          </div>       
                 <h4 class="font">Total Job Order for <?php echo $curryear; ?></h4>
    <?php



    ?>
    </div>
    <div class="col col-lg-3">
        <div class="icon" style="background-color: orange;">
        <a href="view_all_done.php"><i class="far fa-calendar-check" style="color:white;font-size: 50px;padding: 10px;"></i></a>
          </div>    
           <h4 class="font">Total Completed Job Order for <?php echo $curryear; ?></h4>   
<?php
   ?>         
                
    </div>
</div>
</div>
</div>


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Account Transactions</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <table id="accounts" class="table table-striped table-bordered" width="100%">  
                        <thead>  
                          <tr>  
                              <th><center>Account Name</center></th>
                              <th><center>Account Designation</center></th>
                              <th><center>Date</center></th>
                              <th><center>Action Done</center></th>
                               </tr>  
                        </thead> 
                        <tbody>
                        <?php
                        $sql = 'SELECT * FROM user_action';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                           
                           while($row = mysqli_fetch_assoc($result)){
                                echo '
                                    <tr>
                                       <td>'.$row['username'].'</td>
                                        ';
                            if($row['user_designation'] == 1){
                              echo '<td>Admin</td>';
                            }else if($row['user_designation'] == 2){
                               echo '<td>Production Head</td>';
                            }else if($row['user_designation'] == 3){
                               echo '<td>Production Assisstant</td>';
                            }else if($row['user_designation'] == 4){
                               echo '<td>Production Planner</td>';
                            }else if($row['user_designation'] == 5){
                               echo '<td>Division Supervisor</td>';
                            }else if($row['user_designation'] == 6){
                               echo '<td>Sales</td>';
                            }else if($row['user_designation'] == 7){
                               echo '<td>Operator</td>';
                            }
                                 echo '       
                                        
                                        <td>'.$row['action_date'].'</td>
                                        <td>'.$row['action_done'].'</td>
                                    </tr>
                                ';
                           }

                        ?>
                    
                   </tbody>
                        
                </table>
  <script>  
 $(document).ready(function(){  
      $('#accounts').DataTable();  
 });  
 </script>  

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Accounts</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <table id="accounts" class="table table-striped table-bordered" width="100%">  
                        <thead>  
                          <tr>  
                              <th><center>Account Name</center></th>
                              <th><center>Account Designation</center></th>
                              <th><center>Action</center></th>
                               </tr>  
                        </thead> 
                        <tbody>
                        <?php
                        $sql = 'SELECT * FROM tbl_useraccounts where user_type != 1';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                           
                           while($row = mysqli_fetch_assoc($result)){
                                echo '
                                    <tr>
                                       <td><center>'.$row['uname'].'<center></td>
                                        ';
                            if($row['user_type'] == 1){
                              echo '<td><center>Admin</center></td>';
                            }else if($row['user_type'] == 2){
                               echo '<td><center>Production Head</center></td>';
                            }else if($row['user_type'] == 3){
                               echo '<td><center>Production Assisstant</center></td>';
                            }else if($row['user_type'] == 4){
                               echo '<td><center>Production Planner</center></td>';
                            }else if($row['user_type'] == 5){
                               echo '<td><center>Division Supervisor</center></td>';
                            }else if($row['user_type'] == 6){
                               echo '<td><center>Sale</center>s</td>';
                            }else if($row['user_type'] == 7){
                               echo '<td><center>Operator</center></td>';
                            }else if($row['user_type'] == 8){
                               echo '<td><center>General Services</center></td>';
                            }else if($row['user_type'] == 9){
                               echo '<td><center>General Services Assistant</center></td>';
                            }
                                 echo '       
                                        <td><center>
                          <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editmodal/editaccount.php">
                       
                          <input type="hidden" name="acc_id" value="'.$row['ua_id'].'">
                          <button name="view_account" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                    <form method="POST" action="delete">
         <input type="hidden" name="acc_id" value="'.$row['ua_id'].'">
                        <button name="delete_account" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Disable</button>
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
      $('#accounts').DataTable();  
 });  
 </script>  

               
          </div>
        </div>
        </div>
          

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
                              <th width="28%"><center>Actions</center></th>
                  
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
                                    <form method="POST" action="editmodal/editjoborder.php">
                       
                          <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                          <button name="view_jo" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>

                        <div class="col col-lg-4">
                          <form method="POST" action="convert">
                          <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                          <button name="convert_jo" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Convert</button>
                                    </form>
                                    </div>



                                    <div class="col col-lg-4">
                                    <form method="POST" action="delete">
         <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                        <button name="delete_jo" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Disable</button>
        </form>  
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
                                    <form method="POST" action="editmodal/editjobticket.php">
                       
                          <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                          <button name="view_jticket" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                    <form method="POST" action="delete">
         <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                        <button name="delete_jticket" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Disable</button>
        </form>  
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
              <h6 class="m-0 font-weight-bold text-primary">Operators</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="operator" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>Operator ID No</center></th>
                      <th><center>Operator Name</center></th>
                      <th><center>Division</th>
                      <th><center>Machine Assignment</center></th>
                      <th><center>Schedule</center></th>
                      <th><center>Actions</center></th>
                    </tr> 
                  </thead>
                        <a data-toggle="modal" data-target="#ViewOperator">
                          <button type="button" class="btn btn-warning btn-xs">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true">  View</span></button>
                            
                            </a>
                        <a data-toggle="modal" data-target="#EditOperator">
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Edit</span></button>
                          </a>
                          <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                      </td>
                     
                    </tr>
                   
                  
                    </tbody>
                </table>
          </div>
        </div>
        </div>

   <script>  
 $(document).ready(function(){  
      $('#operator').DataTable();  
 });  
 </script> 


 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Machines</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="machine" width="99%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="8%"><center>Machine ID No</center></th>
                      <th width="15%"><center>Machine Name</center></th>
                      <th width="15%"><center>Division</th>
                      <th width="10%"><center>Status</center></th>
                      <th width="15%"><center>Actions</center></th>
                    </tr> 
                  </thead>
                     <tbody>
                      <?php
                         $sql = 'SELECT `machine_id`, `machine_name`, `machine_division`, `machine_status` FROM `machine`';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                          echo ' <tr>
                                    <td><center>'.ucfirst($row['machine_id']).'</td>
                                    <td><center>'.ucfirst($row['machine_name']).'</td>
                                    <td><center>'.ucfirst($row['machine_division']).'</td>
                                    <td><center>'.ucfirst($row['machine_status']).'</td>
                                    <td><center>
                                    <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editmodal/editmachine.php">
                       
                          <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">
                          <button name="view_machine" class="btn btn-success" style="width:100%;" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                    <form method="POST" action="delete">
         <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">
                        <button name="delete_machine" class="btn btn-danger" style="width:100%;" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Disable</button>
        </form>  
        </div>
        </div>
                                    </td>
                                </tr>';
                              }
                      ?>
                     
                       
                    </tbody>
                     
                    
                   
                  
                 
                </table>
          </div>
        </div>
        </div>

   <script>  
 $(document).ready(function(){  
      $('#machine').DataTable();  
 });  
 </script> 

      <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Materials</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="material" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>Material ID</center></th>
                      <th><center>Item Name</center></th>
                      <th><center>Item Description</th>
                      <th><center>Category</center></th>
                      <th><center>Status</center></th>
                      <th><center>Actions</center></th>
                    </tr> 
                  </thead>
        <?php
          $sql = "SELECT * FROM materials";
          $result = mysqli_query($conn, $sql);
          while ($row=mysqli_fetch_assoc($result)){
            echo '
              <tr>
                  <td><center>'.$row['material_id'].'</center></td>
                  <td><center>'.$row['item_name'].'</center></td>
                  <td><center>'.$row['item_desc'].'</center></td>
                  <td><center>'.$row['category'].'</center></td>
                  ';
            if($row['status'] == 1){
              echo '<td><center>Disabled</center></td>';
            }else if($row['status'] == 0){
              echo '<td><center>Active</center></td>';
            }
              echo'
                  
                  <td><center>
                    <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editmodal/editmaterial.php">
                       
                          <input type="hidden" name="material_id" value="'.$row['material_id'].'">
                          <button name="view_material" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                    <form method="POST" action="delete">
         <input type="hidden" name="material_id" value="'.$row['material_id'].'">
                        <button name="delete_material" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Disable</button>
        </form>  
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
      $('#material').DataTable();  
 });  
 </script> 



   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Work Order</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="wo" width="100%" cellspacing="0">
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
                 if($row['status'] == 1){
                      echo '<td><center>Disabled</center></td>';
                    }else{
                      echo '<td><center>'.$row['status'].'</center></td>';
                    }
              echo '
                 
                  <td><center>
                    <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editmodal/editworkorder">
                       
                          <input type="hidden" name="wo_id" value="'.$row['work_order_no'].'">
                          <button name="view_wo" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                    <form method="POST" action="delete">
         <input type="hidden" name="wo_id" value="'.$row['work_order_no'].'">
                        <button name="delete_wo" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Disable</button>
        </form>  
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
      $('#wo').DataTable();  
 });  
 </script> 





        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Paper</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Item No.</th>
                      <th>Item Name</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Item No.</th>
                      <th>Item Name</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2011/04/25</td>
                      <td>Pending</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>2011/07/25</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>2009/01/12</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    </tbody>
                </table>
          </div>
        </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ink</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Item No.</th>
                      <th>Item Name</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Item No.</th>
                      <th>Item Name</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2011/04/25</td>
                      <td>Pending</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>2011/07/25</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>2009/01/12</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    </tbody>
                </table>
          </div>
        </div>
      </div>
      <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Chemicals</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Item No.</th>
                      <th>Item Name</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Item No.</th>
                      <th>Item Name</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2011/04/25</td>
                      <td>Pending</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>2011/07/25</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>2009/01/12</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    </tbody>
                </table>
          </div>
        </div>
    </div>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Report ID No.</th>
                      <th>Project Name</th>
                      <th>Division</th>
                      <th>Date Created</th>
                      <th>Remarks</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Report ID No.</th>
                      <th>Project Name</th>
                      <th>Division</th>
                      <th>Date Created</th>
                      <th>Remarks</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>2011/04/25</td>
                      <td>Pending</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                          <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>2011/07/25</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                          <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>2009/01/12</td>
                      <td>On Going</td>
                      <td>
                        <center>
                          <button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                          <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                      </td>
                    </tr>
                    </tbody>
                </table>
          </div>
        </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records

// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>
 
<?php  
include ('includes/script.php');
include ('includes/footer.php');
?>
  