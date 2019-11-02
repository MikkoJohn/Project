<?php
//include '../includes/link.php';
//include '../includes/header.php';
  include_once '../config.php';
    session_start();
   $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

        <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!-- bootstrap CDN -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
        <!-- font awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- Font CDN -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <!-- jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Mikko CDN tangina ang gulo puta -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!--additional-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>  

</head>
<body>
  <a href="operator" class="btn btn-primary" style="margin-top:1%;margin-left: 1%;">BACK</a>
<div class="container">
 <br>
 <?php
 //echo  $accname;
 ?>
  <!-- Trigger the modal with a button -->
 
<!-- <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Edit</button>
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add</button> -->
  <!-- Modal -->


     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
              <div class="col-lg-6">
                <h5 class="m-0 font-weight-bold text-primary">View/Edit Operator</h5>
              </div>
              <div class="col-lg-6" align="right">
              
             </div>
           </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_POST['view_operator'])){
                  $_SESSION['operator_id'] = $_POST['operator_id'];
                  $sql = "SELECT * FROM operators WHERE operator_id = '".$_SESSION['operator_id']."'";
                  $result = mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result)){
              if($row['status'] == 0){
                    echo '
                <form method="POST" onsubmit="return confirm("Are you sure?")">
              <div class="row">
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <h6>Account ID No.:</h6>
                  <input type="text" name="a_id" class="form-control" value="'.$row['account_id_no'].'" placeholder="Account ID No.">
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>First Name:</h6>
                  <input type="text" name="fname" class="form-control" value="'.$row['first_name'].'" placeholder="First Name">
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Middle Name:</h6>
                  <input type="text" name="mname" class="form-control" value="'.$row['middle_name'].'" placeholder="Middle Name">
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Last Name:</h6>
                  <input type="text" name="lname" class="form-control" value="'.$row['last_name'].'" placeholder="Last Name">
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Contact No.:</h6>
                  <input type="text" name="c_no" class="form-control" value="'.$row['contact_no'].'" placeholder="Contact No.">
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Schedule:</h6>
                  <input type="text" name="o_sched" class="form-control" value="'.$row['operator_schedule'].'" placeholder="Operator Schedule">
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Shift:</h6>
                  <input type="text" name="o_shift" class="form-control" value="'.$row['operator_shift'].'" placeholder="Operator Shift">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Username:</h6>
                  <input type="text" name="uname" class="form-control" value="'.$row['username'].'" placeholder="Username">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Password:</h6>
                  <input type="password" name="pass" id="o_pass" class="form-control" value="'.$row['password'].'" placeholder="Password">
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="edit_operator" class="btn btn-success form-control" value="UPDATE Operator">
                </div>
              </div>
          </form>
                    ';
                  }else{
                       echo '
                <form method="POST" onsubmit="return confirm("Are you sure?")">
              <div class="row">
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <h6>Account ID No.:</h6>
                  <input type="text" name="a_id" class="form-control" value="'.$row['account_id_no'].'" placeholder="Account ID No." disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>First Name:</h6>
                  <input type="text" name="fname" class="form-control" value="'.$row['first_name'].'" placeholder="First Name" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Middle Name:</h6>
                  <input type="text" name="mname" class="form-control" value="'.$row['middle_name'].'" placeholder="Middle Name" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Last Name:</h6>
                  <input type="text" name="lname" class="form-control" value="'.$row['last_name'].'" placeholder="Last Name" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Contact No.:</h6>
                  <input type="text" name="c_no" class="form-control" value="'.$row['contact_no'].'" placeholder="Contact No." disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Schedule:</h6>
                  <input type="text" name="o_sched" class="form-control" value="'.$row['operator_schedule'].'" placeholder="Operator Schedule" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Shift:</h6>
                  <input type="text" name="o_shift" class="form-control" value="'.$row['operator_shift'].'" placeholder="Operator Shift" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Username:</h6>
                  <input type="text" name="uname" class="form-control" value="'.$row['username'].'" placeholder="Username" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Password:</h6>
                  <input type="password" name="pass" id="o_pass" class="form-control" value="'.$row['password'].'" placeholder="Password" disabled>
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="edit_operator" class="btn btn-success form-control" value="UPDATE Operator" disabled>
                </div>
              </div>
          </form>
                    ';
                  }
                }
                }
            ?>
<script>
function myFunction() {
  var x = document.getElementById("o_pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>               
                
<?php
if(isset($_POST['edit_operator'])){
$a_id = $_POST['a_id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$c_no = $_POST['c_no'];
$o_sched = $_POST['o_sched'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$sql = "UPDATE `operators` SET `account_id_no`='$a_id',`first_name`='$fname',`middle_name`='$mname',`last_name`='$lname',`contact_no`='$c_no',`username`='$uname',`password`='$pass',`operator_schedule`='$o_sched' WHERE operator_id = '".$_SESSION['operator_id']."'";
mysqli_query($conn,$sql);

$sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Operator')";
                                mysqli_query($conn,$sql1);

echo '<script>alert("Successfully Updated!");</script>';
//echo '<script>swal("Success","","succes");</script>';
echo "<meta http-equiv='refresh' content='0'>";

  echo "<script type='text/javascript'>location.href = 'operator';</script>";
} 


?>
      
  </div>
  
</div>
</body>
</html>