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
                    <div class="panel-title">Add Purchase Request</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                           <!--   <div class="col col-sm-6">
                             <div class="form-group">

                                    <input type="text" class="form-control" name="m_id" placeholder="Material ID">
                                  </div>
                              </div> -->
                             <div class="col col-sm-6">
                             <div class="form-group">
                              <select class="form-control" name="i_name">
                                  <option value="NULL" selected="true" disabled>SELECT ITEM NAME</option>
                    <?php 
                  $sql_item = "SELECT item_name FROM materials";
                  $res_item = mysqli_query($conn,$sql_item);
                  while($rows = mysqli_fetch_assoc($res_item)){
                      echo '
                           <option value="'.$rows['item_name'].'">'.$rows['item_name'].'</option>
                      ';
                  }
                    ?>
                              </select>
                                   <!--  <input type="text" class="form-control" name="i_name" placeholder="Item Name"> -->
                                  </div>
                                </div>
                            <!-- <div class="col col-sm-6"> -->
                           <!--  <div class="form-group">
                                    <input type="text" class="form-control" name="i_desc" placeholder="Item Desc">
                                  </div>
                            </div> -->
                            <div class="col col-sm-6">
                            <div class="form-group">
                                  <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
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
                                   <!--  <input type="text" class="form-control" name="u_measure" placeholder="Unit Measure"> -->
                                  </div>
                            </div>
                             <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="u_price" placeholder="Unit Price">
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="total" placeholder="Total">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <h5>Tentative Delivery Date:</h5>
                                    <input type="date" class="form-control" name="td_date">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <h5>Actual Delivery Date:</h5>
                                    <input type="date" class="form-control" name="ad_date">
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                             <!--    <select class="form-control" name="status">
                                  <option selected="true" value="NULL">SELECT STATUS</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                </select> -->
                                   
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
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
error_reporting(0);
  $m_id = $_POST['m_id'];
  $i_name = $_POST['i_name'];
  $i_desc = $_POST['i_desc'];
  $quantity = $_POST['quantity'];
  $u_measure = $_POST['u_measure'];
  $u_price = $_POST['u_price'];
  $total = $_POST['total'];
  $td_date = $_POST['td_date'];
  $ad_date = $_POST['ad_date'];
  $status = "Pending";
  $now = date("Y-m-d H:i:sa");
  if(empty($m_id) || empty($i_name)  || empty($quantity) || empty($u_measure) || empty($u_price) || empty($total) || empty($td_date) || empty($ad_date)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `purchase_requisition`(`date`, `material_id`, `item_name`, `item_desc`, `quantity`, `unit`, `unit_price`, `total`, `tentative_delivery_date`, `actual_delivery_date`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssssssss', $now,$m_id,$i_name,$i_desc,$quantity,$u_measure,$u_price,$total,$td_date,$ad_date,$status);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                                 echo '<script>alert("Successfully Added!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Purchase Request')";
                              mysqli_query($conn,$sql1);
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