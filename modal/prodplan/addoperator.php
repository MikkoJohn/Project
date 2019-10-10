  <?php  
  session_start();
    include_once '../../config.php';
     include '../../includes/link.php';
    include '../../includes/header.php';
        $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>
    <!-- OperatorModal -->
   <!--  --> 
   <a href="../../index_prodplan" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Operator</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">  
                      <div class="row">  
                            <div class="col col-lg-12">     
                             <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="acc_id" placeholder="Account ID No.">
                                  </div>
                                </div>
                            <div class="col col-md-4">
                             <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name">
                                  </div>
                                </div>
                            <div class="col col-md-4">
                            <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="mname" placeholder="Middle Name">
                                  </div>
                                </div>
                            <div class="col col-md-4">
                            <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                  </div>
                                </div>
                           <div class="col col-md-6">
                            <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="c_number" placeholder="Contact Number">
                                  </div>
                                </div>
                            <div class="col col-md-6">
                            <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="schedule" placeholder="Schedule">
                                  </div>
                                </div>
                            <div class="col col-md-6">
                             <div style="margin-top:0px" class="form-group">
                                    <input  type="text" class="form-control" name="uname" placeholder="Username">
                                  </div>
                                </div>
                            <div class="col col-md-6">
                             <div style="margin-top:0px" class="form-group">
                                    <input  type="password" class="form-control" name="pass" placeholder="Password">
                                  </div>
                                </div>
                              </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addacct" class="btn btn-success">
                                    </div>
                                </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php 
if(isset($_POST['addacct'])){
//error_reporting(0);
  $acc_id = $_POST['acc_id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $c_number = $_POST['c_number'];
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $schedule = $_POST['schedule'];
  if(empty($acc_id) || empty($fname) || empty($lname) || empty($c_number) || empty($uname) || empty($pass) || empty($schedule)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";

  $stmt = $conn->prepare("INSERT INTO `operators`(`account_id_no`, `first_name`, `middle_name`, `last_name`, `contact_no`, `username`, `password`, `operator_schedule`) VALUES (?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('ssssssss', $acc_id,$fname,$mname,$lname,$c_number,$uname,$pass,$schedule);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Added!","", "success");</script>';
                                
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Operator')";
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