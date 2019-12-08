<?php  
    include_once '../../config.php';
    include '../../includes/link.php';
    session_start();
    $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
                   



if(isset($_POST['approve_mr'])){
//error_reporting(0);
	 $_SESSION['request_id'] = $_POST['request_id'];

  $status = "Approved";
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];

  $stmt = "UPDATE `material_request_form` SET `pending_status`='$status' WHERE request_id='".$_SESSION['request_id']."'";
       mysqli_query($conn,$stmt);                      
                          
          echo '<script>alert("Successfully Updated!");</script>';
          $sqla="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Approved Material Request')";
          mysqli_query($conn,$sqla); 
    echo "<script type='text/javascript'>location.href = '../../index_prodass';</script>";
                                      
}else if(isset($_POST['disapprove_mr'])){
//error_reporting(0);
   $_SESSION['request_id'] = $_POST['request_id'];

  $status = "Disapproved";
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];

  $stmt = "UPDATE `material_request_form` SET `pending_status`='$status' WHERE request_id='".$_SESSION['request_id']."'";
       mysqli_query($conn,$stmt);                      
                          
          echo '<script>alert("Successfully Updated!");</script>';
          $sqla="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Disapproved Material Request')";
          mysqli_query($conn,$sqla); 
    echo "<script type='text/javascript'>location.href = '../../index_prodass';</script>";
               
}