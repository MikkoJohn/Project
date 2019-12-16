  <?php  
  session_start();
 include('includes/header.php'); 
// include('includes/navbar.php');
//include 'includes/link.php';
include 'config.php';
// $accname = $_SESSION['acct_name'];
// $acctype = $_SESSION['sess_type'];
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
                                   <input id="" type="text" class="form-control" name="uname" value="" placeholder="Username" required>          
                                </div>
                            </div>

                           <div class="col col-md-12">
                            <div style="margin-bottom: 25px" class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="" type="email" class="form-control" name="email" value="" placeholder="E-mail" required>          
                                </div>
                            </div>
                                    <div class="col-lg-12 controls">
                                      <input type="submit" name="forgotpass" class="btn btn-success">
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
if(isset($_POST['forgotpass'])){
//error_reporting(0);
 $uname = $_POST['uname'];
  $email = $_POST['email'];



//$uname = $_POST['uname'];
  if(empty($uname)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';

   } else {

$sqls = "SELECT * FROM `tbl_useraccounts` WHERE `uname`='".$uname."' AND `email` ='".$email."'";
$resulta = $conn->query($sqls);
if($resulta->num_rows >= 1) {


  $sqlss = "SELECT * FROM `tbl_useraccounts` WHERE `uname`='".$uname."' AND `email` ='".$email."'";
$resultas = mysqli_query($conn,$sqlss);
   while($rows = mysqli_fetch_assoc($resultas)){
      $pass = $rows['pass'];
$_SESSION['user_type']=   $rows['user_type'];
 $_SESSION['uname']=   $rows['uname'];
      echo  $_SESSION['uname'];
  }
                 // echo '<script>alert("Successfully Added!");</script>';
          $sql1="INSERT INTO `user_action`(`username`, `user_designation`,`action_date`, `action_done`) VALUES ('".$_SESSION['uname']."','".$_SESSION['user_type']."','$now','Reset Password Account')";
          mysqli_query($conn,$sql1);

                    echo "<script type='text/javascript'>location.href = 'createpassword';</script>";
                                

                        
                              
   
} else {
  echo'<script>alert("Error!");</script>';
}

}}
?>