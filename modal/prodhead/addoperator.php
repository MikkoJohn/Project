<?php
date_default_timezone_set("Asia/Manila");
$now = date("Y-m-d H:i:s");
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
  <a href="../../index_prodhead" class="btn btn-primary" style="margin-top:1%;margin-left: 1%;">BACK</a>
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
               <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add</button>
             </div>
           </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <table id="aa" class="table table-striped table-bordered" width="100%">  
                        <thead>  
                          <tr>  
                              <th><center>Account ID No</center></th>
                              <th><center>Operator Name</center></th>
                              <th><center>Operator Schedule</center></th>
                              <th><center>Action</center></th>
                               </tr>  
                        </thead> 
                        <tbody>
                    <?php
                      $sql = "SELECT * FROM operators";
                      $result = mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                        echo '
                            <tr>
                              <td><center>'.$row['account_id_no'].'</center></td>
                              <td><center>'.$row['first_name'].'</center></td>
                              <td><center>'.$row['operator_schedule'].'</center></td>
                              <td>
                              <center>
                          <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editoperator">
                       
                          <input type="hidden" name="operator_id" value="'.$row['operator_id'].'">
                          <button name="view_operator" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="modal" data-target="#viewModal"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">
                                    <form method="POST" action="delete">
         <input type="hidden" name="operator_id" value="'.$row['operator_id'].'">
                        <button name="delete_operator" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
        </form>  
        </div>
        </div></center>

                              </td>
                            </tr>
                        ';
                      }
                    ?>
                      
                   </tbody>
                        
                </table>
  <script>  
 $(document).ready(function(){  
      $('#aa').DataTable();  
 });  
 </script>  



  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5>Add Operator</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST" onsubmit="return confirm('Are you sure?')">
              <div class="row">
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <h6>Account ID No.:</h6>
                  <input type="text" name="a_id" class="form-control" placeholder="Account ID No." required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>First Name:</h6>
                  <input type="text" name="fname" class="form-control"placeholder="First Name" onkeypress="return /[a-z]/i.test(event.key)" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Middle Name:</h6>
                  <input type="text" name="mname" class="form-control" placeholder="Middle Name" onkeypress="return /[a-z]/i.test(event.key)" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Last Name:</h6>
                  <input type="text" name="lname" class="form-control" placeholder="Last Name" onkeypress="return /[a-z]/i.test(event.key)" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Contact No.:</h6>
                  <input type="text" name="c_no" class="form-control" placeholder="Contact No." required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Operator Schedule:</h6>
                  <input type="text" name="o_sched" class="form-control" placeholder="Operator Schedule" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Username:</h6>
                  <input type="text" name="uname" class="form-control" placeholder="Username" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Password:</h6>
                  <input type="password" name="pass" class="form-control" placeholder="Password" required>
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="add_operator" class="btn btn-primary form-control" value="ADD Operator">
                </div>
              </div>
          </form>
<?php
if(isset($_POST['add_operator'])){
$a_id = $_POST['a_id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$c_no = $_POST['c_no'];
$o_sched = $_POST['o_sched'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$sql = "INSERT INTO `operators`(`account_id_no`, `first_name`, `middle_name`, `last_name`, `contact_no`, `username`, `password`, `operator_schedule`) VALUES ('$a_id','$fname','$mname','$lname','$c_no','$uname','$pass','$o_sched')";
mysqli_query($conn,$sql);

$sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Add Operator')";
                                mysqli_query($conn,$sql1);

echo "<meta http-equiv='refresh' content='0'>";
//header("Location: operator");
}


?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>


    </div>
  </div>
  
</div>
</body>
</html>