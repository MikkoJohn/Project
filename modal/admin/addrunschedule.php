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
         <div id="loginbox" style="margin-top:0px;" class="mainbox col-lg-12 col-lg-offset-2 col-lg-8">                                      
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Project Run Schedule</div>
                </div>     

                <div style="padding-top:0px;" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">  
                        <div class="row">   
                          <div class="col col-lg-12">
                               <div style="margin-bottom: px" class="">
                                  <h6>Job Order Control No.:</h6>
                                   <select name="jo_no" class="form-control" >
                                        <option selected="true" value="NULL" disabled>SELECT JOB ORDER CONTROL NO</option>
                      <?php
                    $sql_jco = "SELECT job_order_control_no FROM job_order";
                    $result_jco = mysqli_query($conn, $sql_jco);
                    while($row = mysqli_fetch_assoc($result_jco)){
                          echo '
                                  <option value="'.$row['job_order_control_no'].'">'.$row['job_order_control_no'].'</option>
                          ';
                    }

                      ?>
                                   </select>                                      
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Start Date:</h6>
                                   <input type="date" class="form-control" name="start" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>End Date:</h6>
                                   <input type="date" class="form-control" name="finish" required>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Pre-Press Start Date:</h6>
                                   <input type="date" class="form-control" name="prs" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Pre-Press End Date:</h6>
                                   <input type="date" class="form-control" name="prf" required>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Press Start Date:</h6>
                                   <input type="date" class="form-control" name="pf" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Press End Date:</h6>
                                   <input type="date" class="form-control" name="pe" required>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Post-Press Start Date:</h6>
                                   <input type="date" class="form-control" name="ppf" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Post-Press End Date:</h6>
                                   <input type="date" class="form-control" name="ppend" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom: 0px;" class="">
                                  <h6>Machine Code</h6>
                   <select name="machine_code" class="form-control" >
                     <option selected="true" value="NULL" disabled>SELECT MACHINE CODE</option>
                      <?php
                    $sql_machine = "SELECT machine_name FROM machine";
                    $result_machine = mysqli_query($conn, $sql_machine);
                    while($row = mysqli_fetch_assoc($result_machine)){
                          echo '
                                  <option value="'.$row['machine_name'].'">'.$row['machine_name'].'</option>
                          ';
                    }

                      ?>
                                   </select>                                                     
                                    </div>
                          </div>
                     <div class="col col-lg-6">
                               <div style="margin-bottom: 0px;" class="">
                                  <h6>Machine Status</h6>
                       <select name="mstatus" class="form-control">
                                    <option selected="true" value="NULL" disabled>SELECT STATUS</option>
                                    <option value="Available">Available</option>
                                    <option value="In Use">In Use</option>
                                    <option value="Under Maintenance">Under Maintenance</option>
                                  </select>                                                    
                                    </div>
                          </div>
                         <div class="col col-lg-12">
                    <div style="margin-bottom: 25px;" class="">
                       <h6>Operator Name</h6>
                   <select name="o_name" class="form-control" >
                     <option selected="true" value="NULL" disabled>SELECT OPERATORS</option>
                      <?php
                    $sql_op = "SELECT * FROM operators";
                    $result_op = mysqli_query($conn, $sql_op);
                    while($row = mysqli_fetch_assoc($result_op)){
                          echo '
                                  <option value="'.$row['first_name'].'">'.$row['first_name'].'</option>
                          ';
                    }

                      ?>
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
//   $(document).ready(function(){
// $('#divi').show();
//   });
//   $(document).ready(function(){
//     $('#add_acc').change(function(){
//       if($(this).val()=="6"){
//         $('#divi').hide();
//       }else if($(this).val()=="4"){
//         $('#divi').hide();
//       }else if($(this).val()=="8"){
//         $('#divi').hide();
//       }else if($(this).val()=="9"){
//         $('#divi').hide();  
//       }
//       else {
//         $('#divi').show();
//       }
//     });
//   });
</script>    

   
<?php 
if(isset($_POST['addaccount'])){
//error_reporting(0);
 $jo_no = $_POST['jo_no'];
  $start = $_POST['start'];
  $finish = $_POST['finish'];
$prs = $_POST['prs'];
$prf = $_POST['prf'];
$pe = $_POST['pe'];
$pf = $_POST['pf'];
$ppf = $_POST['ppf'];
$ppend = $_POST['ppend'];
$machine_code = $_POST['machine_code'];
$mstatus = $_POST['mstatus'];
$o_name = $_POST['o_name'];
$status= "Pending";


//$uname = $_POST['uname'];
  if(empty($machine_code) || empty($o_name)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';

   } else {

$sqls = "SELECT * FROM `project_run_schedule` WHERE `job_order_control_no`='".$jo_no."'";
$resulta = $conn->query($sqls);
if($resulta->num_rows >= 1) {
    echo'<script>alert("Control No. already exist!");</script>';
} else {

  $stmt = $conn->prepare("INSERT INTO `project_run_schedule` (`job_order_control_no`, `start_date`, `end_date`, `pre-press_start_date`, `pre-press_end_date`, `press_start_date`, `press_end_date`, `post-press_start_date`, `post-press_end_date`, `machine_id`, `machine_status`, `operator_name`, `pending_status`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssssssssss', $jo_no,$start,$finish,$prs,$prf,$pf,$pe,$ppf,$ppend,$machine_code,$mstatus,$o_name,$status);
                              if($stmt->execute()){
                                echo '<script>alert("Successfully Added!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Add Project Run')";
                              mysqli_query($conn,$sql1);

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
// header("Location:../../index_admin");
}


?>