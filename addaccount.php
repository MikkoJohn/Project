  <?php  
    include_once 'config.php';
    include 'includes/link.php';
  ?>

    <!-- OperatorModal -->
   <!--  --> 
   <a href="index_admin.php" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Account</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="uname" type="text" class="form-control" name="uname" value="" placeholder="Username">                                       
                                    </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="pass" type="password" class="form-control" name="pass" placeholder="Password">
                                    </div>
                                <div style="margin-top:10px" class="form-group">
                                    <select class="form-control" name="acc">
                                      <option selected="true" value="NULL" disabled="disabled">SELECT DESIGNATION</option>
                                      <option value="1">Admin</option>
                                      <option value="2">Production Head</option>
                                      <option value="3">Production Assisstant</option>
                                      <option value="4">Production  Planner</option>
                                      <option value="5">Division Support</option>
                                      <option value="6">Sales</option>
                                      <option value="7">Operator</option>
                                    </select>
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
 $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $acc = $_POST['acc'];

  if(empty($uname) && empty($pass) && empty($acc)){
    echo'<script>swal("Please fill all fields!", "", "warning");</script>';
  }else if(!empty($uname) && empty($pass) && empty($acc)){
    echo'<script>swal("Please fill Password and Designation!", "", "warning");</script>';
  }else if(!empty($uname) && !empty($pass) && empty($acc)){
    echo'<script>swal("Please fill Designation field!", "", "warning");</script>';
  }else if(empty($uname) && !empty($pass) && !empty($acc)){
    echo'<script>swal("Please fill Username field!", "", "warning");</script>';
  }else if(empty($uname) && empty($pass) && !empty($acc)){
    echo'<script>swal("Please fill Username and Password!", "", "warning");</script>';
  }else if(empty($uname) && !empty($pass) && empty($acc)){
    echo'<script>swal("Please fill Username and Designation!", "", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";

  $stmt = $conn->prepare("INSERT INTO `tbl_useraccounts` (`uname`,`pass`,`user_type`) VALUES (?,?,?)");
                              $stmt->bind_param('sss', $uname,$pass,$acc);

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