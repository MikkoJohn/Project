<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:login.php");
} else {
	
}
?>


<?php 
include('includes/header.php'); 
include('includes/navbar.php');
//include 'includes/link.php';
include 'config.php';
//session_start();
?>    <!-- Content Wrapper -->
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
     

            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">      
                
                <!-- <img class="img-profile rounded-circle" src="#"> -->
               <form method="POST" action="logout.php">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 large">Welcome  <i class="fa fa-user"></i>  <?php echo ucfirst($_SESSION['acct_name']);?> 
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
            <h1 class="h3 mb-0 text-gray-800">ADMIN DASHBOARD</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                              <td><center>J.O. No.</center></td>
                              <td><center>Project Name</center></td>
                              <td><center>Client Name</center></td>
                              <td><center>Date Created</center></td>
                              <td><center>Status</center></td>
                              <td width="15%"><center>Actions</center></td>
                  
                               </tr>  
                        </thead> 
                        <?php
                            $sql = 'SELECT IFNULL("-",job_order_control_no)job_order_control_no,item_desc_and_title,client_name,requested_delivery,remarks FROM job_order';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                           
                           while($row = mysqli_fetch_assoc($result)){
                                echo '
                                      <td><center>'.$row['job_order_control_no'].'</center></td>
                                      <td><center>'.$row['item_desc_and_title'].'</center></td>
                                      <td><center>'.$row['client_name'].'</center></td>
                                      <td><center>'.$row['requested_delivery'].'</center></td>
                                      <td><center>'.$row['remarks'].'</center></td>
                                      <td><center>
                          <div class="row">
                          <div class="col col-sm-6">
                        <form method="POST" action="editmodal/editmachine.php"> 

                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                        </form>
                        </div>
                        <div class="col col-sm-6">
                        <form method="POST" action=""> 
                          <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </form>
                        </div>
                        </div>
                        </center>
                   </td>
                                ';
                           }

                        ?>
                    
                   
                        
                </table>
  <script>  
 $(document).ready(function(){  
      $('#jo').DataTable();  
 });  
 </script>  



               
          </div>
        </div>
        </div>


            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Job Tickets</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="jtickets" width="100%" cellspacing="0">
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
                 
                        <center>
                          <button type="button" class="btn btn-warning btn-xs">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
                          <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> View</button>
                            <button type="button" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </center>
                   
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
                <table class="table table-bordered" id="operator" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>Operator ID No</center>.</th>
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
                <table class="table table-bordered" id="machine" width="99%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="13%"><center>Machine ID No</center></th>
                      <th width="15%"><center>Machine Name</center></th>
                      <th width="15%"><center>Division</th>
                      <th width="10%"><center>Status</center></th>
                      <th width="13%"><center>Actions</center></th>
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
                                    <td><center>'.strtoupper($row['machine_id']).'</td>
                                    <td><center>'.strtoupper($row['machine_name']).'</td>
                                    <td><center>'.strtoupper($row['machine_division']).'</td>
                                    <td><center>'.strtoupper($row['machine_status']).'</td>
                                    <td><center>
                                    <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editmodal/editmachine.php">
                       
                          <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">
                          <button name="view_machine" class="btn btn-success" value="" id="" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                    <form method="POST" action="delete.php">
         <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">
                        <button name="delete_machine" class="btn btn-danger" value="" id="" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
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
                              <td><center>Account Name</center></td>
                              <td><center>Account Type</center></td>
                              <td><center>Date</center></td>
                              <td><center>Action Made</center></td>
                              <td><center>Category</center></td>
                             
                  
                               </tr>  
                        </thead> 
                        <?php
                            $sql = 'SELECT IFNULL("-",job_order_control_no)job_order_control_no,item_desc_and_title,client_name,requested_delivery,remarks FROM job_order';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                           
                           while($row = mysqli_fetch_assoc($result)){
                                echo '
                                    <tr>
                                    <td></td>
                                    </tr>
                                ';
                           }

                        ?>
                    
                   
                        
                </table>
  <script>  
 $(document).ready(function(){  
      $('#jo').DataTable();  
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
include ('includes/script.php');
include ('includes/footer.php');
?>
