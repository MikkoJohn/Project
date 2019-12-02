<?php
//include '../includes/link.php';
//include '../includes/header.php';
 session_start();
    include_once '../../config.php';
    // include '../../includes/link.php';
    // include '../../includes/header.php';
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
  <a href="../../index_prodass" class="btn btn-primary" style="margin-top:1%;margin-left: 1%;">BACK</a>
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
                <h5 class="m-0 font-weight-bold text-primary">View Supplier</h5>
              </div>
              <div class="col-lg-6" align="right">
              
             </div>
           </div>
            </div>
            <div class="card-body">
            <?php
                if(isset($_POST['view_supplier'])){
                  $_SESSION['supplier_id'] = $_POST['supplier_id'];
                  $sql = "SELECT * FROM supplier_info WHERE supplier_id = '".$_SESSION['supplier_id']."'";
                  $result = mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result)){
              if($row['status'] == 0){
                    echo '
                <form method="POST" onsubmit="return confirm("Are you sure?"")">
              <div class="row">
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Supplier Name:</h6>
                  <input type="text" name="s_name" class="form-control" value="'.$row['supplier_name'].'" placeholder="Supplier Name" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Head Office Address:</h6>
                  <input type="text" name="ho_add" class="form-control"  value="'.$row['head_office_address'].'" placeholder="Head Office Address" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Telephone No:</h6>
                  <input type="number" name="telephone" class="form-control" value="'.$row['telephone'].'" placeholder="Telephone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>E-mail Address:</h6>
                  <input type="email" name="e_add" class="form-control" value="'.$row['email_address'].'" placeholder="E-mail Address" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Branch:</h6>
                  <input type="text" name="branch" class="form-control" value="'.$row['branch'].'" placeholder="Branch" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Telephone No.:</h6>
                  <input type="number" name="tel_no" class="form-control" value="'.$row['tel_no'].'" placeholder="Telephone No." pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Warehouse:</h6>
                  <input type="text" name="warehouse" class="form-control" value="'.$row['warehouse'].'" placeholder="Warehouse" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Form of Business:</h6>
                  <input type="text" name="form_of_bus" class="form-control" value="'.$row['form_of_business'].'" placeholder="Form of Business" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Kind of Business:</h6>
                  <input type="text" name="kind_of_bus" class="form-control" value="'.$row['kind_of_business'].'" placeholder="Kind of Business" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Tin No:</h6>
                  <input type="text" name="tin_no" class="form-control" value="'.$row['tin_no'].'" placeholder="Tin No." required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Contact Person:</h6>
                  <input type="text" name="c_person" class="form-control" value="'.$row['contact_person'].'" placeholder="Contact Person" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Position:</h6>
                  <input type="text" name="position" class="form-control" value="'.$row['position'].'" placeholder="Position" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Contact Person:</h6>
                  <input type="text" name="c_person2" class="form-control" value="'.$row['contact_person2'].'" placeholder="Contact Person" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Position:</h6>
                  <input type="text" name="position2" class="form-control" value="'.$row['position2'].'" placeholder="Position" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Major Product:</h6>
                  <input type="text" name="major_prod" class="form-control" value="'.$row['major_products'].'" placeholder="Major Products" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Secondary Services:</h6>
                  <input type="text" name="sec_serv" class="form-control" value="'.$row['secondary_services'].'" placeholder="Secondary Services" required>
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="edit_supplier" class="btn btn-success form-control" value="UPDATE Supplier" disabled>
                </div>
              </div>
          </form>
                    ';
                  }else{
                       echo '
                <form method="POST" onsubmit="return confirm("Are you sure?"")">
              <div class="row">
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Supplier Name:</h6>
                  <input type="text" name="s_name" class="form-control" value="'.$row['supplier_name'].'" placeholder="Supplier Name" disabled>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Head Office Address:</h6>
                  <input type="text" name="ho_add" class="form-control"  value="'.$row['head_office_address'].'" placeholder="Head Office Address" disabled>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Telephone No:</h6>
                  <input type="number" name="telephone" class="form-control" value="'.$row['telephone'].'" placeholder="Telephone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" disabled>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>E-mail Address:</h6>
                  <input type="email" name="e_add" class="form-control" value="'.$row['email_address'].'" placeholder="E-mail Address" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Branch:</h6>
                  <input type="text" name="branch" class="form-control" value="'.$row['branch'].'" placeholder="Branch" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Telephone No.:</h6>
                  <input type="number" name="tel_no" class="form-control" value="'.$row['tel_no'].'" placeholder="Telephone No." pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Warehouse:</h6>
                  <input type="text" name="warehouse" class="form-control" value="'.$row['warehouse'].'" placeholder="Warehouse" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Form of Business:</h6>
                  <input type="text" name="form_of_bus" class="form-control" value="'.$row['form_of_business'].'" placeholder="Form of Business" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Kind of Business:</h6>
                  <input type="text" name="kind_of_bus" class="form-control" value="'.$row['kind_of_business'].'" placeholder="Kind of Business" disabled>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Tin No:</h6>
                  <input type="text" name="tin_no" class="form-control" value="'.$row['tin_no'].'" placeholder="Tin No." disabled>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Contact Person:</h6>
                  <input type="text" name="c_person" class="form-control" value="'.$row['contact_person'].'" placeholder="Contact Person" disabled>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Position:</h6>
                  <input type="text" name="position" class="form-control" value="'.$row['position'].'" placeholder="Position" disabled>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Contact Person:</h6>
                  <input type="text" name="c_person2" class="form-control" value="'.$row['contact_person2'].'" placeholder="Contact Person" disabled>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Position:</h6>
                  <input type="text" name="position2" class="form-control" value="'.$row['position2'].'" placeholder="Position" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Major Product:</h6>
                  <input type="text" name="major_prod" class="form-control" value="'.$row['major_products'].'" placeholder="Major Products" disabled>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Secondary Services:</h6>
                  <input type="text" name="sec_serv" class="form-control" value="'.$row['secondary_services'].'" placeholder="Secondary Services" disabled>
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="edit_supplier" class="btn btn-success form-control" value="UPDATE Supplier" disabled>
                </div>
              </div>
          </form>
                    ';
                  }
                }
                }
            ?>
<!-- <script>
function myFunction() {
  var x = document.getElementById("o_pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>   -->             
                
<?php
if(isset($_POST['edit_supplier'])){
$s_name = $_POST['s_name'];
$ho_add = $_POST['ho_add'];
$telephone = $_POST['telephone'];
$e_add = $_POST['e_add'];
$branch = $_POST['branch'];
$tel_no = $_POST['tel_no'];
$warehouse = $_POST['warehouse'];
$form_of_bus = $_POST['form_of_bus'];
$kind_of_bus = $_POST['kind_of_bus'];
$tin_no = $_POST['tin_no'];
$c_person = $_POST['c_person'];
$position = $_POST['position'];
$c_person2 = $_POST['c_person2'];
$position2 = $_POST['position2'];
$major_prod = $_POST['major_prod'];
$sec_serv = $_POST['sec_serv'];
$status = 0;

$sql = "UPDATE `supplier_info` SET `supplier_name`='$s_name',`head_office_address`='$ho_add',`telephone`='$telephone',`email_address`='$e_add',`branch`='$branch',`tel_no`='$tel_no',`warehouse`='$warehouse',`form_of_business`='$form_of_bus',`kind_of_business`='$kind_of_bus',`tin_no`='$tin_no',`contact_person`='$c_person',`position`='$position',`contact_person2`='$c_person2',`position2`='$position2',`major_products`='$major_prod',`secondary_services`='$sec_serv' WHERE supplier_id = '".$_SESSION['supplier_id']."'";
mysqli_query($conn,$sql);

$sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Supplier')";
                                mysqli_query($conn,$sql1);

echo '<script>alert("Successfully Updated!");</script>';
//echo '<script>swal("Success","","succes");</script>';
echo "<meta http-equiv='refresh' content='0'>";

  echo "<script type='text/javascript'>location.href = 'supplier';</script>";
} 


?>
      
  </div>
  
</div>
</body>
</html>