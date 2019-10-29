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
if(isset($_POST['enable_machine'])){
	$machine_id = $_POST['machine_id'];
  $status = "Enabled";
// $stmt = $conn->prepare("DELETE FROM `machine` WHERE `machine_id` = ?");
	$stmt = $conn->prepare("UPDATE `machine` SET machine_status = ? WHERE `machine_id` = ?");
  
                              $stmt->bind_param('ss',$status,$machine_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Machine')";
                              mysqli_query($conn,$sql1);
                               echo"<script>alert('Data Enabled!')</script>";
                                 echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if (isset($_POST['enable_jo'])){
  $jo_id = $_POST['jo_id'];
  $status= "Enabled";
  // $stmt = $conn->prepare("DELETE FROM `job_order` WHERE `job_order_control_no` = ?");
  $stmt = $conn->prepare("UPDATE `job_order` SET status=? WHERE `job_order_control_no` = ?");
  
                              $stmt->bind_param('ss',$status,$jo_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Job Order')";
                              mysqli_query($conn,$sql1);
                              echo"<script>alert('Data Enabled!')</script>";
                               echo "<script type='text/javascript'>location.href = 'index_admin';</script>";

                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if (isset($_POST['enable_material'])){
  $material_id = $_POST['material_id'];
  $status = 0;
// $stmt = $conn->prepare("DELETE FROM `materials` WHERE `material_id` = ?");
  $stmt = $conn->prepare("UPDATE `materials` SET status=? WHERE `material_id` = ?");
  
                              $stmt->bind_param('ss',$status,$material_id);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Material')";
                              mysqli_query($conn,$sql1);
                              echo"<script>alert('Data Enabled!')</script>";
                              // header("Location: index_admin");
                               echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();

}else if(isset($_POST['enable_jticket'])){
  $ticket_no = $_POST['ticket_no'];
  $status = "Enabled";
  // $stmt = $conn->prepare("DELETE FROM `job_ticket` WHERE `ticket_no` = ?");
  $stmt = $conn->prepare("UPDATE `job_ticket` SET status=? WHERE `ticket_no` = ?");
                              $stmt->bind_param('ss',$status,$ticket_no);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Job Ticket')";
                              mysqli_query($conn,$sql1);
                               echo"<script>alert('Data Enabled!')</script>";
                                // header("Location: index_admin");
                                echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if(isset($_POST['enable_account'])){
  $acc_id = $_POST['acc_id'];
  $status = 0;
$stmt = $conn->prepare("UPDATE `tbl_useraccounts` SET `status` = ? WHERE `ua_id` = ?");
  // $stmt = $conn->prepare("DELETE FROM `tbl_useraccounts` WHERE `ua_id` = ?");
  
                              $stmt->bind_param('ss',$status,$acc_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Account')";
                              mysqli_query($conn,$sql1);
                                echo"<script>alert('Data Enabled!')</script>";
                               // header("Location: index_admin");
                                 echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
                              } 
                              //header(location: )
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();

}else if(isset($_POST['enable_wo'])){
  $wo_id = $_POST['wo_id'];
  $status = 0;
$stmt = $conn->prepare("UPDATE `work_order` SET `status` = ? WHERE `work_order_no` = ?");
  // $stmt = $conn->prepare("DELETE FROM `tbl_useraccounts` WHERE `ua_id` = ?");
  
                              $stmt->bind_param('ss',$status,$wo_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Work Order')";
                              mysqli_query($conn,$sql1);
                               echo"<script>alert('Data Enabled!')</script>";
                               // header("Location: index_admin");
                                echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
                              } 
                              //header(location: )
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

?>