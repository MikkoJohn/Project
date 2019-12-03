<?php
include('config.php');
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE work_order SET wo_status = 1 WHERE wo_status=0";
   mysqli_query($conn, $update_query);
}
$query = "SELECT * FROM work_order ORDER BY work_order_no DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>WO No.: '.$row["work_order_no"].'</strong><br />
  <small><em>'.$row["job_desc"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM work_order WHERE wo_status=0";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
// echo '<script>alert("New Job Order");</script>';
}
?>