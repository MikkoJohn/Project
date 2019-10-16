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
                        $sql = 'SELECT `machine_id`,`machine_name`, `machine_division`, `maximum_size`, `minimum_size`, `maximum_printing_area`, `max_speed`, `min_speed`, `machine_status` FROM `machine` WHERE `machine_id` = '.$_SESSION['machine_id'].'';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)){

                         echo ' 
                            <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">

                         <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="mname" value="'.$row['machine_name'].'" placeholder="Machine Name">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
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
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="maxspeed" placeholder="Maximum Speed" value="'.$row['max_speed'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="minspeed" placeholder="Minimum Speed" value="'.$row['min_speed'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="mmaxsize" placeholder="Machine Maximum Size" value="'.$row['maximum_size'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="mminsize" placeholder="Machine Minimum Size" value="'.$row['minimum_size'].'">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input  type="text" class="form-control" name="mparea" placeholder="Maximum Printing area" value="'.$row['maximum_printing_area'].'">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
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
                              }

                            echo '

                                    </select>
                                  </div>
                          ';

}


                        ?> 
                            <button name="updatemachine" class="btn btn-warning btn-md" value="UPDATE" id="" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>
                                </div>
                            </form>   
                          <?php 
                            }else {
                              // $_SESSION['machine_id'] = $_POST['machine_id'];
                   //   $machine_id = $_POST['machine_id'];
                        $sql = 'SELECT `machine_id`,`machine_name`, `machine_division`, `maximum_size`, `minimum_size`, `maximum_printing_area`, `max_speed`, `min_speed`, `machine_status` FROM `machine` WHERE `machine_id` = '.$_SESSION['machine_id'].'';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)){

                         echo ' 
                            <input type="hidden" name="machine_id" value="'.$row['machine_id'].'">

                         <div style="margin-top:0px" class="form-group">
                                    <input type="text" class="form-control" name="mname" value="'.$row['machine_name'].'" placeholder="Machine Name">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
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
                             }else{
                                echo '
                                        <option selected="true" value="NULL" disabled>SELECT MACHINE STATUS</option>
                                        <option value="Available">Available</option>
                                        <option value="In Use">In Use</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }

                            echo '
                              </select>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="maxspeed" placeholder="Maximum Speed" value="'.$row['max_speed'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="minspeed" placeholder="Minimum Speed" value="'.$row['min_speed'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="mmaxsize" placeholder="Machine Maximum Size" value="'.$row['maximum_size'].'">
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="mminsize" placeholder="Machine Minimum Size" value="'.$row['minimum_size'].'">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input  type="text" class="form-control" name="mparea" placeholder="Maximum Printing area" value="'.$row['maximum_printing_area'].'">
                                  </div>
                             <div style="margin-top:10px" class="form-group">
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
                                        <option selected="true" value="NULL" disabled>SELECT MACHINE STATUS</option>
                                        <option value="Available">Available</option>
                                        <option value="In Use">In Use</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                  ';
                              }

                            echo '

                                    </select>
                                  </div>
                          ';



}
?>
 <div class="col col-sm-12">
                   <div class="form-group"> 
 <button name="updatemachine" class="btn btn-warning btn-md" value="UPDATE"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>    
                                </div>
                            </form>   
<?php

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
  $mstatus = $_POST['mstatus'];
  $now = date("Y-m-d H:i:s");
  if(empty($mname) || empty($mdivision) || empty($maxspeed) || empty($minspeed) || empty($mmaxsize) || empty($mminsize) || empty($mparea) || empty($mstatus)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";
$stmt = $conn->prepare("UPDATE `machine` SET `machine_name`=?,`machine_division`=?,`maximum_size`=?,`minimum_size`=?,`maximum_printing_area`=?,`max_speed`=?,`min_speed`=?,`machine_status`=? WHERE `machine_id` = ?");
  
                              $stmt->bind_param('sssssssss', $mname,$mdivision,$mmaxsize,$mminsize,$mparea,$maxspeed,$minspeed,$mstatus,$machine_id);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Updated!","", "success");</script>';
                                //header("Location: ../index_admin"); 
                              //  echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Machine')";
                              mysqli_query($conn,$sql1);
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>