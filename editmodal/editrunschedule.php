  <?php  
    include_once '../config.php';
    include '../includes/link.php';
    include '../includes/header.php';
    session_start();
    $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-lg-12 col-lg-offset-2 col-lg-8">                    
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Update Project Run Schedule</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                     <form method="POST" onsubmit="return confirm('Are you sure?')">
                      <div class="row">
                <?php

                if(isset($_POST['view_run'])){
          $_SESSION['run_id'] = $_POST['run_id'];
                  $run_id = $_POST['run_id'];
                 // echo 'asdsada';
            $sql_run = "SELECT * FROM `project_run_schedule` WHERE `project_run_no`='".$_SESSION['run_id']."'";
                    $result_run = mysqli_query($conn, $sql_run);
                    while($row = mysqli_fetch_assoc($result_run)){
              if($row['pending_status'] != "1"){
                    echo '
              <div class="col col-lg-12">
                    <label>Job Order Control No.</label>
                        <select name="jo_no" class="form-control">
                      <option value="'.$row['job_order_control_no'].'">'.$row['job_order_control_no'].'</option>
                        ';
             $sql_jco = "SELECT job_order_control_no FROM job_order WHERE job_order_control_no !='".$row['job_order_control_no']."'";
                    $result_jco = mysqli_query($conn, $sql_jco);
                    while($rows = mysqli_fetch_assoc($result_jco)){
                          echo '
                    <option value="'.$rows['job_order_control_no'].'">'.$rows['job_order_control_no'].'</option>
                          ';
                    }
                  echo '
                  </select>
                  </div>
                  <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['start_date'].'" name="start" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['end_date'].'" name="finish" required>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Pre-Press Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['pre-press_start_date'].'" name="prs" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Pre-Press End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['pre-press_end_date'].'" name="prf" required>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Press Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['press_start_date'].'" name="pf" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Press End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['press_end_date'].'" name="pe" required>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Post-Press Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['post-press_start_date'].'" name="ppf" required>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Post-Press End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['post-press_end_date'].'" name="ppend" required>                                       
                                    </div>
                          </div>
       <div class="col col-lg-6">
               <h6>Machine Code</h6>
        <select name="machine_code" class="form-control" >
            <option value="'.$row['machine_id'].'">'.$row['machine_id'].'</option>
                      ';
          $sql_machine = "SELECT * FROM machine WHERE machine_name != '".$row['machine_id']."' ";
          $result = mysqli_query($conn,$sql_machine);
        while($rowss = mysqli_fetch_assoc($result)){
                    echo '
                  <option value="'.$rowss['machine_name'].'">'.$rowss['machine_name'].'</option>
                    ';
              }
          echo '
          </select>
          </div>
<div class="col col-lg-6">
               <h6>Operator Name</h6>
        <select name="o_name" class="form-control" >
        <option value="'.$row['operator_name'].'">'.$row['operator_name'].'</option>
        ';
$sql_op = "SELECT * FROM operators WHERE first_name != '".$row['operator_name']."' ";
          $result = mysqli_query($conn,$sql_op);
        while($rowsss = mysqli_fetch_assoc($result)){
                    echo '
                  <option value="'.$rowsss['first_name'].'">'.$rowsss['first_name'].'</option>
                    ';
              }


        echo '
        </select>
        </div>

           <div class="col col-lg-6">
                  <h6>Machine Status</h6>
          <select name="machine_status" class="form-control">
              ';
            if($row['machine_status'] == "Available")
            {
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
        <div class="col col-lg-6">
          <h6>Status</h6>
          <select name="status" class="form-control">
            ';
if($row['pending_status'] == "0" || $row['pending_status'] == "Pending"){
    echo '
          <option selected="true" value="Pending">Pending</option>
          <option value="Complete">Complete</option>
          '
          ;

}else{
 echo '
          <option value="Pending">Pending</option>
          <option selected="true" value="Complete">Complete</option>
          '
          ;

}

echo '
</select>
</div>

        <div class="col-lg-12 controls">
                <button name="updaterun" class="btn btn-warning btn-md" value="UPDATE" style="margin-top:25px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>  
                                    </div>
            ';

                }else {
                   echo '
            <div class="col col-lg-12">
                    <label>Job Order Control No.</label>
                        <select name="jo_no" class="form-control" disabled>
                      <option value="'.$row['job_order_control_no'].'">'.$row['job_order_control_no'].'</option>
                      </select>
                      </div>

          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['start_date'].'" name="start" disabled>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['end_date'].'" name="finish" disabled>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Pre-Press Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['pre-press_start_date'].'" name="prs" disabled>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Pre-Press End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['pre-press_end_date'].'" name="prf" disabled>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Press Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['press_start_date'].'" name="pf" disabled>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                  <h6>Press End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['press_end_date'].'" name="pe" disabled>                                       
                                    </div>
                          </div>
                           <div class="col col-lg-6">
                               <div style="margin-bottom:;" class="">
                                 <h6>Post-Press Start Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['post-press_start_date'].'" name="ppf" disabled>                                       
                                    </div>
                          </div>
                          <div class="col col-lg-6">
                               
                                  <h6>Post-Press End Date:</h6>
                                   <input type="date" class="form-control" value="'.$row['post-press_end_date'].'" name="ppend" disabled>                                       
                                    </div>
          <div class="col col-lg-6">
               <h6>Machine Code</h6>
        <select name="machine_code" class="form-control"disabled >
            <option value="'.$row['machine_id'].'">'.$row['machine_id'].'</option>
            </select>
            </div>
        <div class="col col-lg-6">
               <h6>Operator Name</h6>
        <select name="o_name" class="form-control" disabled>
        <option value="'.$row['operator_name'].'">'.$row['operator_name'].'</option>
        </select>
            </div>
   <div class="col col-lg-6">
                  <h6>Machine Status</h6>
          <select name="machine_status" class="form-control" disabled>
           <option selected="true" value="Pending">'.$row['machine_status'].'</option>
          </select>
            </div>

 <div class="col col-lg-6">
          <h6>Status</h6>
          <select name="status" class="form-control" disabled>
 <option selected="true" value="Pending">'.$row['pending_status'].'</option>
            </select>
            </div>

               <div class="col-lg-12 controls">
                <button name="updaterun" class="btn btn-warning btn-md" value="UPDATE" style="margin-top:25px;" disabled><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>  
                                    </div>

                         ';
                }

          
                }
              }

                ?>
                
                        </div>
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php 


if(isset($_POST['updaterun'])){
    // echo '<script>alert("'.$_SESSION['ticket_no'].'");</script>';
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
$machine_status = $_POST['machine_status'];

$o_name = $_POST['o_name'];
$status= $_POST['status'];

 
  $sql_jt = "UPDATE `project_run_schedule` SET `job_order_control_no`='$jo_no',`start_date`='$start',`end_date`='$finish',`pre-press_start_date`='$prs',`pre-press_end_date`='$prf',`press_start_date`='$pf',`press_end_date`='$pe',`post-press_start_date`='$ppf',`post-press_end_date`='$ppend',`machine_id`='$machine_code',`machine_status`='$machine_status',`operator_name`='$o_name',`pending_status`='$status' WHERE project_run_no = '".$_SESSION['run_id']."'";
                 mysqli_query($conn,$sql_jt);
                               
                                 echo '<script>alert("Successfully Updated!");</script>';
                                 
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Project Run Schedule')";
                              mysqli_query($conn,$sql1);
                   
                               echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                            
                    
                              


}


?>
<script>
 

</script>    