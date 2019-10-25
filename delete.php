  <script src="../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
   <a href="index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
<?php
session_start();
include 'config.php';
//include('includes/header.php'); 
//include('includes/navbar.php');
 include 'includes/link.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
$now = date("Y-m-d H:i:s");
if(isset($_POST['delete_machine'])){
	$machine_id = $_POST['machine_id'];

	$stmt = $conn->prepare("DELETE FROM `machine` WHERE `machine_id` = ?");
  
                              $stmt->bind_param('s',$machine_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Deleted Machine')";
                              mysqli_query($conn,$sql1);

                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if (isset($_POST['delete_jo'])){
  $jo_id = $_POST['jo_id'];
  $status= "Disabled";
  // $stmt = $conn->prepare("DELETE FROM `job_order` WHERE `job_order_control_no` = ?");
  $stmt = $conn->prepare("UPDATE `job_order` SET status=? WHERE `job_order_control_no` = ?");
  
                              $stmt->bind_param('ss',$status,$jo_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Disabled Job Order')";
                              mysqli_query($conn,$sql1);
                              header("Location: index_admin");

                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if (isset($_POST['delete_material'])){
  $material_id = $_POST['material_id'];

  $stmt = $conn->prepare("DELETE FROM `materials` WHERE `material_id` = ?");
  
                              $stmt->bind_param('s',$material_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Deleted Material')";
                              mysqli_query($conn,$sql1);
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();

}else if(isset($_POST['delete_jticket'])){
  $ticket_no = $_POST['ticket_no'];

  $stmt = $conn->prepare("DELETE FROM `job_ticket` WHERE `ticket_no` = ?");
  
                              $stmt->bind_param('s',$ticket_no);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Deleted Job Ticket')";
                              mysqli_query($conn,$sql1);
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if(isset($_POST['delete_account'])){
  $acc_id = $_POST['acc_id'];

  $stmt = $conn->prepare("DELETE FROM `tbl_useraccounts` WHERE `ua_id` = ?");
  
                              $stmt->bind_param('s',$acc_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Deleted Account')";
                              mysqli_query($conn,$sql1);
                              } 
                              //header(location: )
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}
?>