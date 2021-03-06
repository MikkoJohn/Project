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
          if(isset($_POST['view_machine'])){
                      $_SESSION['machine_id'] = $_POST['machine_id'];
                      $machine_id = $_POST['machine_id'];
                        $sql = 'SELECT * FROM `machine` WHERE `machine_id` = '.$_SESSION['machine_id'].'';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)){
                    if($row['machine_status'] != "Disabled"){
                         echo ' 
                            <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">

                         <div style="margin-top:0px" class="form-group col-md-6">
                            <label>Machine Name:</label>
                                    <input type="text" class="form-control" name="mname" value="'.$row['machine_name'].'" placeholder="Machine Name">
                                  </div>
                             <div style="margin-top:0px" class="form-group col-md-6">
                             <label>Machine Division:</label>
                              <select name="mdivision" class="form-control" value="'.$row['machine_division'].'">
                             ';
                             if($row['machine_division'] == "Pre-Press"){
                                  echo '
                                        <option selected="true" value="Pre-Press">Pre-Press</option>
                                        <option value="Press">Press</option>
                                        <option value="Post-Press">Post-Press</option>
                                  ';
                             }else if($row['machine_division'] == "Press"){
                                  echo '
                                        <option value="Pre-Press">Pre-Press</option>
                                        <option selected="true" value="Press">Press</option>
                                        <option value="Post-Press">Post-Press</option>
                                  ';
                             }else if($row['machine_division'] == "Post-Press"){
                                  echo '
                                        <option value="Pre-Press">Pre-Press</option>
                                        <option value="Press">Press</option>
                                        <option selected="true" value="Post-Press">Post-Press</option>
                                  ';
                             }

                            echo '
                              </select>
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                             <label>Maximum Speed:</label>
                                    <input type="text" class="form-control" name="maxspeed" placeholder="Maximum Speed" value="'.$row['max_speed'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                            <label>Minimum Speed:</label>
                                    <input type="text" class="form-control" name="minspeed" placeholder="Minimum Speed" value="'.$row['min_speed'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                            <label>Machine Maximum Size:</label>
                                    <input type="text" class="form-control" name="mmaxsize" placeholder="Machine Maximum Size" value="'.$row['maximum_size'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                            <label>Machine Minimum Size</label>
                                    <input type="text" class="form-control" name="mminsize" placeholder="Machine Minimum Size" value="'.$row['minimum_size'].'">
                                  </div>
                             <div style="margin-top:10px" class="form-group col-md-6">
                             <label>Maximum Printing Area</label>
                                    <input  type="text" class="form-control" name="mparea" placeholder="Maximum Printing area" value="'.$row['maximum_printing_area'].'">
                                    </div>
                      <div style="margin-top:10px" class="form-group col-md-6">
                       <label>Operator</label>
                      <select name="o_name" class="form-control">
                        <option value="'.$row['operator_name'].'">'.$row['operator_name'].'</option>
                                  ';
            $sql_ope = "SELECT * FROM operators WHERE first_name != '".$row['operator_name']."'";
            $resu = mysqli_query($conn,$sql_ope);
            while($rowo = mysqli_fetch_assoc($resu)){
              echo '
          <option value="'.$rowo['first_name'].'">'.$rowo['first_name'].'</option>
              ';
            }

          echo '
          </select>
          </div>
                             <div style="margin-top:10px" class="form-group col-md-12">
                             <label>Status:</label>
                                <select class="form-control" name="mstatus" value="'.$row['machine_status'].'">
                                ';
                              if($row['machine_status'] == "Available"){
                                   echo '
                                        <option selected="true" value="Available">Available</option>
                                        <option value="In Use">In Use</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }else if($row['machine_status'] == "In Use"){
                                   echo '
                                        <option value="Available">Available</option>
                                        <option selected="true" value="In Use">In Use</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }else if($row['machine_status'] == "Under Maintenance"){
                                   echo '
                                        <option value="Available">Available</option>
                                        <option value="In Use">In Use</option>
                                        <option selected="true" value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }else{
                                   echo '
                                        <option value="Available">Available</option>
                                        <option value="In Use">In Use</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }

                            echo '

                                    </select>
                                  </div>
                                   <button name="updatemachine" class="btn btn-warning btn-md" value="UPDATE" id="" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>
                                </div>
                            </form>   
                          ';

}
                        else {
                              echo ' 
                            <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">

                         <div style="margin-top:0px" class="form-group col-md-6">
                         <label>Machine Name</label>
                                    <input type="text" class="form-control" name="mname" value="'.$row['machine_name'].'" placeholder="Machine Name" disabled>
                                  </div>
                             <div style="margin-top:0px" class="form-group col-md-6">
                             <label>Machine Division</label>
                              <select name="mdivision" class="form-control" value="'.$row['machine_division'].'" disabled>
                             ';
                             if($row['machine_division'] == "Pre-Press"){
                                  echo '
                                        <option selected="true" value="Pre-Press">Pre-Press</option>
                                        <option value="Press">Press</option>
                                        <option value="Post-Press">Post-Press</option>
                                  ';
                             }else if($row['machine_division'] == "Press"){
                                  echo '
                                        <option value="Pre-Press">Pre-Press</option>
                                        <option selected="true" value="Press">Press</option>
                                        <option value="Post-Press">Post-Press</option>
                                  ';
                             }else if($row['machine_division'] == "Post-Press"){
                                  echo '
                                        <option value="Pre-Press">Pre-Press</option>
                                        <option value="Press">Press</option>
                                        <option selected="true" value="Post-Press">Post-Press</option>
                                  ';
                             }

                            echo '
                              </select>
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                            <label>Maximum Speed</label>
                                    <input type="text" class="form-control" name="maxspeed" placeholder="Maximum Speed" value="'.$row['max_speed'].'" disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                            <label>Minimum Speed</label>
                                    <input type="text" class="form-control" name="minspeed" placeholder="Minimum Speed" value="'.$row['min_speed'].'" disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                            <label>Machine Maximum Size</label>
                                    <input type="text" class="form-control" name="mmaxsize" placeholder="Machine Maximum Size" value="'.$row['maximum_size'].'" disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                            <label>Machine Minimum Size</label>
                                    <input type="text" class="form-control" name="mminsize" placeholder="Machine Minimum Size" value="'.$row['minimum_size'].'" disabled>
                                  </div>
                             <div style="margin-top:10px" class="form-group col-md-6">
                             <label>Maximum Printing Area</label>
                                    <input  type="text" class="form-control" name="mparea" placeholder="Maximum Printing area" value="'.$row['maximum_printing_area'].'" disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group col-md-6">
                             <label>Operator Name</label>
                  <input  type="text" class="form-control" value="'.$row['operator_name'].'" disabled>
                                  </div>

                             <div style="margin-top:10px" class="form-group col-md-12">
                                <select class="form-control" name="mstatus" value="'.$row['machine_status'].'" disabled>
                                ';
                              if($row['machine_status'] == "Available"){
                                   echo '
                                        <option selected="true" value="Available">Available</option>
                                        <option value="In Use">In Use</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }else if($row['machine_status'] == "In Use"){
                                   echo '
                                        <option value="Available">Available</option>
                                        <option selected="true" value="In Use">In Use</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }else if($row['machine_status'] == "Under Maintenance"){
                                   echo '
                                        <option value="Available">Available</option>
                                        <option value="In Use">In Use</option>
                                        <option selected="true" value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }

                            echo '

                                    </select>
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
  $machine_id = $_POST['machine_id'];
  $mname = $_POST['mname'];
  $mdivision = $_POST['mdivision'];
  $maxspeed = $_POST['maxspeed'];
  $minspeed = $_POST['minspeed'];
  $mmaxsize = $_POST['mmaxsize'];
  $mminsize = $_POST['mminsize'];
  $mparea = $_POST['mparea'];
  $o_name = $_POST['o_name'];
  $mstatus = $_POST['mstatus'];
  $now = date("Y-m-d H:i:s");
  if(empty($mname) || empty($mdivision) || empty($maxspeed) || empty($minspeed) || empty($mmaxsize) || empty($mminsize) || empty($mparea) || empty($mstatus)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";
$stmt = $conn->prepare("UPDATE `machine` SET `machine_name`=?,`machine_division`=?,`maximum_size`=?,`minimum_size`=?,`maximum_printing_area`=?,`max_speed`=?,`min_speed`=?,`machine_status`=?,`operator_name`=? WHERE `machine_id` = ?");
  
                              $stmt->bind_param('ssssssssss', $mname,$mdivision,$mmaxsize,$mminsize,$mparea,$maxspeed,$minspeed,$mstatus,$o_name,$machine_id);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Updated!","", "success");</script>';
                                //header("Location: ../index_admin"); 
                              //  echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                                echo '<script>alert("Successfully Updated!");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Machine')";
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