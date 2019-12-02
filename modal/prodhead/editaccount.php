  <?php  
    include_once '../../config.php';
  include '../../includes/link.php';
    include '../../includes/header.php';
    session_start();
    $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
                   ?>
   
   <a href="../../index_prodhead" class="btn btn-primary" style="margin:2%">BACK</a>

   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View/Edit Account</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  <?php
                    if(isset($_POST['view_account'])){
                      $_SESSION['acc_id'] = $_POST['acc_id'];
                      $sql = 'SELECT * FROM tbl_useraccounts where ua_id ='.$_SESSION['acc_id'].' ';
                      $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                       if($row['status'] == "0"){ 
                        echo '
                        <form method="POST" class="form-horizontal" role="form">  
                        <div class="row">   
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                  <input type="hidden" name="acc_id" value="'.$row['ua_id'].'">
                                   <input  type="text" class="form-control" name="fname" placeholder="First Name" value="'.$row['fname'].'">                                       
                                    </div>
                          </div>
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                 
                                   <input type="text" class="form-control" name="mname" placeholder="Middle Name" value="'.$row['mname'].'">                                       
                                    </div>
                          </div>
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                  
                                   <input type="text" class="form-control" name="lname" placeholder="Last Name" value="'.$row['lname'].'">                                       
                                    </div>
                          </div>
                          <div class="col col-md-12">
                            <div style="margin-bottom: 25px" class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="uname" type="text" class="form-control" name="uname" placeholder="Username" value="'.$row['uname'].'">                                       
                                    </div>
                            </div>
                             <div class="col col-md-12">
                            <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="pass" type="password" class="form-control" name="pass" placeholder="Password" value="'.$row['pass'].'">
                                    </div>
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                  </div>
                                  <br>
                              ';
                                      
                              echo '
                                    
                                    <div class="col-lg-12 controls" style="margin-top: 15px">
                                      <button name="updateaccount" class="btn btn-warning btn-md" value="UPDATE"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>
                                    
                                    </div>
                                </div>
                              </div>
                            </form>     
                        ';
                      }
                    else
                    {
                      //$_SESSION['acc_id'] = $_POST['acc_id'];
                     
                        echo '
                        <form method="POST" class="form-horizontal" role="form">  
                        <div class="row">   
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                  <input type="hidden" name="acc_id" value="'.$row['ua_id'].'">
                                   <input  type="text" class="form-control" name="fname" placeholder="First Name" value="'.$row['fname'].'" disabled>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                 
                                   <input type="text" class="form-control" name="mname" placeholder="Middle Name" value="'.$row['mname'].'" disabled>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                  
                                   <input type="text" class="form-control" name="lname" placeholder="Last Name" value="'.$row['lname'].'" disabled>                                       
                                    </div>
                          </div>
                          <div class="col col-md-12">
                            <div style="margin-bottom: 25px" class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="uname" type="text" class="form-control" name="uname" placeholder="Username" value="'.$row['uname'].'" disabled>                                       
                                    </div>
                            </div>
                             <div class="col col-md-12">
                            <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="pass" type="password" class="form-control" name="pass" placeholder="Password" value="'.$row['pass'].'" disabled>
                                    </div>
                                    <input type="checkbox" onclick="myFunction()" disabled>Show Password
                                  </div>
                                  <br>
                              ';
                                      
                              echo '
                                    
                                    <div class="col-lg-12 controls" style="margin-top: 15px">
                                      <button name="updateaccount" class="btn btn-warning btn-md" value="UPDATE" disabled><span class="glyphicon glyphicon-edit" aria-hidden="true" disabled></span> Update</button>
                                    
                                    </div>
                                </div>
                              </div>
                            </form>     
                        ';
                      }
                    }
                  }
                      ?>
        
<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>     
                   
                        </div>                     
                    </div>  
                </div>                      
            </div>
           
   
<?php if(isset($_POST['updateaccount'])){
//error_reporting(0);
 $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  //$acc = $_POST['acc'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
//$div = $_POST['div'];
$acc_id = $_POST['acc_id'];
$now = date("Y-m-d H:i:s");

//$uname = $_POST['uname'];
  if(empty($uname) || empty($pass)  || empty($fname) || empty($lname)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';

   } else {

  $stmt = $conn->prepare("UPDATE `tbl_useraccounts` SET `uname`=?,`pass`=?,`fname`=?,`mname`=?,`lname`=? WHERE ua_id=?");
                              $stmt->bind_param('ssssss', $uname,$pass,$fname,$mname,$lname,$acc_id);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Updated!","","success");</script>';
                                echo '<script>alert("Successfully Updated!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Account')";
                              mysqli_query($conn,$sql1);
                             // header("Location:../index_admin");
                              echo "<script type='text/javascript'>location.href = '../../index_prodhead';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
                              

}

}


?>