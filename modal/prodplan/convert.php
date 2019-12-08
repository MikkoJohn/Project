<script src="../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
   <!-- <a href="index_admin" class="btn btn-primary" style="margin:2%">BACK</a> -->
<?php
session_start();
  include_once '../../config.php';
    include '../../includes/link.php';
    // session_start();
    $accname = $_SESSION['acct_name'];
    $acctype = $_SESSION['sess_type'];
$now = date("Y-m-d H:i:s");

if(isset($_POST['convert_jticket'])){

  $ticket_no = $_POST['ticket_no'];
  $sql_jo = "SELECT start,finish,job_order_control_no FROM job_ticket WHERE ticket_no = '".$ticket_no."'";
  $result = mysqli_query($conn,$sql_jo);
  $row = mysqli_fetch_assoc($result);
 
  if($row != 0)
	  {
  $start = $row['start'];
  $finish = $row['finish'];
  $job_no = $row['job_order_control_no'];
  $status = "Pending";
$sqls = "SELECT * FROM `project_run_schedule` WHERE `job_order_control_no`='".$job_no."'";
$resulta = $conn->query($sqls);
if($resulta->num_rows >= 1) {
    // echo'<script>swal("Error!","Job Order already converted!" ,"warning");</script>';
    echo '<script>alert("Job Ticket already converted for Project Run!");</script>';
    echo "<script type='text/javascript'>location.href = '../../index_prodplan';</script>";
} else {

  $stmt = $conn->prepare("INSERT INTO project_run_schedule (job_order_control_no, start_date, end_date) VALUES (?,?,?) ");
  //$status= "Disabled";
  // $stmt = $conn->prepare("DELETE FROM `job_order` WHERE `job_order_control_no` = ?");
  //$stmt = $conn->prepare("UPDATE `job_order` SET status=? WHERE `job_order_control_no` = ?");
  
                              $stmt->bind_param('sss',$job_no,$start,$finish);

                              if($stmt->execute()){
                               // echo'<script>swal("Successfully Deleted!","", "success");</script>';
                               echo '<script>alert("Successfully Converted!");</script>';
                              $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Converted Job Ticket to Project Run')";
                              mysqli_query($conn,$sql1);
                             // header("Location: index_admin");
                               echo "<script type='text/javascript'>location.href = '../../index_prodplan';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}
}
}