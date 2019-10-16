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
                    <div class="panel-title">Add Transmittal</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-12">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="p_by" placeholder="Prepared by" required>
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="pre_press" placeholder="Pre-Press" required>
                                  </div>
                                </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="post_press" placeholder="Post-Press" required>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                  <input type="text" class="form-control" name="others" placeholder="Others" required>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="jo_controlno" placeholder="Job Order Control No" required>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                             <div class="form-group">
                                    <input  type="text" class="form-control" name="desc" placeholder="Description" required>
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                             <div class="form-group">
                                <select class="form-control" name="status" required>
                                  <option value="NULL" selected="true" disabled>SELECT STATUS</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                </select>
                                   
                                  </div>
                                </div>
                            
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addtransmittal" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addtransmittal'])){
error_reporting(0);
  $p_by = $_POST['p_by'];
  $pre_press = $_POST['pre_press'];
  $post_press = $_POST['post_press'];
  $others = $_POST['others'];
  $jo_controlno = $_POST['jo_controlno'];
  $quantity = $_POST['quantity'];
  $desc = $_POST['desc'];
  $status = $_POST['status'];
 
  if(empty($p_by) || empty($pre_press) || empty($post_press) || empty($others) || empty($jo_controlno) || empty($quantity) || empty($desc) || empty($status)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `trasmittal`(`prep_by`, `pre_press`, `post_press`, `others`, `jo_no`, `quantity`, `description`, `status`) VALUES (?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssiss', $p_by,$pre_press,$post_press,$others,$jo_controlno,$quantity,$desc,$status);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Added!","", "success");</script>';

                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Transmittal')";
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