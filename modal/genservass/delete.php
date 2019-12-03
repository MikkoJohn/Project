  <script src="../../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
   
<?php
session_start();
include '../../config.php';
//include('includes/header.php'); 
//include('includes/navbar.php');
 // include '../includes/link.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
$now = date("Y-m-d H:i:s");
if(isset($_POST['delete_client'])){
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
                             echo "<script type='text/javascript'>location.href = 'client';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if(isset($_POST['delete_operator'])){
  $operator_id = $_POST['operator_id'];
  $status = 1;
// $stmt = $conn->prepare("DELETE FROM `operators` WHERE `operator_id` = ?");
  $stmt = $conn->prepare("UPDATE `operators` SET status=? WHERE `operator_id` = ?");
  
                              $stmt->bind_param('ss',$status,$operator_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Disabled Operator')";
                              mysqli_query($conn,$sql1);
                               echo"<script>alert('Data Disabled!')</script>";
                              //header("Location: operator");
                              echo "<script type='text/javascript'>location.href = 'operator';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if(isset($_POST['delete_supplier'])){
  $supplier_id = $_POST['supplier_id'];
  $status = 1;
// $stmt = $conn->prepare("DELETE FROM `supplier_info` WHERE `supplier_id` = ?");
  $stmt = $conn->prepare("UPDATE `supplier_info` SET status = ? WHERE `supplier_id` = ?");
  
                              $stmt->bind_param('ss',$status,$supplier_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Disabled Supplier')";
                              mysqli_query($conn,$sql1);
                               echo"<script>alert('Data Disabled!')</script>";
                             // header("Location: supplier");
                              echo "<script type='text/javascript'>location.href = 'supplier';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}
?>