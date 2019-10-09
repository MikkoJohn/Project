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
                                    <input type="text" class="form-control" name="jo_controlno" placeholder="Job Control No.">
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="number" class="form-control" name="no_reams" placeholder="No. of Reams">
                                  </div>
                                </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="p_size" placeholder="Paper Size">
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                  <input type="text" class="form-control" name="k_paper" placeholder="Kind of Paper">
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                                  </div>
                            </div>             
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" name="d_date" placeholder="Delivery Date">
                                  </div>
                            </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="p_status" placeholder="Pending Status">
                                  </div>
                            </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addmaterialreq" class="btn btn-success">
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
  $p_status = $_POST['p_status'];
  $remarks = $_POST['remarks'];
   $now = date("Y-m-d");
  if(empty($jo_controlno) || empty($no_reams) || empty($p_size) || empty($k_paper) || empty($quantity) || empty($d_date) || empty($p_status) || empty($remarks)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `material_request_form`(`job_order_control_no`, `no_of_reams`, `paper_size`, `kind_of_paper`, `quantity`, `date`, `delivery_date`, `pending_status`, `remarks`) VALUES (?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssssss', $jo_controlno,$no_reams,$p_size,$k_paper,$quantity,$now,$d_date,$p_status,$remarks);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Added!","", "success");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Material Request')";
                              mysqli_query($conn,$sql1);
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>