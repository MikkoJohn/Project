  <?php  
    include_once '../config.php';
    include '../includes/link.php';
    session_start();
    $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
                   ?>
   
   <a href="../index_admin" class="btn btn-primary" style="margin:2%">BACK</a>

   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View/Edit Work Oder</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  <?php
                    if(isset($_POST['view_wo'])){
                      $_SESSION['wo_id'] = $_POST['wo_id'];
                      $sql1 = 'SELECT * FROM work_order where work_order_no ='.$_SESSION['wo_id'].' ';
                      $result1=mysqli_query($conn,$sql1);
                      while($row=mysqli_fetch_assoc($result1)){
                    if($row['status'] != 1){
                        echo '
                       <form method="POST" class="form-horizontal" role="form">         
                             <div style="margin-top:0px" class="form-group">
                             <label>Project Name:</label>
                              <select class="form-control" name="j_controlno" required>
                              <option value="'.$row['proj_name'].'" selected="true">'.$row['proj_name'].'</option>
                      ';

                          
                    $sql_jono = "SELECT proj_name FROM job_ticket WHERE proj_name != '".$row['proj_name']."'";
                    $res_jono = mysqli_query($conn,$sql_jono);
                    while($rows = mysqli_fetch_assoc($res_jono)){
                      echo '
                              <option value="'.$rows['proj_name'].'" >'.$rows['proj_name'].'</option>
                      ';
                    }


                      echo '
                      </select>
                                   
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                <label>Job Description:</label>
                                    <input type="text" class="form-control" name="j_desc" value="'.$row['job_desc'].'" placeholder="Job Description"required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                               <label>Supplier Name:</label>
                              <select class="form-control" name="s_name" required>
                              <option selected="true" value="'.$row['s_name'].'">'.$row['s_name'].'</option>
                              
                              ';
                              $sql3 = "SELECT supplier_name FROM supplier_info WHERE supplier_name !='".$row['s_name']."' AND form_of_business = 'Outsource'";
                              $result3 = mysqli_query($conn,$sql3);
                              while($rows = mysqli_fetch_assoc($result3)){
                                echo '
                                  <option value="'.$rows['supplier_name'].'">'.$rows['supplier_name'].'</option>
                                ';
                              }

                              echo ' </select>
                                   
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                               <label>Instruction:</label>
                                    <input type="text" class="form-control" value="'.$row['instruction'].'" name="instruction" placeholder="Instruction"required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                               <label>Status:</label>
                                <select class="form-control" name="status" required>
                                  ';
                            if($row['status'] =="Pending"){
                              echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option value="Disapproved">Disapproved</option>
                              ';
                            }else if($row['status'] =="Approved"){
                              echo '
                                  <option value="Pending">Pending</option>
                                  <option selected="true" value="Approved">Approved</option>
                                  <option value="Disapproved">Disapproved</option>
                              ';
                            }else if($row['status'] =="Disapproved"){
                              echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option selected="true" value="Disapproved">Disapproved</option>
                              ';
                            }else if($row['status'] =="0"){
                               echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option value="Disapproved">Disapproved</option>
                              ';
                            }
                              echo '
                                </select>
                                   
                                  </div>
                            
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="updateworkorder" class="btn btn-success">
                                    </div>
                                </div>
                            </form>    
                        ';
                      }else {
                         echo '
                       <form method="POST" class="form-horizontal" role="form">         
                             <div style="margin-top:0px" class="form-group">
                                <label>Project Name:</label>
                                  <input type="text" class="form-control" value="'.$row['proj_name'].'"  placeholder="Job Order Control No." disabled>
                             <div style="margin-top:10px" class="form-group">
                                <label>Job Description:</label>
                                    <input type="text" class="form-control" value="'.$row['job_desc'].'" placeholder="Job Description" disabled>
                                  </div>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                               <label>Supplier Name:</label>
                              <select class="form-control" valaue="'.$row['s_name'].'"  name="s_name" disabled>
                              <option selected="true" value="'.$row['s_name'].'">'.$row['s_name'].'</option>
                              
                              ';
                              $sql5 = "SELECT supplier_name FROM supplier_info WHERE supplier_name !='".$row['s_name']."'";
                              $result5 = mysqli_query($conn,$sql5);
                              while($rowss = mysqli_fetch_assoc($result5)){
                                echo '
                                  <option value="'.$rowss['supplier_name'].'">'.$rowss['supplier_name'].'</option>
                                ';
                              }

                              echo ' </select>
                                   
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <label>Instruction:</label>
                                    <input type="text" class="form-control" value="'.$row['instruction'].'" name="instruction" placeholder="Instruction" disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                               <label>Status:</label>
                                <select class="form-control" name="status" disabled>
                                  ';
                            if($row['status'] =="Pending"){
                              echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option value="Disapproved">Disapproved</option>
                              ';
                            }else if($row['status'] =="Approved"){
                              echo '
                                  <option value="Pending">Pending</option>
                                  <option selected="true" value="Approved">Approved</option>
                                  <option value="Disapproved">Disapproved</option>
                              ';
                            }else if($row['status'] =="Disapproved"){
                              echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option selected="true" value="Disapproved">Disapproved</option>
                              ';
                            }else if($row['status'] =="0"){
                               echo '
                                  <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option value="Disapproved">Disapproved</option>
                              ';
                            }else if($row['status'] =="1"){
                               echo '
                                  <option selected="true">Disabled</option>
                              ';
                            }
                              echo '
                                </select>
                                   
                                  </div>
                            
                            
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="updateworkorder" class="btn btn-success" disabled>
                                    </div>
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
           
   
<?php if(isset($_POST['updateworkorder'])){
//error_reporting(0);
  $j_controlno = $_POST['j_controlno'];
  $j_desc = $_POST['j_desc'];
  $s_name = $_POST['s_name'];
  $instruction = $_POST['instruction'];
  $status = $_POST['status'];
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];

  $stmt = "UPDATE `work_order` SET `proj_name`='$j_controlno',`job_desc`='$j_desc',`s_name`='$s_name',`instruction`='$instruction',`status`='$status' WHERE work_order_no='".$_SESSION['wo_id']."'";
       mysqli_query($conn,$stmt);                      
                          
          echo '<script>alert("Successfully Updated!");</script>';
          $sqla="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Work Order')";
          mysqli_query($conn,$sqla); 
    echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                              
                            
                         
                            
                              



}


?>