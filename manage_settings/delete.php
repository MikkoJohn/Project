  <script src="../../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
   
<?php
session_start();
include '../config.php';
//include('includes/header.php'); 
//include('includes/navbar.php');
 include '../includes/link.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
$now = date("Y-m-d H:i:s");
if(isset($_POST['delete_client'])){
	$client_id = $_POST['client_id'];

	$stmt = $conn->prepare("DELETE FROM `client_info` WHERE `client_id` = ?");
  
                              $stmt->bind_param('s',$client_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Deleted Client')";
                              mysqli_query($conn,$sql1);
                              header("Location: client");
                              echo"<script>alert('Data Deleted!')</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else if(isset($_POST['delete_operator'])){
  $operator_id = $_POST['operator_id'];

  $stmt = $conn->prepare("DELETE FROM `operators` WHERE `operator_id` = ?");
  
                              $stmt->bind_param('s',$operator_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Deleted Operator')";
                              mysqli_query($conn,$sql1);
                              header("Location: operator");
                              echo"<script>alert('Data Deleted!')</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}
?>