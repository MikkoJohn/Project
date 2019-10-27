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
                                    <input type="text" class="form-control" name="j_controlno" placeholder="Job Order Control No." required>
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="j_desc" placeholder="Job Description"required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                              <select class="form-control" name="s_name" required>
                              <option selected="true" value="'.$row['s_name'].'">'.$row['s_name'].'</option>
                              
                              ';
                              $sql3 = "SELECT supplier_name FROM supplier_info WHERE supplier_name !='".$row['s_name']."'";
                              $result3 = mysqli_query($conn,$sql3);
                              while($row = mysqli_fetch_assoc($result3)){
                                echo '
                                  <option value="'.$row['supplier_name'].'">'.$row['supplier_name'].'</option>
                                ';
                              }

                              echo ' </select>
                                   
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="instruction" placeholder="Instruction"required>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                <select class="form-control" required>
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
                                    <input type="text" class="form-control" name="j_controlno" placeholder="Job Order Control No." disabled>
                                  </div>
                             <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="j_desc" placeholder="Job Description"disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                              <select class="form-control" name="s_name" disabled>
                              <option selected="true" value="'.$row['s_name'].'">'.$row['s_name'].'</option>
                              
                              ';
                              $sql3 = "SELECT supplier_name FROM supplier_info WHERE supplier_name !='".$row['s_name']."'";
                              $result3 = mysqli_query($conn,$sql3);
                              while($row = mysqli_fetch_assoc($result3)){
                                echo '
                                  <option value="'.$row['supplier_name'].'">'.$row['supplier_name'].'</option>
                                ';
                              }

                              echo ' </select>
                                   
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                    <input type="text" class="form-control" name="instruction" placeholder="Instruction"disabled>
                                  </div>
                            <div style="margin-top:10px" class="form-group">
                                <select class="form-control" disabled>
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
           
   
<?php if(isset($_POST['updateaccount'])){
//error_reporting(0);
  $j_controlno = $_POST['j_controlno'];
  $j_desc = $_POST['j_desc'];
  $s_name = $_POST['s_name'];
  $instruction = $_POST['instruction'];
  $status = $_POST['status'];
  //$now = date("Y-m-d");

//$uname = $_POST['uname'];
  if(empty($uname) || empty($pass)  || empty($fname) || empty($lname)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';

   } else {

  $stmt = $conn->prepare("UPDATE `work_order` SET `job_controlno`=?,`job_desc`=?,`s_name`=?,`instruction`=?,`status`=? WHERE work_order_no=?");
                              $stmt->bind_param('ssssss',$j_controlno,$j_desc,$s_name,$instruction,$status,$_SESSION['wo_id']);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Updated!","","success");</script>';
                                $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Work Order')";
                              mysqli_query($conn,$sql1);
                             // header("Location:../index_admin");
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