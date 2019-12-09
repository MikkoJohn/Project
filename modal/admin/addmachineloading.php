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

                <div style="padding-top:0px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="" role="form">         
                             <div style="margin-top:0px" class="col-sm-12">
                                  <h6>Machine Name:</h6>
                                  <select class="form-control" name="mname" required>
                                    <option>SELECT MACHINE NAME</option>
                          <?php
                    $sql_machine="SELECT machine_name FROM machine";
                    $result_machine = mysqli_query($conn, $sql_machine);
                    while($row_machine = mysqli_fetch_assoc($result_machine)){
                      echo '
                            <option value="'.$row_machine['machine_name'].'">'.$row_machine['machine_name'].'</option>
                      ';
                    }

                          ?>
                          </select>
                                   <!--  <input type="text"  placeholder="Machine Name" required> -->
                                  </div>
                            <div style="margin-top:0px" class="col-sm-12">
                                  <h6>Operator Name:</h6>
                          <select class="form-control" name="o_name" required>
                            <option value="NULL" disabled selected>SELECT OPERATOR NAME</option>
              <?php
              $sql_o = "SELECT * FROM operators";
              $res = mysqli_query($conn, $sql_o);
              while($row = mysqli_fetch_assoc($res)){
                echo '
                    <option value="'.$row['first_name'].'">'.$row['first_name'].'</option>
                ';
              }
              ?>
                          </select>
                                  </div>
                             <div style="margin-top:15px" class="col col-sm-12">
                              <h6>Job Order Control No:</h6>
                                  <select name="jo" class="form-control" required>
                                    <option selected="true" value="NULL" disabled>SELECT JOB ORDER CONTROL NO</option>
                 <?php
              $sql_jo = "SELECT * FROM job_order";
              $resj = mysqli_query($conn, $sql_jo);
              while($rowj = mysqli_fetch_assoc($resj)){
                echo '
                    <option value="'.$rowj['job_order_control_no'].'">'.$rowj['job_order_control_no'].'</option>
                ';
              }
              ?>          
                                  </select>     

                                   <!--  <input type="text" class="form-control" name="mdivision" placeholder="Machine Division"> -->
                                  </div>

                            <div style="margin-top:10px" class="col col-sm-12">
                                <h6>Project Name:</h6>
                                <select class="form-control" name="proj_name" placeholder="" required>
                                <option value="NULL" selected="true" disabled>SELECT PROJECT NAME</option>
                              <?php
                    $sql_jono = "SELECT proj_name FROM job_ticket";
                    $res_jono = mysqli_query($conn,$sql_jono);
                    while($rows = mysqli_fetch_assoc($res_jono)){
                      echo '
                              <option value="'.$rows['proj_name'].'" >'.$rows['proj_name'].'</option>
                      ';
                    }

                              ?>
                              </select>

                              <!-- <input type="number" class="form-control" name="maxspeed" placeholder="Maximum Speed" required> -->
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
                            <div class="col-lg-12 controls" >
                                      <input type="submit" name="addmachine" class="btn btn-success"style="margin-top: 10px;">
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
  $o_name = $_POST['o_name'];
  $jo = $_POST['jo'];
  $proj_name = $_POST['proj_name'];

  $mstatus = "Pending";
  if(empty($mname) || empty($o_name) || empty($jo) || empty($proj_name)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";

  $stmt = $conn->prepare("INSERT INTO `machine_loading`(`machine_name`, `operator_name`, `job_order_control_no`, `proj_name`, `status`) VALUES (?,?,?,?,?)");
                              $stmt->bind_param('sssss', $mname,$o_name,$jo,$proj_name,$mstatus);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                               echo '<script>alert("Successfully Added!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Machine Loading')";
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