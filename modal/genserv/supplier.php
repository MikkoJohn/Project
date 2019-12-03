<?php
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
  <a href="../../index_genserv" class="btn btn-primary" style="margin-top:1%;margin-left: 1%;">BACK</a>
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
                <h5 class="m-0 font-weight-bold text-primary">Supplier Info</h5>
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
                              <th><center>Supplier Name</center></th>
                              <th><center>E-mail Address</center></th>
                              <th><center>Major Products</center></th>
                              <th><center>Status</center></th>
                              <th><center>Action</center></th>
                               </tr>  
                        </thead> 
                        <tbody>
                    <?php
                      $sql = "SELECT * FROM supplier_info";
                      $result = mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                        echo '
                            <tr>
                              <td><center>'.$row['supplier_name'].'</center></td>
                              <td><center>'.$row['email_address'].'</center></td>
                              <td><center>'.$row['major_products'].'</center></td>
                               '; 
                    if($row['status'] == 0){
                      echo '<td><center>Active</center></td>';
                    }else if($row['status'] == 1){
                      echo '<td><center>Disabled</center></td>';
                    }
                             
                            echo '
                              <td>
                              <center>
                          <div class="row">
                                    <div class="col col-lg-6">
                                    <form method="POST" action="editsupplier">
                       
                          <input type="hidden" name="supplier_id" value="'.$row['supplier_id'].'">
                          <button name="view_supplier" class="btn btn-success" style="width:100%;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="modal" data-target="#viewModal"></span> View</button>
                                    </form>
                                    </div>
                                    <div class="col col-lg-6">';

        if($row['status'] =="0"){
            echo '
                                    <form method="POST" action="delete">
         <input type="hidden" name="supplier_id" value="'.$row['supplier_id'].'">
                        <button name="delete_supplier" class="btn btn-danger" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Disable</button>
        </form> ';
      }else if($row['status'] =="1"){
            echo '
                                    <form method="POST" action="enable">
         <input type="hidden" name="supplier_id" value="'.$row['supplier_id'].'">
                        <button name="enable_supplier" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Enable</button>
        </form> ';
      }

        echo ' 
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



  <div class="modal fade" id="myModal" role="dialog" style="width: 100%;">
    <div class="modal-dialog modal-lg" style="width: 100%;">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%;">
        <div class="modal-header">
          <h5>Add Supplier</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST" onsubmit="return confirm('Are you sure?')">
              <div class="row">
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Supplier Name:</h6>
                  <input type="text" name="s_name" class="form-control" placeholder="Supplier Name" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Head Office Address:</h6>
                  <input type="text" name="ho_add" class="form-control"placeholder="Head Office Address" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Telephone No:</h6>
                  <input type="number" name="telephone" class="form-control" placeholder="Telephone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>E-mail Address:</h6>
                  <input type="email" name="e_add" class="form-control" placeholder="E-mail Address" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Branch:</h6>
                  <input type="text" name="branch" class="form-control" placeholder="Branch" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Telephone No.:</h6>
                  <input type="number" name="tel_no" class="form-control" placeholder="Telephone No." pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Warehouse:</h6>
                  <input type="text" name="warehouse" class="form-control" placeholder="Warehouse" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Form of Business:</h6>
                  <input type="text" name="form_of_bus" class="form-control" placeholder="Form of Business" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Kind of Business:</h6>
                  <input type="text" name="kind_of_bus" class="form-control" placeholder="Kind of Business" required>
                </div>
                <div class="col col-md-4" style="margin-bottom: 15px;">
                  <h6>Tin No:</h6>
                  <input type="text" name="tin_no" class="form-control" placeholder="Tin No." required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Contact Person:</h6>
                  <input type="text" name="c_person" class="form-control" placeholder="Contact Person" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Position:</h6>
                  <input type="text" name="position" class="form-control" placeholder="Position" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Contact Person:</h6>
                  <input type="text" name="c_person2" class="form-control" placeholder="Contact Person" required>
                </div>
                <div class="col col-md-3" style="margin-bottom: 15px;">
                  <h6>Position:</h6>
                  <input type="text" name="position2" class="form-control" placeholder="Position" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Major Product:</h6>
                  <input type="text" name="major_prod" class="form-control" placeholder="Major Products" required>
                </div>
                <div class="col col-md-6" style="margin-bottom: 15px;">
                  <h6>Secondary Services:</h6>
                  <input type="text" name="sec_serv" class="form-control" placeholder="Secondary Services" required>
                </div>
                <div class="col col-md-12" style="margin-bottom: 15px;">
                  <input type="submit" name="add_supplier" class="btn btn-primary form-control" value="ADD SUPPLIER">
                </div>
              </div>
          </form>
<?php
if(isset($_POST['add_supplier'])){
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

$sql = "INSERT INTO `supplier_info`(`supplier_name`, `head_office_address`, `telephone`, `email_address`, `branch`, `tel_no`, `warehouse`, `form_of_business`, `kind_of_business`, `tin_no`, `contact_person`, `position`, `contact_person2`, `position2`, `major_products`, `secondary_services`,`status`) VALUES ('$s_name','$ho_add','$telephone','$e_add','$branch','$tel_no','$warehouse','$form_of_bus','$kind_of_bus','$tin_no','$c_person','$position','$c_person2','$position2','$major_prod','$sec_serv','$status')";
mysqli_query($conn,$sql);

$sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Add Supplier')";
                                mysqli_query($conn,$sql1);
echo '<script>alert("Successfully Added!");</script>';
echo "<meta http-equiv='refresh' content='0'>";
//header("Location: client");
//session_destroy();
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