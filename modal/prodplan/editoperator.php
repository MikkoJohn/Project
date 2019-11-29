<?php
//include '../includes/link.php';
//include '../includes/header.php';
  include_once '../../config.php';
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
  <a href="addoperator" class="btn btn-primary" style="margin-top:1%;margin-left: 1%;">BACK</a>
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
                <h5 class="m-0 font-weight-bold text-primary">Operator Info</h5>
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
            if($row['status'] == "0"){
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
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Contact No.:</h6>
                  <input type="text" name="c_no" class="form-control" value="'.$row['contact_no'].'" placeholder="Contact No.">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Operator Schedule:</h6>
                  <select name="o_sched" class="form-control"  required>
                  ';
                  if($row['operator_schedule'] =="Monday"){
                    echo '
                        <option selected="true" value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Tuesday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option selected="true" value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Wednesday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option selected="true" value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Thursday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option selected="true" value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Friday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option selected="true" value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Saturday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option selected="true" value="Saturday">Saturday</option>
                    ';
                  }

                  echo '
                  </select>
                </div>
                 <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Shift:</h6>
                  <select name="o_shift" class="form-control" required>
                  ';
                  if($row['operator_shift']=="8AM-5PM"){
                    echo '<option value="8AM-5PM">8:00AM-5:00PM</option>';
                  }
                  echo '
                  </select>
                </div>
                 <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Overtime:</h6>
                  <select name="o_ot" class="form-control" required>
                  ';
                  if($row['operator_ot'] =="8-9 AM"){
                    echo '
                          <option selected="true" value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="9-10 AM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option selected="true" value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="10-11 AM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option selected="true" value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="11-12 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option selected="true" value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="1-2 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option selected="true" value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="2-3 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option selected="true" value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="3-4 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option selected="true" value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="4-5 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option selected="true" value="4-5 PM">4-5 PM</option>
                    ';
                  }


                  echo '
                  </select>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Division:</h6>
                  <select name="o_div" class="form-control" value="'.$row['division'].'">
                  ';
                if($row['division'] =="Pre-Press"){
                    echo '
                      <option selected="true" value="Pre-Press">Pre-Press</option>
                      <option value="Press">Press</option>
                      <option value="Post-Press">Post-Press</option>
                    ';
                }else if($row['division'] =="Press"){
                    echo '
                      <option value="Pre-Press">Pre-Press</option>
                      <option selected="true" value="Press">Press</option>
                      <option value="Post-Press">Post-Press</option>
                    ';
                }else if($row['division'] =="Post-Press"){
                    echo '
                      <option value="Pre-Press">Pre-Press</option>
                      <option value="Press">Press</option>
                      <option selected="true" value="Post-Press">Post-Press</option>
                    ';
                }


                  echo '
                  </select>
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
                  <input type="submit" name="edit_operator" class="btn btn-primary form-control" value="UPDATE Operator">
                </div>
              </div>
          </form>
                    ';
                  }else {
                   $sql = "SELECT * FROM operators WHERE operator_id = '".$_SESSION['operator_id']."'";
                  $result = mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result)){
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
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Contact No.:</h6>
                  <input type="text" name="c_no" class="form-control" value="'.$row['contact_no'].'" placeholder="Contact No." disabled>
                </div>
                 <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Operator Schedule:</h6>
                  <select name="o_sched" class="form-control"  disabled>
                  ';
                  if($row['operator_schedule'] =="Monday"){
                    echo '
                        <option selected="true" value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Tuesday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option selected="true" value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Wednesday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option selected="true" value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Thursday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option selected="true" value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Friday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option selected="true" value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    ';
                  }else if($row['operator_schedule'] =="Saturday"){
                    echo '
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option selected="true" value="Saturday">Saturday</option>
                    ';
                  }

                  echo '
                  </select>
                </div>
                 <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Shift:</h6>
                  <select name="o_shift" class="form-control" disabled>
                  ';
                  if($row['operator_shift']=="8AM-5PM"){
                    echo '<option value="8AM-5PM">8:00AM-5:00PM</option>';
                  }
                  echo '
                  </select>
                </div>
                 <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Operator Overtime:</h6>
                  <select name="o_ot" class="form-control" disabled>
                  ';
                  if($row['operator_ot'] =="8-9 AM"){
                    echo '
                          <option selected="true" value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="9-10 AM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option selected="true" value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="10-11 AM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option selected="true" value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="11-12 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option selected="true" value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="1-2 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option selected="true" value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="2-3 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option selected="true" value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="3-4 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option selected="true" value="3-4 PM">3-4 PM</option>
                          <option value="4-5 PM">4-5 PM</option>
                    ';
                  }else if($row['operator_ot'] =="4-5 PM"){
                    echo '
                          <option value="8-9 AM">8-9 AM</option>
                          <option value="9-10 AM">9-10 AM</option>
                          <option value="10-11 AM">10-11 AM</option>
                          <option value="11-12 PM">11-12 PM</option>
                          <option value="1-2 PM">1-2 PM</option>
                          <option value="2-3 PM">2-3 PM</option>
                          <option value="3-4 PM">3-4 PM</option>
                          <option selected="true" value="4-5 PM">4-5 PM</option>
                    ';
                  }


                  echo '
                  </select>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Division:</h6>
                  <select name="o_div" class="form-control" value="'.$row['division'].'" disabled>
                  ';
                if($row['division'] =="Pre-Press"){
                    echo '
                      <option selected="true" value="Pre-Press">Pre-Press</option>
                      <option value="Press">Press</option>
                      <option value="Post-Press">Post-Press</option>
                    ';
                }else if($row['division'] =="Press"){
                    echo '
                      <option value="Pre-Press">Pre-Press</option>
                      <option selected="true" value="Press">Press</option>
                      <option value="Post-Press">Post-Press</option>
                    ';
                }else if($row['division'] =="Post-Press"){
                    echo '
                      <option value="Pre-Press">Pre-Press</option>
                      <option value="Press">Press</option>
                      <option selected="true" value="Post-Press">Post-Press</option>
                    ';
                }


                  echo '
                  </select>
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
                  <input type="submit" name="edit_operator" class="btn btn-primary form-control" value="UPDATE Operator" disabled>
                </div>
              </div>
          </form>
                    ';
                  }
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
$o_shift = $_POST['o_shift'];
$o_ot = $_POST['o_ot'];
$o_div = $_POST['o_div'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$sql = "UPDATE `operators` SET `account_id_no`='$a_id',`first_name`='$fname',`middle_name`='$mname',`last_name`='$lname',`contact_no`='$c_no',`username`='$uname',`password`='$pass',`operator_schedule`='$o_sched',`operator_shift`='$o_shift',`operator_ot`='$o_ot',`division`='$o_div' WHERE operator_id = '".$_SESSION['operator_id']."'";
mysqli_query($conn,$sql);

$sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Operator')";
                                mysqli_query($conn,$sql1);

echo '<script>alert("Successfully Updated!");</script>';
//echo '<script>swal("Success","","succes");</script>';
echo "<meta http-equiv='refresh' content='0'>";

 echo "<script type='text/javascript'>location.href = 'add_operator';</script>";
} 


?>
      
  </div>
  
</div>
</body>
</html>