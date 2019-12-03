  <?php  
       session_start();
    include_once '../../config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_finance" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View/Edit Purchase Requisition</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <?php


            if(isset($_POST['view_purchase'])){
               $_SESSION['purchase_requisition_no'] = $_POST['purchase_requisition_no'];
                    
            $sql="SELECT * FROM purchase_requisition WHERE purchase_requisition_no = '".$_SESSION['purchase_requisition_no']."'";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
if($row['status'] != "Disabled"){

                  echo '
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                            <div class="col col-sm-4">
                             <div class="form-group">
                             <label>Item Name:</label>
                              <select class="form-control" name="i_name" disabled>
                                  <option value="'.$row['item_name'].'" selected="true">'.$row['item_name'].'</option>';
                  
                  $sql_item = "SELECT item_name FROM materials WHERE item_name != '".$row['item_name']."'";
                  $res_item = mysqli_query($conn,$sql_item);
                  while($rows = mysqli_fetch_assoc($res_item)){
                      echo '
                           <option value="'.$rows['item_name'].'">'.$rows['item_name'].'</option>
                      ';
                  }
        echo '
                              </select>
                                  
                                  </div>
                                </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                            <label>Item Description:</label>
                                  <input type="text" class="form-control" name="i_desc" value="'.$row['item_desc'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                            <label>Quantity:</label>
                                  <input type="number" class="form-control" name="quantity" value="'.$row['quantity'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                            <label>Unit of Measure:</label>
                              <select name="u_measure" class="form-control" disabled>
                                  <option selected="true" value="'.$row['unit'].'" >'.$row['unit'].'</option>
                      ';

                         if($row['unit'] == "Kilogram"){
                            echo '
                                 
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Centimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Millimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Meter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                 
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Ream"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                 
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Liter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                               
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Per Piece"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Per Box"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                 
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
                    echo '
                                </select>
                                 
                                  </div>
                            </div>
                             <div class="col col-sm-4">
                            <div class="form-group">
                            <label>Unit price:</label>
                                    <input type="number" class="form-control" name="u_price" value="'.$row['unit_price'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                            <label>Total:</label>
                                    <input type="number" class="form-control" name="total" value="'.$row['total'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <h5>Tentative Delivery Date:</h5>
                                  <input type="date" class="form-control" name="td_date"  value="'.$row['tentative_delivery_date'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <h5>Actual Delivery Date:</h5>
                                    <input type="date" class="form-control" name="ad_date"value="'.$row['actual_delivery_date'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                            <label>Status:</label>
                                <select class="form-control" name="status" value="'.$row['status'].'" disabled>
                    ';
                    if($row['status']=="Approved"){
                      echo '
                                  <option value="Pending">Pending</option>
                                  <option selected="true" value="Approved">Approved</option>
                      ';
                    }else if($row['status']=="Pending"){
                      echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                      ';
                    }else{
                       echo '
                                <option selected="true" value="Pending">'.$row['status'].'</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                      ';
                    }

                    echo '
                                 
                                </select> 
                                   
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="edit_purchase" class="btn btn-warning" disabled>
                                    </div>
                                </div>
                              </div>
                            </form> 
                          
                          ';
                        
                      }
                      else
                      {
                        // echo 'asdas';
               //$_SESSION['material_id'] = $_POST['material_id'];
                      //$material_id = $_POST['material_id'];
           


                  echo '
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                            <div class="col col-sm-6">
                             <div class="form-group">
                              <label>Item Name:</label>
                              <select class="form-control" name="i_name" disabled>
                                  <option value="'.$row['item_name'].'" selected="true">'.$row['item_name'].'</option>';
                  
                  $sql_item = "SELECT item_name FROM materials WHERE item_name != '".$row['item_name']."'";
                  $res_item = mysqli_query($conn,$sql_item);
                  while($rows = mysqli_fetch_assoc($res_item)){
                      echo '
                           <option value="'.$rows['item_name'].'">'.$rows['item_name'].'</option>
                      ';
                  }
        echo '
                              </select>
                                  
                                  </div>
                                </div>
                              <div class="col col-sm-6">
                            <div class="form-group">
                            <label>Item Description:</label>
                                  <input type="text" class="form-control" name="i_desc" value="'.$row['item_desc'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                            <label>Quantity:</label>
                                  <input type="number" class="form-control" name="quantity" value="'.$row['quantity'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                            <label>Unit of Measure:</label>
                              <select name="u_measure" class="form-control" disabled>
                                  <option selected="true" value="'.$row['unit'].'" >'.$row['unit'].'</option>
                      ';

                         if($row['unit'] == "Kilogram"){
                            echo '
                                 
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Centimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Millimeter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Meter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                 
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Ream"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                 
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Liter"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                               
                                  <option value="Per Piece">Per Piece</option>
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Per Piece"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  
                                  <option value="Per Box">Per Box</option>
                            ';
                          }else if($row['unit'] == "Per Box"){
                            echo '
                                  <option value="Kilogram">Kilogram</option>
                                  <option value="Centimeter">Centimeter</option>
                                  <option value="Millimeter">Millimeter</option>
                                  <option value="Meter">Meter</option>
                                  <option value="Ream">Ream</option>
                                  <option value="Liter">Liter</option>
                                  <option value="Per Piece">Per Piece</option>
                                 
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
                    echo '
                                </select>
                                 
                                  </div>
                            </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                            <label>Unit Price:</label>
                                    <input type="number" class="form-control" name="u_price" value="'.$row['unit_price'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                            <label>Total:</label>
                                    <input type="number" class="form-control" name="total" value="'.$row['total'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <label>Tentative Delivery Date:</label>
                                  <input type="date" class="form-control" name="td_date"  value="'.$row['tentative_delivery_date'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <label>Actual Delivery Date:</label>
                                    <input type="date" class="form-control" name="ad_date"value="'.$row['actual_delivery_date'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                             <label>Status:</label>
                                <select class="form-control" name="status" value="'.$row['status'].'" disabled>
                    ';
                    if($row['status']=="Pending"){
                      echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option  value="Approved">Approved</option>
                      ';
                    }else if($row['status']=="Approved"){
                      echo '
                                  <option value="Pending">Pending</option>
                                  <option selected="true" value="Approved">Approved</option>
                      ';
                    }else{
                       echo '
                                <option selected="true" value="Pending">'.$row['status'].'</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                      ';
                    }

                    echo '
                                 
                                </select> 
                                   
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="edit_purchase" class="btn btn-warning" disabled>
                                    </div>
                                </div>
                              </div>
                            </form> 
                          
                          ';
                      
                    }
                    }
                  }
                            ?>    
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['edit_purchase'])){
error_reporting(0);
  $i_name = $_POST['i_name'];
  $i_desc = $_POST['i_desc'];
  $quantity = $_POST['quantity'];
  $u_measure = $_POST['u_measure'];
  $u_price = $_POST['u_price'];
  $total = $_POST['total'];
  $td_date = $_POST['td_date'];
  $ad_date = $_POST['ad_date'];
  $status = $_POST['status'];

  $now = date("Y-m-d H:i:s");
  if(empty($i_name) || empty($u_price) || empty($total) || empty($quantity) || empty($u_measure)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("UPDATE `purchase_requisition` SET `item_name`=?,`item_desc`=?,`quantity`=?,`unit`=?,`unit_price`=?,`total`=?,`tentative_delivery_date`=?,`actual_delivery_date`=?,`status`=? WHERE purchase_requisition_no = ?");
                              $stmt->bind_param('ssssssssss',$i_name,$i_desc,$quantity,$u_measure,$u_price,$total,$td_date,$ad_date,$status,$_SESSION['purchase_requisition_no']);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Updated!","", "success");</script>';
                                 echo '<script>alert("Successfully Updated!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Purchase Requisition')";
                              mysqli_query($conn,$sql1);
                            //  header("Location: ../index_admin");
                               echo "<script type='text/javascript'>location.href = '../../index_finance';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>