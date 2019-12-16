  <?php  
  session_start();
 include('includes/header.php'); 
// include('includes/navbar.php');
//include 'includes/link.php';
include 'config.php';
// $accname = $_SESSION['acct_name'];
// $acctype = $_SESSION['sess_type'];
$user_designation = $_SESSION['user_type'];
$uname = $_SESSION['uname'];
echo $uname;
echo $user_designation;
                   ?>
   <div class="container-fluid">
   <a href="index" class="btn btn-primary" style="margin:2%">BACK</a>

   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:30px;" class="mainbox col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-4">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title"><b>Forgot Password</b></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">  
                        <div class="row">   
                          <div class="col col-lg-12">
                               <div style="margin-bottom: 25px" class="input-group">
                          

                          <div class="col col-md-12">
                            <div style="margin-bottom: 25px" class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="" type="Password" class="form-control" name="pass" value="" placeholder="Create New Password" required>          
                                </div>
                            </div>

                           <div class="col col-md-12">
                            <div style="margin-bottom: 25px" class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="" type="Password" class="form-control" name="cpass" value="" placeholder="Confirm Password" required>          
                                </div>
                            </div>
                                    <div class="col-lg-12 controls">
                                      <input type="submit" name="reset" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
          </div>

   
<?php 
if(isset($_POST['reset'])){
//error_reporting(0);
 $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];



//$uname = $_POST['uname'];
  if(empty($uname)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';

   } else {

if($pass == $cpass){
  $stmt = $conn->prepare("UPDATE tbl_useraccounts SET pass=? WHERE uname =?");
                              $stmt->bind_param('ss', $pass,$uname);

                              if($stmt->execute()){
                                echo '<script>alert("Successfully Reset!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$uname','$user_designation','$now','Forgot Password Account')";
                              mysqli_query($conn,$sql1);

                            echo "<script type='text/javascript'>location.href = 'index';</script>";
                              exit();
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}else {
  echo"<script>alert('Password not matched!')</script>";
}
                              
}


// header("Location:../../index_admin");
}


?>