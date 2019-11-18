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
                    <div class="panel-title">Add Material Request</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-12">
                             <div class="form-group">
                                  <select class="form-control" name="jo_controlno" required>
                                    <option value="null" selected="true" disabled>SELECT JOB CONTROL NO</option>
                                <?php
                    $sql_jono ="SELECT job_order_control_no FROM job_order";
                    $res = mysqli_query($conn,$sql_jono);
                    while($row = mysqli_fetch_assoc($res)){
                      echo '
                          <option value="'.$row['job_order_control_no'].'">'.$row['job_order_control_no'].'</option>
                      ';
                    } 
                                ?>
                                  </select>
                                    <!-- <input type="text" class="form-control" name="jo_controlno" placeholder="Job Control No." required> -->
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="number" class="form-control" name="no_reams" placeholder="No. of Reams" required>
                                  </div>
                                </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="p_size" placeholder="Paper Size" required>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                  <input type="text" class="form-control" name="k_paper" placeholder="Kind of Paper" required>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" min="0" required>
                                  </div>
                            </div>             
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" name="d_date" placeholder="Delivery Date" required>
                                  </div>
                            </div>
                           <!--   <div class="col col-sm-12">
                            <div class="form-group">
                                <select class="form-control" name="p_status" required>
                                    <option selected="true" value="NULL" disabled=""></option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                </select>
                                   
                                  </div>
                            </div> -->
                             <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks" required>
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addmaterialreq" class="btn btn-success" >
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addmaterialreq'])){
error_reporting(0);
  $jo_controlno = $_POST['jo_controlno'];
  $no_reams = $_POST['no_reams'];
  $p_size = $_POST['p_size'];
  $k_paper = $_POST['k_paper'];
  $quantity = $_POST['quantity'];
  $d_date = $_POST['d_date'];
  $p_status = "Pending";
  $remarks = $_POST['remarks'];
   $now = date("Y-m-d");
  if(empty($jo_controlno) || empty($no_reams) || empty($p_size) || empty($k_paper) || empty($quantity) || empty($d_date) || empty($p_status) || empty($remarks)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `material_request_form`(`job_order_control_no`, `no_of_reams`, `paper_size`, `kind_of_paper`, `quantity`, `date`, `delivery_date`, `pending_status`, `remarks`) VALUES (?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssssss', $jo_controlno,$no_reams,$p_size,$k_paper,$quantity,$now,$d_date,$p_status,$remarks);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                               echo '<script>alert("Successfully Added!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Material Request')";
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