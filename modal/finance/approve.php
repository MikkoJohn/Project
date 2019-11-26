  <?php  
    include_once '../../config.php';
    include '../../includes/link.php';
    session_start();
    $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
                   



if(isset($_POST['updateworkorder'])){
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
    echo "<script type='text/javascript'>location.href = '../index_finance';</script>";
                              
                            
                         
                            
                              



}







                   ?>
