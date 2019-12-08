<?php
session_start(); 
if(!isset($_SESSION["sess_user"])){
  header("location:index.php");
}else if ($_SESSION["sess_type"] != 9){
  header("location:index?access=denied");
  session_unset();
    session_destroy();
    session_start();
 
} else {

}
  
?>
<?php 
include('navs/genservass/header.php'); 
include('navs/genservass/navbar.php');
//include('includes/header.php'); 
//include('includes/navbar.php');
//include 'includes/link.php';
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
               <form method="POST" action="logout">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 large">Welcome  <i class="fa fa-user"></i>  <?php echo ucfirst($_SESSION['acct_name']);?> 
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
     
            <iframe src="notif.php" style="width: 30%; margin-left: 0px;top:20%;height: 50px;position: ;">
            </iframe>
            <iframe src="notif_jt.php" style="width: 30%; margin-left: 0px;top:20%;height: 50px;position: ;">
            </iframe>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>


          <!--                                             -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Materials</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="material" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="2%"><center>Material ID</center></th>
                      <th><center>Item Name</center></th>
                      <th width="8%"><center>Quantity</center></th>
                      <th width="20%"><center>Add</th>
                        <!-- <th width="22%"><center>Release</th> -->
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
                  <td><center>'.$row['quantity'].'</center></td>
                   <td><center>
                   <div class="row">
                   <div class="col col-sm-6">
                    <form method="POST" action="addquantity">
                          <input type="hidden" name="material_id"  value="'.$row['material_id'].'">
                  ';
                  if($row['status'] == 1){
                        echo '
                            <input type="number" class="form-control" placeholder="Quantity" min="1" name="quantity" disabled>
                            ';
                    }else if($row['status'] == 0){
                        echo '
                            <input type="number" class="form-control" placeholder="Quantity" min="1" name="quantity" style="width:110px;">
                            ';
                    }
                echo '
                    </div>
                    <div class="col col-sm-6">
                    ';
                    if($row['status'] == 1){
                    echo '
                          <button name="" class="btn btn-danger" style="width:%;" disabled> Disabled</button>
                      ';
                    }else if($row['status'] == 0){
                  echo '
                          <button name="add_quantity_genass" class="btn btn-info" style="width:%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Add</button>
                      ';
                    }
            echo '
                      

                      </form>
                
                    </div>
                    </div>
                   </center></td>
              
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
                                    <form method="POST" action="modal/genservass/editmaterial">
                       
                          <input type="hidden" name="material_id" value="'.$row['material_id'].'">
                          <button name="view_material" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                   ';
                                     if($row['status'] == "0"){
           echo '
                  <form method="POST" action="delete">   
                     <input type="hidden" name="material_id" value="'.$row['material_id'].'">
                        <button name="delete_material_genass" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Disable</button>
                  </form>  
                ';
      }else if($row['status'] == "1"){
        echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="material_id" value="'.$row['material_id'].'">
                        <button name="enable_material_genass" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Enable</button>
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
      $('#material').DataTable();  
 });  
 </script> 




<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Purchase Requisition</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="pr" width="99%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="8%"><center>Purchase Requisition No</center></th>
                      <th width="15%"><center>Item Name</center></th>
                      <!-- <th width="15%"><center>Item Description</th> -->
                      <th width="10%"><center>Status</center></th>
                      <th width="15%"><center>Actions</center></th>
                    </tr> 
                  </thead>
                     <tbody>
                      <?php
                         $sql = 'SELECT * FROM `purchase_requisition`';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                          echo ' <tr>
                                    <td><center>'.ucfirst($row['purchase_requisition_no']).'</td>
                                    <td><center>'.ucfirst($row['item_name']).'</td>
                                  
                                    <td><center>'.ucfirst($row['status']).'</td>
                                    <td><center>
                                    <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="modal/genservass/editpurchase">
                       
                          <input type="hidden" name="purchase_requisition_no" value="'.$row['purchase_requisition_no'].'">
                          <button name="view_purchase" class="btn btn-success" style="width:100%;" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">';
         
      if($row['status'] == "Disabled"){
        echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="purchase_requisition_no" value="'.$row['purchase_requisition_no'].'">
                        <button name="enable_pr" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Enable</button>
                  </form>  
                ';
      } else{
           echo '
                  <form method="POST" action="delete">   
                     <input type="hidden" name="purchase_requisition_no" value="'.$row['purchase_requisition_no'].'">
                        <button name="delete_pr" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Disable</button>
                  </form>  
                ';
              }

      echo '
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
      $('#pr').DataTable();  
 });  
 </script> 


<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Material Request</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="mr" width="99%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="8%"><center>Job Order Control No</center></th>
                      <th width="8%"><center>Kind of Paper</center></th>
                      <th width="8%"><center>Quantity</th>
                      <th width="10%"><center>Status</center></th>
                      <th width="25%"><center>Actions</center></th>
                    </tr> 
                  </thead>
                     <tbody>
                      <?php
                         $sql = 'SELECT * FROM `material_request_form`';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                          echo ' <tr>
                                    <td><center>'.ucfirst($row['job_order_control_no']).'</td>
                                    <td><center>'.ucfirst($row['kind_of_paper']).'</td>
                                    <td><center>'.ucfirst($row['quantity']).'</td>
                                    <td><center>'.ucfirst($row['pending_status']).'</td>
                                    <td><center>
                                    <div class="row">
                                    <div class="col col-lg-4">
                                    <form method="POST" action="modal/genservass/editmaterialrequest">
                       
                          <input type="hidden" name="request_id" value="'.$row['request_id'].'">
                          <button name="view_purchase" class="btn btn-success" style="width:100%;" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-4">
         
   
                  <form method="POST" action="modal/genservass/approve">   
                     <input type="hidden" name="request_id" value="'.$row['request_id'].'">
                        <button name="approve_mr" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Approve</button>
                  </form>  
      </div>
      <div class="col col-lg-4">
                  <form method="POST" action="modal/genservass/approve">   
                     <input type="hidden" name="request_id" value="'.$row['request_id'].'">
                        <button name="disapprove_mr" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Reject</button>
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
      $('#mr').DataTable();  
 });  
 </script> 




      </div>
        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->

 
<?php  
include ('navs/genservass/script.php');
include ('navs/genservass/footer.php');
?>
  

