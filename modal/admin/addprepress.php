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
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Pre-Press Activity</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">  
                        <div class="row">   
                          <div class="col col-lg-12">
                               <div style="margin-bottom: 5px">
                                  <h6>Activity No.:</h6>
                                   <input  type="number" class="form-control" name="act_no" placeholder="Activity No." required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom: 5px">
                                 <h6>Division Name:</h6>
                                   <input type="text" class="form-control" name="div_name" placeholder="Division Name" >                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom: 5px" >
                                  <h6>Activity:</h6>
                                   <input type="text" class="form-control" name="act" placeholder="Activity"  required>                                       
                                    </div>
                          </div>
                          <div class="col col-md-12">
                            <div style="margin-bottom: 5px" >
                              <h6>Type of Activity:</h6>
                                   <input  type="text" class="form-control" name="type_act" placeholder="Type of Activity" required>                                       
                                    </div>
                            </div>
                             <div class="col col-md-12">
                            <div style="margin-bottom: 15px" >
                                  <h6>Description:</h6>
                                        <input  type="text" class="form-control" name="desc" placeholder="Description" required>
                                    </div>
                                  </div>
                                    <div class="col-lg-12 controls">
                                      <input type="submit" name="addprepress" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>

   
<?php 
if(isset($_POST['addprepress'])){
//error_reporting(0);


 $act_no = $_POST['act_no'];
  $div_name = $_POST['div_name'];
  $act = $_POST['act'];
$desc = $_POST['desc'];
$type_act = $_POST['type_act'];


//$uname = $_POST['uname'];
  if(empty($act_no) || empty($div_name) || empty($act) || empty($desc) || empty($type_act)){
    // echo'<script>swal("Please fill blank fields!","", "warning");</script>';
     echo'<script>alert("Please fill blank fields!");</script>';
   } else {


  $stmt = $conn->prepare("INSERT INTO `pre_press` (`div_name`, `act_no`, `activity`, `type_of_act`, `description`) VALUES (?,?,?,?,?)");
                              $stmt->bind_param('sssss', $div_name,$act_no,$act,$type_act,$desc);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","","success");</script>';
                                echo '<script>alert("Successfully Added!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Add Pre-Press Activity')";
                              mysqli_query($conn,$sql1);
                              //header("location: ../../index_admin");
                    echo "<script type='text/javascript'>location.href = '../../index_admin';</script>";
                              exit();
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
                              

}
}
?>