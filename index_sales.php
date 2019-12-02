<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
  header("location:index.php");
}else if ($_SESSION["sess_type"] != 6){
  header("location:index?access=denied");
  session_unset();
    session_destroy();
    session_start();
 
} else {
  
}
?>
<?php 
include('navs/sales/header.php'); 
include('navs/sales/navbar.php');
include 'config.php';
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

      

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
           <!--  <iframe src="notif.php" style="width: 30%; margin-left: 0px;top:20%;height: 50px;position: ;">
            </iframe> -->
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
                                    <div class="col col-lg-6">
                                    <form method="POST" action="modal/sales/editjoborder">
                       
                          <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                          <button name="view_jo" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">';

 if($row['status'] == "Disabled" || $row['status'] == "Rejected"){
        echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                        <button name="enable_jo_sales" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Enable</button>
                  </form>  
                ';
      } else{
           echo '
                  <form method="POST" action="delete">   
                     <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                        <button name="delete_jo_sales" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Disable</button>
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
                                    <form method="POST" action="modal/sales/editjobticket">
                       
                          <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                          <button name="view_jticket" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">';
          
           if($row['status'] == "Disabled"){
        echo '
                  <form method="POST" action="enable">   
                     <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                        <button name="enable_jticket" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Enable</button>
                  </form>  
                ';
      }else {
           echo '
                  <form method="POST" action="delete">   
                     <input type="hidden" name="ticket_no" value="'.$row['ticket_no'].'">
                        <button name="delete_jticket" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Disable</button>
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
             



<!--  -->

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
include ('navs/sales/script.php');
include ('navs/sales/footer.php');
?>
  

