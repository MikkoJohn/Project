  <script src="../../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
   
<?php
session_start();
date_default_timezone_set("Asia/Manila");
$now = date("Y-m-d H:i:s");
  include_once '../../config.php';
   $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];


if(isset($_POST['enable_operator'])){
  $operator_id = $_POST['operator_id'];
  $status = 0;
// $stmt = $conn->prepare("DELETE FROM `operators` WHERE `operator_id` = ?");
  $stmt = $conn->prepare("UPDATE `operators` SET status=? WHERE `operator_id` = ?");
  
                              $stmt->bind_param('ss',$status,$operator_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Enabled Operator')";
                              mysqli_query($conn,$sql1);
                               echo"<script>alert('Data Enabled!')</script>";
                              //header("Location: operator");
                              echo "<script type='text/javascript'>location.href = 'addoperator';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}
?>