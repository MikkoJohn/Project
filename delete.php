   <a href="index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
<?php
include 'config.php';
//include('includes/header.php'); 
//include('includes/navbar.php');
 include 'includes/link.php';
if(isset($_POST['delete_machine'])){
	$machine_id = $_POST['machine_id'];

	$stmt = $conn->prepare("DELETE FROM `machine` WHERE `machine_id` = ?");
  
                              $stmt->bind_param('s',$machine_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Deleted!","", "success");</script>';
                                //header("Location: index_admin"); 
                              //  echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}



?>