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
                    <div class="panel-title">Add Account</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">  
                        <div class="row">   
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                  
                                   <input  type="text" class="form-control" name="fname" value="" placeholder="First Name" onkeypress="return /[a-z]/i.test(event.key)" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                 
                                   <input type="text" class="form-control" name="mname" value="" placeholder="Middle Name"  onkeypress="return /[a-z]/i.test(event.key)">                                       
                                    </div>
                          </div>
                          <div class="col col-lg-4">
                               <div style="margin-bottom: 25px" class="input-group">
                                  
                                   <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" onkeypress="return /[a-z]/i.test(event.key)" required>                                       
                                    </div>
                          </div>
                          <div class="col col-md-12">
                            <div style="margin-bottom: 25px" class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="uname" type="text" class="form-control" name="uname" value="" placeholder="Username" required>                                       
                                    </div>
                            </div>
                             <div class="col col-md-12">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="pass" type="password" class="form-control" name="pass" placeholder="Password" required>
                                    </div>
                                  </div>
                              <div class="col col-md-6">
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <select class="form-control" name="acc" id="add_acc" required>
                                      <option selected="true" value="NULL" disabled="disabled">SELECT DESIGNATION</option>
                                      <!-- <option value="1">Admin</option> -->
                                      <option value="2">Production Head</option>
                                      <option value="3">Production Assisstant</option>
                                      <option value="4">Production  Planner</option>
                                      <option value="5">Division Support</option>
                                      <option value="6">Sales</option>
                                      <option value="7">Operator</option>
                                      <option value="8">General Services Head</option>
                                      <option value="9">General Services Assistant</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col col-md-6">
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <select class="form-control" name="div" id="divi">
                                      <option selected="true" value="NULL" disabled="disabled">SELECT DIVISION</option>
                                      <option value="admin">Admin</option>
                                      <option value="prepress">Pre-Press</option>
                                      <option value="press">Press</option>
                                      <option value="postpress">Post-Pres</option>
                                    </select>
                                  </div>
                                </div>
                                    <div class="col-lg-12 controls">
                                      <input type="submit" name="addaccount" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
<script>
  $(document).ready(function(){
$('#divi').show();
  });
  $(document).ready(function(){
    $('#add_acc').change(function(){
      if($(this).val()=="6"){
        $('#divi').hide();
      }else if($(this).val()=="4"){
        $('#divi').hide();
      }else if($(this).val()=="8"){
        $('#divi').hide();
      }else if($(this).val()=="9"){
        $('#divi').hide();
      }
      else {
        $('#divi').show();
      }
    });
  });
</script>    

   
<?php if(isset($_POST['addaccount'])){
//error_reporting(0);


 $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $acc = $_POST['acc'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
if(empty($div)){
  $div = "";
}else {
$div = $_POST['div'];
}

//$uname = $_POST['uname'];
  if(empty($uname) || empty($pass) || empty($acc) || empty($fname) || empty($lname)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';

   } else {

   // $usernames = mysqli_real_escape_string($uname);
   // $res = mysqli_query($conn,"SELECT * FROM tbl_useraccounts WHERE uname =".$usernames." ");
   // if($res->num_rows){
   //    echo '<script>alert("exist")</script>';
   // }else{
   //    echo '<script>alert("add")</script>';
   // }


  $stmt = $conn->prepare("INSERT INTO `tbl_useraccounts`(`uname`, `pass`, `user_type`, `fname`, `mname`, `lname`, `division`) VALUES (?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssss', $uname,$pass,$acc,$fname,$mname,$lname,$div);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","","success");</script>';
                                echo '<script>alert("Successfully Added!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Add Account')";
                              mysqli_query($conn,$sql1);
                             // header("Location: ../../index_admin");
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