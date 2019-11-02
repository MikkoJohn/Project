  <?php  
      session_start();
    include_once 'config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Material</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-12">
                             
                                <h6>Item Name:</h6>
                                    <input type="text" class="form-control" name="i_name" placeholder="Item Name" required>
                                  
                              </div>
                             <div class="col col-sm-12">
                            
                              <h6>Item Type:</h6>
                                    <input type="text" class="form-control" name="i_type" placeholder="Item Type" required>
                            
                                </div>
                            <div class="col col-sm-12" style="margin-top: 15px;">
                           
                              <select class="form-control" name="category" required>
                                <option selected="true" value="NULL" disabled="disabled">SELECT CATEGORY</option>
                                  <option value="Paper">Paper</option>
                                  <option value="Ink">Ink</option>
                                  <option value="Chemicals">Chemicals</option>
                                </select>
                                   
                               
                            </div>
                            <!-- <div class="col col-sm-12"> -->
                            <!-- <div class="form-group">
                                  <input type="number" class="form-control" name="quantity" min="0" placeholder="Quantity" required>
                                  </div>
                            </div> -->
                            <div class="col col-lg-12" style="margin-top: 15px;">
                           

                                <select name="u_measure" class="form-control" required>
                                  <option selected="true" value="NULL" disabled>SELECT UNIT OF MEASUREMENT</option>
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                                </select>
                               
                            </div>
                           <!--   <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="size" placeholder="Size">
                                  </div>
                            </div> -->
                            <div class="col-lg-12 controls" style="margin-top: 15px;">
                                      <input type="submit" name="addmaterial" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addmaterial'])){
// error_reporting(0);
  $i_name = $_POST['i_name'];
  $i_type = $_POST['i_type'];
  $category = $_POST['category'];
  $quantity = 0;
  $u_measure = $_POST['u_measure'];
 // $size = $_POST['size'];
 $size = "";
  if(empty($i_name) || empty($i_type) || empty($category) || empty($u_measure)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `materials`(`item_name`, `item_desc`, `category`, `quantity`, `size`, `unit_of_measure`) VALUES (?,?,?,?,?,?)");
                              $stmt->bind_param('ssssss', $i_name,$i_type,$category,$quantity,$size,$u_measure);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                                 echo '<script>alert("Successfully Added!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Material')";
                              mysqli_query($conn,$sql1);
                             // header("Location: ../../index_admin");
                            echo "<script type='text/javascript'>location.href = '../../index_admin';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>