  <?php  
    include_once 'config.php';
    include 'includes/link.php';
  ?>
    <!-- OperatorModal -->
   <!--  --> 
   <a href="index_admin.php" class="btn btn-primary" style="margin:2%">BACK</a>
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
                            <!-- div style="margin-bottom: 25px" class="input-group">
                                   <input type="text" class="form-control" name="mname" value="" placeholder="Machine Name">                                       
                                    </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <input type="password" class="form-control" name="mdivision" placeholder="Machine Division">
                                    </div> -->
                             <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="mname" placeholder="Machine Name">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="mdivision" placeholder="Machine Division">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="maxspeed" placeholder="Maximum Speed">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="minspeed" placeholder="Minumum Speed">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="mmaxsize" placeholder="Machine Max Size">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="mminsize" placeholder="Machine Min Size">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input  type="text" class="form-control" name="mparea" placeholder="Maximum Printing Area">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input  type="text" class="form-control" name="mstatus" placeholder="Machine Status">
                                  </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addaccount" class="btn btn-success">
                                    </div>
                                </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addaccount'])){
error_reporting(0);
  $mname = $_POST['mname'];
  $mdivision = $_POST['mdivision'];
  $maxspeed = $_POST['maxspeed'];
  $minspeed = $_POST['minspeed'];
  $mmaxsize = $_POST['mmaxsize'];
  $mminsize = $_POST['mminsize'];
  $mparea = $_POST['mparea'];
  $mstatus = $_POST['mstatus'];
  if(empty($mname) || empty($mdivision) || empty($maxspeed) || empty($minspeed) || empty($mmaxsize) || empty($mminsize) || empty($mparea) || empty($mstatus)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";

  $stmt = $conn->prepare("INSERT INTO `machine`(`machine_name`, `machine_division`, `maximum_size`, `minimum_size`, `maximum_printing_area`, `max_speed`, `min_speed`, `machine_status`) VALUES (?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('ssssssss', $mname,$mdivision,$mmaxsize,$mminsize,$mparea,$maxspeed,$minspeed,$mstatus);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Added!","", "success");</script>';
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>