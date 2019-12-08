  <?php  
    include_once '../../config.php';
    include '../../includes/link.php';
    session_start();
    $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
                   



if(isset($_POST['approve_wo'])){
//error_reporting(0);
	 $_SESSION['wo_id'] = $_POST['wo_id'];

  $status = "Approved";
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];

  $stmt = "UPDATE `work_order` SET `status`='$status' WHERE work_order_no='".$_SESSION['wo_id']."'";
       mysqli_query($conn,$stmt);                      
                          
          echo '<script>alert("Successfully Updated!");</script>';
          $sqla="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Approved Work Order')";
          mysqli_query($conn,$sqla); 
    echo "<script type='text/javascript'>location.href = '../../index_finance';</script>";
                                      
}else if(isset($_POST['disapprove_wo'])){
//error_reporting(0);
   $_SESSION['wo_id'] = $_POST['wo_id'];

  $status = "Disapproved";
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];

  $stmt = "UPDATE `work_order` SET `status`='$status' WHERE work_order_no='".$_SESSION['wo_id']."'";
       mysqli_query($conn,$stmt);                      
                          
          echo '<script>alert("Successfully Updated!");</script>';
          $sqla="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Disapproved Work Order')";
          mysqli_query($conn,$sqla); 
    echo "<script type='text/javascript'>location.href = '../../index_finance';</script>";
               
}else if(isset($_POST['approve_pr'])){
//error_reporting(0);
   $_SESSION['purchase_requisition_no'] = $_POST['purchase_requisition_no'];

  $status = "Approved";
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];

  $stmt = "UPDATE `purchase_requisition` SET `status`='$status' WHERE purchase_requisition_no='".$_SESSION['purchase_requisition_no']."'";
       mysqli_query($conn,$stmt);                      
                          
          echo '<script>alert("Successfully Updated!");</script>';
          $sqla="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Approved Purchase Requisition')";
          mysqli_query($conn,$sqla); 
    echo "<script type='text/javascript'>location.href = '../../index_finance';</script>";
                                      
}else if(isset($_POST['disapprove_pr'])){
//error_reporting(0);
   $_SESSION['purchase_requisition_no'] = $_POST['purchase_requisition_no'];

  $status = "Disapproved";
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];

  $stmt = "UPDATE `purchase_requisition` SET `status`='$status' WHERE purchase_requisition_no='".$_SESSION['purchase_requisition_no']."'";
       mysqli_query($conn,$stmt);                      
                          
          echo '<script>alert("Successfully Updated!");</script>';
          $sqla="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Disapproved Purchase Requisition')";
          mysqli_query($conn,$sqla); 
    echo "<script type='text/javascript'>location.href = '../../index_finance';</script>";
               
}







                   ?>
