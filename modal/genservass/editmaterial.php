  <?php  
       session_start();
    include_once '../../config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_genservass" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View/Edit Material</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <?php


            if(isset($_POST['view_material'])){
               $_SESSION['material_id'] = $_POST['material_id'];
                      $material_id = $_POST['material_id'];
            $sql="SELECT * FROM materials WHERE material_id = '".$_SESSION['material_id']."'";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
if($row['status'] == 0){

                  echo '
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-12">
                             <div class="form-group">
                             <label>Item Name:</label>
                                    <input type="text" class="form-control" name="i_name" placeholder="Item Name" value="'.$row['item_name'].'">
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                             <label>Item Description:</label>
                                    <input type="text" class="form-control" name="i_type" placeholder="Item Description" value="'.$row['item_desc'].'">
                                  </div>
                                </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                            <label>Category:</label>
                              <select class="form-control" name="category">
                              ';
                          if($row['category'] =="Ink"){
                              echo '
                                  <option value="Paper">Paper</option>
                                  <option value="Ink" selected="true">Ink</option>
                                  <option value="Chemicals">Chemicals</option>
                              ';
                          }else if($row['category'] =="Paper"){
                               echo '
                                  <option value="Paper" selected="true">Paper</option>
                                  <option value="Ink">Ink</option>
                                  <option value="Chemicals">Chemicals</option>
                              ';
                          } else if($row['category'] =="Chemicals"){
                               echo '
                                  <option value="Paper" selected="true">Paper</option>
                                  <option value="Ink">Ink</option>
                                  <option value="Chemicals" selected="true">Chemicals</option>
                              ';
                          }else {
                            echo '
                                  <option value="Paper" selected="true" value="NULL" disabled>SELECT CATEGORY</option>
                                  <option value="Paper">Paper</option>
                                  <option value="Ink">Ink</option>
                                  <option value="Chemicals" selected="true">Chemicals</option>
                              ';
                          }

                      echo '
                                </select>
                                   
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                            <label>Quantity:</label>
                                  <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="'.$row['quantity'].'">
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                            <label>Unit of Measure:</label>
                              <select class="form-control" name="u_measure" value="'.$row['unit_of_measure'].'">
                              ';
                          if($row['unit_of_measure'] == "Kilogram"){
                            echo '
                                  <option selected="true" value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Centimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option selected="true" value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Millimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option selected="true" value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Meter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option selected="true" value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Ream"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option selected="true" value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Liter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option selected="true" value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Per Piece"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option selected="true" value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Per Box"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option selected="true" value="Per Box">Per Box</option>
                            ';
                          }else {
                            echo '
                                  <option selected="true" value="NULL" disabled>SELECT UNIT OF MEASURE</option>
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }
                                    // <input type="text" class="form-control" name="u_measure" placeholder="Unit of Measure" value="'.$row['unit_of_measure'].'">
                      echo '
                              </select>
                                  </div>
                            </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                            <label>Size:</label>
                                    <input type="text" class="form-control" name="size" placeholder="Size" value="'.$row['size'].'">
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                     <button name="updatematerial" class="btn btn-warning btn-md" value="UPDATE"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>  
                                    </div>
                                </div>
                              </div>
                            </form> 
                          
                          ';
                        
                      }else if($row['status'] == 1){
               //$_SESSION['material_id'] = $_POST['material_id'];
                      //$material_id = $_POST['material_id'];
            $sql="SELECT * FROM materials WHERE material_id = '".$_SESSION['material_id']."'";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){

echo '
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-12">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="i_name" placeholder="Item Name" value="'.$row['item_name'].'" disabled>
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="i_type" placeholder="Item Description" value="'.$row['item_desc'].'"disabled>
                                  </div>
                                </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                              <select class="form-control" name="category"disabled>
                              ';
                          if($row['category'] =="Ink"){
                              echo '
                                  <option value="Paper">Paper</option>
                                  <option value="Ink" selected="true">Ink</option>
                                  <option value="Chemicals">Chemicals</option>
                              ';
                          }else if($row['category'] =="Paper"){
                               echo '
                                  <option value="Paper" selected="true">Paper</option>
                                  <option value="Ink">Ink</option>
                                  <option value="Chemicals">Chemicals</option>
                              ';
                          } else if($row['category'] =="Chemicals"){
                               echo '
                                  <option value="Paper" selected="true">Paper</option>
                                  <option value="Ink">Ink</option>
                                  <option value="Chemicals" selected="true">Chemicals</option>
                              ';
                          }else {
                            echo '
                                  <option value="Paper" selected="true" value="NULL" disabled>SELECT CATEGORY</option>
                                  <option value="Paper">Paper</option>
                                  <option value="Ink">Ink</option>
                                  <option value="Chemicals" selected="true">Chemicals</option>
                              ';
                          }

                      echo '
                                </select>
                                   
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                  <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="'.$row['quantity'].'"disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                              <select class="form-control" name="u_measure" value="'.$row['unit_of_measure'].'"disabled>
                              ';
                          if($row['unit_of_measure'] == "Kilogram"){
                            echo '
                                  <option selected="true" value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Centimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option selected="true" value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Millimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option selected="true" value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Meter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option selected="true" value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Ream"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option selected="true" value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Liter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option selected="true" value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Per Piece"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option selected="true" value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit_of_measure'] == "Per Box"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option selected="true" value="Per Box">Per Box</option>
                            ';
                          }else {
                            echo '
                                  <option selected="true" value="NULL" disabled>SELECT UNIT OF MEASURE</option>
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }
                                    // <input type="text" class="form-control" name="u_measure" placeholder="Unit of Measure" value="'.$row['unit_of_measure'].'">
                      echo '
                              </select>
                                  </div>
                            </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="size" placeholder="Size" value="'.$row['size'].'"disabled>
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                     <button name="updatematerial" class="btn btn-warning btn-md" value="UPDATE"disabled><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>  
                                    </div>
                                </div>
                              </div>
                            </form> 
                          
                          ';
                        }
                      }
                    }
                  }
                            ?>    
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['updatematerial'])){
error_reporting(0);
  $i_name = $_POST['i_name'];
  $i_type = $_POST['i_type'];
  $category = $_POST['category'];
  $quantity = $_POST['quantity'];
  $u_measure = $_POST['u_measure'];
  $size = $_POST['size'];

  $now = date("Y-m-d H:i:s");
  if(empty($i_name) || empty($i_type) || empty($category) || empty($quantity) || empty($u_measure) || empty($size)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("UPDATE `materials` SET `item_name`=?,`item_desc`=?,`category`=?,`quantity`=?,`size`=?,`unit_of_measure`=? WHERE material_id = ?");
                              $stmt->bind_param('sssssss',$i_name,$i_type,$category,$quantity,$size,$u_measure,$_SESSION['material_id']);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Updated!","", "success");</script>';
                                 echo '<script>alert("Successfully Updated!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Material')";
                              mysqli_query($conn,$sql1);
                            //  header("Location: ../index_admin");
                               echo "<script type='text/javascript'>location.href = '../../index_genservass';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>