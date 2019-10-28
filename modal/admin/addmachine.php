  <?php  
  
    include_once 'config.php';
    include '../../includes/link.php';
    session_start();
    $accname = $_SESSION['acct_name'];
    $acctype = $_SESSION['sess_type'];
    // echo'<script>swal("Successfully Added!","", "success");</script>';
    // echo'<script>alert("Successfully Added!");</script>';
  ?>
    <!-- OperatorModal -->
   <!--  --> 
   <a href="../../index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Machine</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                             <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="mname" placeholder="Machine Name" required>
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                  <select name="mdivision" class="form-control" required>
                                    <option selected="true" value="NULL" disabled>SELECT DIVISION</option>
                                    <option value="Pre-Press">Pre-Press</option>
                                    <option value="Press">Press</option>
                                    <option value="Post-Press">Post-Press</option>
                                  </select>     

                                   <!--  <input type="text" class="form-control" name="mdivision" placeholder="Machine Division"> -->
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="number" class="form-control" name="maxspeed" placeholder="Maximum Speed" required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="number" class="form-control" name="minspeed" placeholder="Minumum Speed" required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="number" class="form-control" name="mmaxsize" placeholder="Machine Max Size" required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="number" class="form-control" name="mminsize" placeholder="Machine Min Size" required>
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input  type="number" class="form-control" name="mparea" placeholder="Maximum Printing Area" required>
                                  </div>
                           <!--   <div style="margin-top:10px" class="form-group">

                                   <select name="mstatus" class="form-control">
                                    <option selected="true" value="NULL" disabled>SELECT STATUS</option>
                                    <option value="Available">Available</option>
                                    <option value="In Use">In Use</option>
                                    <option value="Under Maintenance">Under Maintenance</option>
                                  </select>   -->

                                    <!-- <input  type="text" class="form-control" name="mstatus" placeholder="Machine Status">
                                  </div> -->
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addmachine" class="btn btn-success">
                                    </div>
                                </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addmachine'])){
error_reporting(0);
  $mname = $_POST['mname'];
  $mdivision = $_POST['mdivision'];
  $maxspeed = $_POST['maxspeed'];
  $minspeed = $_POST['minspeed'];
  $mmaxsize = $_POST['mmaxsize'];
  $mminsize = $_POST['mminsize'];
  $mparea = $_POST['mparea'];
  $mstatus = "Available";
  if(empty($mname) || empty($mdivision) || empty($maxspeed) || empty($minspeed) || empty($mmaxsize) || empty($mminsize) || empty($mparea)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";

  $stmt = $conn->prepare("INSERT INTO `machine`(`machine_name`, `machine_division`, `maximum_size`, `minimum_size`, `maximum_printing_area`, `max_speed`, `min_speed`, `machine_status`) VALUES (?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('ssssssss', $mname,$mdivision,$mmaxsize,$mminsize,$mparea,$maxspeed,$minspeed,$mstatus);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                               echo '<script>alert("Successfully Added!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Machine')";
                              mysqli_query($conn,$sql1);
                          //    header("Location: ../../index_admin");
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