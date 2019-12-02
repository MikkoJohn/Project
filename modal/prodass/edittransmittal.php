  <?php  
  session_start();
    include_once '../../config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];

  ?>

   <a href="../../index_prodass" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View/Edit Transmittal</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                      <form method="POST" class="form-horizontal" role="form"> 
                      <div class="row">  
            <?php
            if(isset($_POST['view_transmittal'])){

               $_SESSION['transmittal_id'] = $_POST['transmittal_id'];
                // echo $_SESSION['transmittal_id'];
                // echo 'asdasdad';
     $sql = "SELECT * FROM trasmittal where transmittal_id = '".$_SESSION['transmittal_id']."'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    echo '                           
                             <div class="col col-sm-12">
                             <div class="form-group">
                    <label>Prepared By:</label>
                                    <input type="text" class="form-control" name="p_by" placeholder="Prepared by" value='.$row['prep_by'].' required>
                                  </div>
                              </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                              <label>Pre-Press:</label>
                                    <input type="text" class="form-control"  value='.$row['pre_press'].' name="pre_press" placeholder="Pre-Press" required>
                                  </div>
                                </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                            <label>Post-Press:</label>
                                    <input type="text" class="form-control" value='.$row['post_press'].' name="post_press" placeholder="Post-Press" required>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                      <label>Others:</label>
                                  <input type="text" class="form-control"  value='.$row['others'].' name="others" placeholder="Others" required>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                      <label>Job Order Control No.:</label>
                                    <input type="text" class="form-control"  value='.$row['jo_no'].' name="jo_controlno" placeholder="Job Order Control No" required>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                              <label>Quantity:</label>
                                    <input type="number" class="form-control"  value='.$row['quantity'].' name="quantity" placeholder="Quantity" required>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                             <div class="form-group">
                            <label>Description:</label>
                                    <input  type="text" class="form-control"  value='.$row['description'].' name="desc" placeholder="Description" required>
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                             <div class="form-group">
                                <select class="form-control" name="status" required>
                              ';
                    if($row['status'] == "Pending"){
                      echo '
                           <option selected="true" value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                      ';
                    }else if($row['status'] == "Approved") {
                      echo '
                             <option value="Pending">Pending</option>
                                  <option selected="true" value="Approved">Approved</option>
                      '; 
                    }else {
                      echo '
                      <option selected="true"  value="'.$row['status'].'">'.$row['status'].'</option>
                             <option value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                      '; 
                    }

                  echo '
                                </select>
                                   
                                  </div>
                                </div> 
                            ';
                      }//end ng while

                    }//end ng if
                      ?>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addtransmittal" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addtransmittal'])){
error_reporting(0);
  $p_by = $_POST['p_by'];
  $pre_press = $_POST['pre_press'];
  $post_press = $_POST['post_press'];
  $others = $_POST['others'];
  $jo_controlno = $_POST['jo_controlno'];
  $quantity = $_POST['quantity'];
  $desc = $_POST['desc'];
  $status = "Pending";
 
  
  $sql_tr= "UPDATE `trasmittal` SET `prep_by`='$p_by',`pre_press`='$pre_press',`post_press`='$post_press',`others`='$others',`jo_no`='$jo_controlno',`quantity`='$quantity',`description`='$desc',`status`='$status' WHERE transmittal_id = '".$_SESSION['transmittal_id']."'";
  mysqli_query($conn,$sql_tr);
                                echo '<script>alert("Successfully Updated!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Updated Transmittal')";
                              mysqli_query($conn,$sql1);
                              //header("Location: ../../index_admin");
                              echo "<script type='text/javascript'>location.href = '../../index_prodass';</script>";
                      
}


?>