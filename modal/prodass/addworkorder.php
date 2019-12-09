  <?php  
  session_start();
    include_once '../../config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>
    <!-- OperatorModal -->
   <!--  --> 
   <a href="../../index_prodass" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Add Work Order</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                             <div style="margin-top:0px" class="form-group">
                      <label>Project Name:</label>
                        <select class="form-control" name="j_controlno" required>
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
                                    <!-- <input type="text" class="form-control" name="j_controlno" placeholder="Job Order Control No." required> -->
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                            <label>Job Description:</label>
                                    <input type="text" class="form-control" name="j_desc" placeholder="Job Description"required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                              <label>Supplier Info:</label>
                      <select class="form-control" name="s_name" required>
                  <?php
              $sql_s = "SELECT * FROM supplier_info";
              $res = mysqli_query($conn,$sql_s);
              while($row_s = mysqli_fetch_assoc($res)){
                echo '
    <option value="'.$row_s['supplier_name'].'">'.$row_s['supplier_name'].'</option>
                ';
              }

                  ?>
                        </select>
                                    <!-- <input type="text" class="form-control" name="s_name" placeholder="Supplier Name"required> -->
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                            <label>Instruction:</label>
                                    <input type="text" class="form-control" name="instruction" placeholder="Instruction"required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                               <!--  <select class="form-control" required>
                                  <option selected="true" value="NULL" disabled="disabled" name="status">SELECT STATUS</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option value="Disapproved">Disapproved</option>
                                </select>
                                    -->
                                  </div>
                            
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addworkorder" class="btn btn-success">
                                    </div>
                                </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addworkorder'])){

  $j_controlno = $_POST['j_controlno'];
  $j_desc = $_POST['j_desc'];
  $s_name = $_POST['s_name'];
  $instruction = $_POST['instruction'];
  $status = "Pending";
  $now = date("Y-m-d");
  if(empty($j_controlno) || empty($j_desc) || empty($s_name) || empty($instruction) || empty($status)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  //$sql= "INSERT INTO tbl_useraccounts ('uname','pass','user_type') VALUES ()";

  $stmt = $conn->prepare("INSERT INTO `work_order`(`proj_name`, `job_desc`,`s_name`, `instruction`,`date_created`, `status`) VALUES (?,?,?,?,?,?)");
                              $stmt->bind_param('ssssss', $j_controlno,$j_desc,$s_name,$instruction,$now,$status);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                               echo '<script>alert("Successfully Added!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Work Order')";
                              mysqli_query($conn,$sql1);
                              //header("Location: ../../index_admin");
                              echo "<script type='text/javascript'>location.href = '../../index_prodass';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}

}


?>