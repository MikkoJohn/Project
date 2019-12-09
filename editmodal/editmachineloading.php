  <?php  
    include_once '../config.php';
    include '../includes/link.php';
    session_start();
   $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>
    <!-- OperatorModal -->
   <!--  --> 
   <a href="../index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View/Edit Machine</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" action="../index_admin" role="form">
                    <?php
          if(isset($_POST['view_ml'])){
                      $_SESSION['ml_id'] = $_POST['ml_id'];
                      // $machine_id = $_POST['machine_id'];
                        $sql = 'SELECT * FROM `machine_loading` WHERE `machine_id` = '.$_SESSION['ml_id'].'';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)){
                    if($row['status'] != "1"){
                         echo ' 
                           
                                 <div style="margin-top:0px" class="col-sm-12">
                                  <h6>Machine Name:</h6>
                                  <select class="form-control" name="mname" required>
                                    <option value="'.$row['machine_name'].'">'.$row['machine_name'].'</option>';
                        
                    $sql_machine="SELECT machine_name FROM machine WHERE machine_name != '".$row['machine_name']."'";
                    $result_machine = mysqli_query($conn, $sql_machine);
                    while($row_machine = mysqli_fetch_assoc($result_machine)){
                      echo '
                            <option value="'.$row_machine['machine_name'].'">'.$row_machine['machine_name'].'</option>
                      ';
                    }

                        echo '
                          </select>

                                  </div>
                            <div style="margin-top:0px" class="col-sm-12">
                                  <h6>Operator Name:</h6>
                          <select class="form-control" name="o_name" required>
                            <option value="'.$row['operator_name'].'">'.$row['operator_name'].'</option>
                            ';
            
              $sql_o = "SELECT * FROM operators WHERE first_name != '".$row['operator_name']."'";
              $res = mysqli_query($conn, $sql_o);
              while($rows = mysqli_fetch_assoc($res)){
                echo '
                    <option value="'.$rows['first_name'].'">'.$rows['first_name'].'</option>
                ';
              }
     echo '
                          </select>
                                  </div>
                             <div style="margin-top:15px" class="col col-sm-12">
                              <h6>Job Order Control No:</h6>
                                  <select name="jo" class="form-control" required>
                                    <option selected="true" value="'.$row['job_order_control_no'].'" >'.$row['job_order_control_no'].'</option>
         ';

              $sql_jo = "SELECT * FROM job_order WHERE job_order_control_no != '".$row['job_order_control_no']."'";
              $resj = mysqli_query($conn, $sql_jo);
              while($rowj = mysqli_fetch_assoc($resj)){
                echo '
                    <option value="'.$rowj['job_order_control_no'].'">'.$rowj['job_order_control_no'].'</option>
                ';
              }
    echo '    
                                  </select>     

                                  
                                  </div>

                            <div style="margin-top:10px" class="col col-sm-12">
                                <h6>Project Name:</h6>
                                <select class="form-control" name="proj_name" placeholder="" required>
                                <option value="'.$row['proj_name'].'" selected="true">'.$row['proj_name'].'</option>';

                    $sql_jono = "SELECT proj_name FROM job_ticket WHERE proj_name != '".$row['proj_name']."'";
                    $res_jono = mysqli_query($conn,$sql_jono);
                    while($rowsj = mysqli_fetch_assoc($res_jono)){
                      echo '
                              <option value="'.$rowsj['proj_name'].'" >'.$rowsj['proj_name'].'</option>
                      ';
                    }

                    echo '
                              </select>
                            </div>
                   <div style="margin-top:10px" class="col col-sm-12">
                                <h6>Status:</h6>
                                <select class="form-control" name="status" placeholder="" required>
                      ';


                      if($row['status'] == "Pending"){
                        echo '
                                    <option value="Pending" selected="true">Pending</option>
                                 <option value="Complete" >Complete</option>
                        ';
                      }else if($row['status'] == "Complete"){
                        echo '
                                    <option value="Pending">Pending</option>
                                 <option value="Complete" selected="true">Complete</option>
                        ';
                      }else {
                        echo '
                         <option value="NULL" disabled selected>SELECT STATUS</option>
                                    <option value="Pending">Pending</option>
                                 <option value="Complete" >Complete</option>
                        ';
                      }
                            

                

                    echo '
                              </select>
                            </div>

                                   <button name="updatemachine" style="margin-top:20px;" class="btn btn-warning btn-md" value="UPDATE" id="" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>
                                </div>
                            </form>   
                          ';

}
                        else {
                              echo ' 
                            <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">

                         <div style="margin-top:0px" class="form-group col-md-12">
                         <label>Machine Name</label>
                                    <input type="text" class="form-control" name="mname" value="'.$row['machine_name'].'" placeholder="Machine Name" disabled>
                                  </div>
                             <div style="margin-top:0px" class="form-group col-md-12">
                             <label>Operator Name:</label>
                              <input type="text" name="mdivision" class="form-control" value="'.$row['operator_name'].'" disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-12">
                            <label>Job Control No</label>
                                    <input type="text" class="form-control" name="maxspeed" placeholder="Maximum Speed" value="'.$row['job_order_control_no'].'" disabled>
                                  </div>
                            <div style="margin-top:20px" class="form-group col-md-12">
                            <label>Project Name</label>
                                    <input type="text" class="form-control" name="minspeed" placeholder="Minimum Speed" value="'.$row['proj_name'].'" disabled>
                                  </div>
                                    <button name="updatemachine" class="btn btn-warning btn-md" value="UPDATE" id="" disabled><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>
                                </div>
                            </form>  
                          ';


                          
                            }
                          }
                        }
?>

                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php 
if(isset($_POST['updatemachine'])){
//error_reporting(0);
 $mname = $_POST['mname'];
  $o_name = $_POST['o_name'];
  $jo = $_POST['jo'];
  $proj_name = $_POST['proj_name'];
  $status = $_POST['status'];
  $now = date("Y-m-d H:i:s");
  if(empty($mname) || empty($o_name) || empty($jo) || empty($proj_name) ){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";
$stmt = $conn->prepare("UPDATE `machine_loading` SET `machine_name`=?,`operator_name`=?,`job_order_control_no`=?,`proj_name`=?,`status`=? WHERE `machine_id` = ?");
  
                              $stmt->bind_param('ssssss', $mname,$o_name,$jo,$proj_name,$status, $_SESSION['ml_id']);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Updated!","", "success");</script>';
                                //header("Location: ../index_admin"); 
                              //  echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                                echo '<script>alert("Successfully Updated!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Machine Loading')";
                              mysqli_query($conn,$sql1);
                             // header("Location: ../index_admin");
                               echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>