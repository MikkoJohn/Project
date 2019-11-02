<?php
include('config.php');
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE job_order SET jo_status = 1 WHERE jo_status=0";
   mysqli_query($conn, $update_query);
}
$query = "SELECT * FROM job_order ORDER BY job_order_control_no DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>JO No.: '.$row["job_order_control_no"].'</strong><br />
  <small><em>'.$row["proj_name"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM job_order WHERE jo_status=0";
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