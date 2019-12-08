<?php
date_default_timezone_set("Asia/Manila");
$now = date("Y-m-d H:i:s");
    session_start();
    include_once '../../config.php';
    // include '../../includes/link.php';
    // include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

        <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!-- bootstrap CDN -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
        <!-- font awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- Font CDN -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <!-- jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Mikko CDN tangina ang gulo puta -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!--additional-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>  

</head>
<body>
  <a href="../../index_sales" class="btn btn-primary" style="margin-top:1%;margin-left: 1%;">BACK</a>
<div class="container">
 <br>
 <?php
 //echo  $accname;
 ?>
  <!-- Trigger the modal with a button -->
 
<!-- <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Edit</button>
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add</button> -->
  <!-- Modal -->


     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
              <div class="col-lg-6">
                <h5 class="m-0 font-weight-bold text-primary">Client Info</h5>
              </div>
              <div class="col-lg-6" align="right">
               <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add</button>
             </div>
           </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <table id="aa" class="table table-striped table-bordered" width="100%">  
                        <thead>  
                          <tr>  
                              <th><center>Client Name</center></th>
                              <th><center>Sales Representative</center></th>
                              <th><center>Company</center></th>
                              <th><center>Status</center></th>
                              <th><center>Action</center></th>
                               </tr>  
                        </thead> 
                        <tbody>
                    <?php
                      $sql = "SELECT * FROM client_info";
                      $result = mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                        echo '
                            <tr>
                              <td><center>'.$row['client_name'].'</center></td>
                              <td><center>'.$row['sales_representative'].'</center></td>
                              <td><center>'.$row['company'].'</center></td>
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
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editclient">
                       
                          <input type="hidden" name="client_id" value="'.$row['client_id'].'">
                          <button name="view_client" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="modal" data-target="#viewModal"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">';
            if($row['status'] == 0){
                      echo '
                                    <form method="POST" >
         <input type="hidden" name="client_id" value="'.$row['client_id'].'">
                        <button name="delete_client" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Disable</button>
        </form>  ';
      }else if($row['status'] == 1){
                      echo '
                                    <form method="POST">
         <input type="hidden" name="client_id" value="'.$row['client_id'].'">
                        <button name="enable_client" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Enable</button>
        </form>  ';
      }


echo '        
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



  <div class="modal fade" id="myModal" role="dialog"style="width: 100%;">
    <div class="modal-dialog modal-lg" style="width: 100%;">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%;">
        <div class="modal-header">
          <h5>Add Client</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST" onsubmit="return confirm('Are you sure?')">
              <div class="row">
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Client Name:</h6>
                  <input type="text" name="c_name" class="form-control" placeholder="Client Name" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Sales Representative:</h6>
                  <select name="s_rep" class="form-control" required>
                    <option value="NULL" disabled selected>SELECT SALES REPRESENTATIVE</option>
        <?php
      $sql_sales = "SELECT * FROM tbl_useraccounts WHERE user_type = 6";
      $result_sales = mysqli_query($conn,$sql_sales);
      while($row_sales = mysqli_fetch_assoc($result_sales)){
              echo '
                  <option value="'.ucfirst($row_sales['fname']).' '.ucfirst($row_sales['lname']).'">'.ucfirst($row_sales['fname']).' '.ucfirst($row_sales['lname']).'</option>
                ';
      }


        ?>
      </select>
                  <!-- <input type="text" name="s_rep" class="form-control"placeholder="Sales Representative" required> -->
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Company:</h6> 
                  <input type="text" name="company" class="form-control" placeholder="Company" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Telephone No.:</h6>
                  <input type="number" name="c_no" class="form-control" placeholder="Contact No." pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" required>
                  
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>E-mail Address:</h6>
                  <input type="email" name="e_add" class="form-control" placeholder="E-mail Address" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Company Address:</h6>
                  <input type="text" name="c_add" class="form-control" placeholder="Company Address" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>City:</h6>
                  <input type="text" name="city" class="form-control" placeholder="City" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Postal Code:</h6>
                  <input type="text" name="p_code" class="form-control" placeholder="Postal Code" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" required>
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="add_client" class="btn btn-primary form-control" value="ADD Client">
                </div>
              </div>
          </form>
<?php
if(isset($_POST['add_client'])){
$c_name = $_POST['c_name'];
$s_rep = $_POST['s_rep'];
$company = $_POST['company'];
$c_no = $_POST['c_no'];
$e_add = $_POST['e_add'];
$c_add = $_POST['c_add'];
$city = $_POST['city'];
$p_code = $_POST['p_code'];
$status = 0;
$sql = "INSERT INTO `client_info`(`client_name`, `sales_representative`, `company`, `contact_no`, `email_address`, `company_address`, `city`, `postal_code`,`status`) VALUES ('$c_name','$s_rep','$company','$c_no','$e_add','$c_add','$city','$p_code',$status)";
mysqli_query($conn,$sql);

$sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Add Client')";
                                mysqli_query($conn,$sql1);
echo '<script>alert("Successfully Added!");</script>';
echo "<meta http-equiv='refresh' content='0'>";
//header("Location: client");
}else if(isset($_POST['enable_client'])){
  $client_id = $_POST['client_id'];
  $status = 0;
// $stmt = $conn->prepare("DELETE FROM `client_info` WHERE `client_id` = ?");
  $stmt = $conn->prepare("UPDATE `client_info` SET status = ? WHERE `client_id` = ?");
  
                              $stmt->bind_param('ss',$status,$client_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Client')";
                              mysqli_query($conn,$sql1);
                              echo"<script>alert('Data Enabled!')</script>";
                              //header("Location: client");
                             echo "<script type='text/javascript'>location.href = 'addclient';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if(isset($_POST['delete_client'])){
  $client_id = $_POST['client_id'];
  $status = 1;
// $stmt = $conn->prepare("DELETE FROM `client_info` WHERE `client_id` = ?");
  $stmt = $conn->prepare("UPDATE `client_info` SET status = ? WHERE `client_id` = ?");
  
                              $stmt->bind_param('ss',$status,$client_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Disabled Client')";
                              mysqli_query($conn,$sql1);
                              echo"<script>alert('Data Disabled!')</script>";
                              //header("Location: client");
                             echo "<script type='text/javascript'>location.href = 'addclient';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}


?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>


    </div>
  </div>
  
</div>
</body>
</html>