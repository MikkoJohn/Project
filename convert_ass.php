<script src="../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
   <!-- <a href="index_admin" class="btn btn-primary" style="margin:2%">BACK</a> -->
<?php
session_start();
include 'config.php';
//include('includes/header.php'); 
//include('includes/navbar.php');
 include 'includes/link.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
$now = date("Y-m-d H:i:s");
if(isset($_POST['convert_jo'])){
  $jo_id = $_POST['jo_id'];
  $sql_jo = "SELECT client_name, requested_delivery, item_desc_and_title, job_order_control_no, quantity, costing_run,proj_name, pages, finishing_required, size FROM job_order WHERE job_order_control_no = '".$jo_id."'";
  $result = mysqli_query($conn,$sql_jo);
  $row = mysqli_fetch_assoc($result);
 
  if($row != 0)
	  {
  $size = $row['size'];
  $client_name = $row['client_name'];
  $title = $row['item_desc_and_title'];
  $requested_delivery = $row['requested_delivery'];
  $job_no = $row['job_order_control_no'];
  $machine = $row['costing_run'];
  $proj_name = $row['proj_name'];
  $no_pages = $row['pages'];
  $f_required = $row['finishing_required'];
  $quantity = $row['quantity'];
  $status = "Pending";
$sqls = "SELECT * FROM `job_ticket` WHERE `job_order_control_no`='".$job_no."'";
$resulta = $conn->query($sqls);
if($resulta->num_rows >= 1) {
    // echo'<script>swal("Error!","Job Order already converted!" ,"warning");</script>';
    echo '<script>alert("Job Order already converted!");</script>';
    echo "<script type='text/javascript'>location.href = 'index_prodass';</script>";
} else {

  $stmt = $conn->prepare("INSERT INTO job_ticket (actual_size,delivery_date,client_name, title, machine_name, date_time_created, quantity,job_order_control_no,proj_name,pages,binding,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ");
  //$status= "Disabled";
  // $stmt = $conn->prepare("DELETE FROM `job_order` WHERE `job_order_control_no` = ?");
  //$stmt = $conn->prepare("UPDATE `job_order` SET status=? WHERE `job_order_control_no` = ?");
  
                              $stmt->bind_param('ssssssssssss',$size,$requested_delivery,$client_name,$title,$machine,$now,$quantity,$job_no,$proj_name,$no_pages,$f_required,$status);

                              if($stmt->execute()){
                               // echo'<script>swal("Successfully Deleted!","", "success");</script>';
                               echo '<script>alert("Successfully Converted!");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Converted Job Order')";
                              mysqli_query($conn,$sql1);
                             // header("Location: index_admin");
                               echo "<script type='text/javascript'>location.href = 'index_prodass';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}
}
}