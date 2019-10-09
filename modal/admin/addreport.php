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
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Report</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-4">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="prod_unit" placeholder="Producing Unit">
                                  </div>
                              </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="operator_unit" placeholder="Operator Unit">
                                  </div>
                                </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="operator_name" placeholder="Operator Name">
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Report Date:</h5>
                                  <input type="date" class="form-control" name="report_date">
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="job_title" placeholder="Job Title">
                                  </div>
                            </div>
                             <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="type_job" placeholder="Type of Job">
                                  </div>
                            </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="no_signature" placeholder="No. of Signatures">
                                  </div>
                            </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="type_activity" placeholder="Type of Activity">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <h5>Time Started:</h5>
                                    <input type="time" class="form-control" name="time_started">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <h5>Time Finished:</h5>
                                    <input type="time" class="form-control" name="time_finished">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="status" placeholder="Status">
                                  </div>
                            </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="spoilage" placeholder="Spoilage">
                                  </div>
                            </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="good_copies" placeholder="Good Copies">
                                  </div>
                            </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addreport" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php 
if(isset($_POST['addreport'])){
error_reporting(0);
  $prod_unit = $_POST['prod_unit'];
  $operator_unit = $_POST['operator_unit'];
  $operator_name = $_POST['operator_name'];
  $report_date = $_POST['report_date'];
  $job_title = $_POST['job_title'];
  $quantity = $_POST['quantity'];
  $type_job = $_POST['type_job'];
  $no_signature = $_POST['no_signature'];
  $type_activity = $_POST['type_activity'];
  $time_started = $_POST['time_started'];
  $time_finished = $_POST['time_finished'];
  $status = $_POST['status'];
  $spoilage = $_POST['spoilage'];
  $good_copies = $_POST['good_copies'];
  $remarks = $_POST['remarks'];

  if(empty($prod_unit) || empty($operator_unit) || empty($operator_name) || empty($report_date) || empty($job_title) || empty($quantity) || empty($type_job) || empty($no_signature) || empty($type_activity) || empty($time_started) || empty($time_finished) || empty($status) || empty($spoilage) || empty($good_copies) || empty($remarks))
{ 

  echo "<script>alert('error');</script>";

    echo '<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
  $stmt = $conn->prepare("INSERT INTO `report`(`prod_unit`, `operator_unit`, `operator_name`, `report_date`, `job_title`, `report_quantity`, `type_job`, `no_signature`, `type_activity`, `time_started`, `time_finished`, `report_status`, `spoilage`, `good_copies`, `remarks`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssssssssssss', $prod_unit,$operator_unit,$operator_name,$report_date,$job_title,$quantity,$type_job,$no_signature,$type_activity,$time_started,$time_finished,$status,$spoilage,$good_copies,$remarks);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Added!","", "success");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Report')";
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