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
  <a href="addclient" class="btn btn-primary" style="margin-top:1%;margin-left: 1%;">BACK</a>
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
                <h5 class="m-0 font-weight-bold text-primary">View/Edit Client</h5>
              </div>
              <div class="col-lg-6" align="right">
              
             </div>
           </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_POST['view_client'])){
                  $_SESSION['client_id'] = $_POST['client_id'];
                  $sql = "SELECT * FROM client_info WHERE client_id = '".$_SESSION['client_id']."'";
                  $result = mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result)){
                if($row['status'] == 0){
                    echo '
                <form method="POST" onsubmit="return confirm("Are you sure?")">
              <div class="row">
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Client Name:</h6>
                  <input type="text" name="c_name" class="form-control" value="'.$row['client_name'].'" placeholder="Client Name">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Sales Representative:</h6>
                  <input type="text" name="s_rep" class="form-control" value="'.$row['sales_representative'].'" placeholder="Sales Representative">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Company:</h6>
                  <input type="text" name="company" class="form-control" value="'.$row['company'].'" placeholder="Company">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Contact No.:</h6>
                  <input type="text" name="c_no" class="form-control" value="'.$row['contact_no'].'" placeholder="Contact No.">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>E-mail Address:</h6>
                  <input type="text" name="e_add" class="form-control" value="'.$row['email_address'].'" placeholder="Email Address">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Company Address:</h6>
                  <input type="text" name="c_add" class="form-control" value="'.$row['company_address'].'" placeholder="Company Address">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>City:</h6>
                  <input type="text" name="city" class="form-control" value="'.$row['city'].'" placeholder="City">
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Postal Code:</h6>
                  <input type="text" name="p_code" class="form-control" value="'.$row['postal_code'].'" placeholder="Postal Code">
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="edit_client" class="btn btn-success form-control" value="UPDATE Client">
                </div>
              </div>
          </form>
                    ';
                  }else{
                     echo '
                <form method="POST" onsubmit="return confirm("Are you sure?")">
              <div class="row">
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Client Name:</h6>
                  <input type="text" name="c_name" class="form-control" value="'.$row['client_name'].'" placeholder="Client Name" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Sales Representative:</h6>
                  <input type="text" name="s_rep" class="form-control" value="'.$row['sales_representative'].'" placeholder="Sales Representative" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Company:</h6>
                  <input type="text" name="company" class="form-control" value="'.$row['company'].'" placeholder="Company" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Contact No.:</h6>
                  <input type="text" name="c_no" class="form-control" value="'.$row['contact_no'].'" placeholder="Contact No." disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>E-mail Address:</h6>
                  <input type="text" name="e_add" class="form-control" value="'.$row['email_address'].'" placeholder="Email Address" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Company Address:</h6>
                  <input type="text" name="c_add" class="form-control" value="'.$row['company_address'].'" placeholder="Company Address" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>City:</h6>
                  <input type="text" name="city" class="form-control" value="'.$row['city'].'" placeholder="City" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Postal Code:</h6>
                  <input type="text" name="p_code" class="form-control" value="'.$row['postal_code'].'" placeholder="Postal Code" disabled>
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="edit_client" class="btn btn-success form-control" value="UPDATE Client" disabled>
                </div>
              </div>
          </form>
                    ';
                  }
                }
                
                }
            ?>
                
<?php
if(isset($_POST['edit_client'])){
$c_name = $_POST['c_name'];
$s_rep = $_POST['s_rep'];
$company = $_POST['company'];
$c_no = $_POST['c_no'];
$e_add = $_POST['e_add'];
$c_add = $_POST['c_add'];
$city = $_POST['city'];
$p_code = $_POST['p_code'];

$sql = "UPDATE `client_info` SET `client_name`='$c_name',`sales_representative`='$s_rep',`company`='$company',`contact_no`='$c_no',`email_address`='$e_add',`company_address`='$c_add',`city`='$city',`postal_code`='$p_code' WHERE client_id = '".$_SESSION['client_id']."'";
mysqli_query($conn,$sql);

$sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Client')";
                                mysqli_query($conn,$sql1);

echo '<script>alert("Successfully Updated!");</script>';
echo "<meta http-equiv='refresh' content='0'>";
  echo "<script type='text/javascript'>location.href = 'addclient';</script>";
//header("Location: client");
}


?>
      
  </div>
  
</div>
</body>
</html>