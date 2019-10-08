<?php
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:login.php");
} else {
	
}

include('includes/header.php'); 
include('includes/navbar.php');
include 'includes/link.php';
include 'config.php';
?>
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
             <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
      </head>  
      <body>  


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
                  <span class="mr-2 d-none d-lg-inline text-gray-600 large">Welcome  <i class="fa fa-user"></i><?php echo ucfirst($_SESSION['sess_user']);?> 
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
     

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ADMIN DASHBOARD</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
              
                <br />  

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Job Orders</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered" width="100%" height="100%">  
                          <thead>  
                               <tr>  
                                    <td>Machine ID</td>  
                                    <td>Name</td>  
                                    <td>Division</td>  
                                    <td>Status</td>  
                                    <td>Action</td>  
                               </tr>  
                          </thead>  
                          <?php  
  //                        include('includes/header.php'); 
//include('includes/navbar.php');
//include 'includes/link.php';

                           $sql = 'SELECT `machine_id`, `machine_name`, `machine_division`, `machine_status` FROM `machine`';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["machine_id"].'</td>  
                                    <td>'.$row["machine_name"].'</td>  
                                    <td>'.$row["machine_division"].'</td>  
                                    <td>'.$row["machine_status"].'</td>  
                                    <td>

                                    <form method="POST" action="editmodal/editmachine.php">
                 <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">
              <button name="view_machine" class="btn btn-success" value="" id="" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
            
           
            </form>
				<form method="POST" action="delete.php">
				 <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">
                        <button name="delete_machine" class="btn btn-danger" value="" id="" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
				</form>  
				 </td>
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  