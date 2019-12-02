  <?php  
   session_start();
    include_once '../../config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_sales" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View/Edit Job Order</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                     
              <?php
          if(isset($_POST['view_jo'])){
                      $_SESSION['jo_id'] = $_POST['jo_id'];
                      //$machine_id = $_POST['jo_id'];
                        $sql = 'SELECT `job_order_control_no`, `sales_number`, `client_name`, `item_desc_and_title`, `proj_name`, `date_created`, `costing_run`, `finishing_required`, `packaging_required`, `date_to_warehouse`, `requested_delivery`, `quantity`, `size`, `pages`, `paper`, `remarks`, `status` FROM `job_order` WHERE `job_order_control_no` = '.$_SESSION['jo_id'].'';
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)){
                    if($row['status'] != "Disabled"){
                        echo '   
                         <form method="POST" class="form-horizontal" role="form">     
                        <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'">
                           <div class="row">
                            
                             <div class="col col-sm-6">
                             <div class="form-group">
                             <h6>Sales No.:</h6>
                                    <input type="text" class="form-control" placeholder="Sales No." name="sales_no" value="'.$row['sales_number'].'">
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                             <h6>Client Name:</h6>
                                    <input type="text" class="form-control" placeholder="Client Name" name="c_name" value="'.$row['client_name'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                            <h6>Project Name:</h6>
                                    <input type="text" class="form-control" placeholder="Project Name" name="p_name" value="'.$row['proj_name'].'">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                            <h6>Item Description and Title:</h6>
                                    <input type="text" class="form-control" placeholder="Item Description and Title" name="d_title" value="'.$row['item_desc_and_title'].'">
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Costing Based on Machine:</h6>
                            ';

                          echo ' <select class="form-control" name="c_machine" required>
                                <option value="'.$row['costing_run'].'" selected="true">'.$row['costing_run'].'</option>

                                ';
          
                $sql_machine = "SELECT machine_name FROM machine WHERE machine_name != '".$row['costing_run']."'";
                $result = mysqli_query($conn,$sql_machine);
                while($rowm = mysqli_fetch_assoc($result)){
                  echo '
                        <option value="'.$rowm['machine_name'].'">'.$rowm['machine_name'].'</option>
                  ';
                }

          
         echo   '</select>';


                            echo '
                                   
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Finishing Required:</h6>
                            ';

 echo '<select class="form-control" name="f_required" required>
      <option value="'.$row['finishing_required'].'" selected="true">'.$row['finishing_required'].'</option>

                                ';
          
                $sql_finish = "SELECT * FROM post_press WHERE activity != '".$row['finishing_required']."'";
                $result = mysqli_query($conn,$sql_finish);
                while($rowas = mysqli_fetch_assoc($result)){
                  echo '
                        <option value="'.$rowas['activity'].'">'.$rowas['activity'].'</option>
                  ';
                }

          
         echo   '</select>';


                            echo '
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Packaging Required:</h6>
                            <select class="form-control" name="p_required">
                      <option value="'.$row['packaging_required'].'" selected="true">'.$row['packaging_required'].'</option>
                            ';
 $sql_finish = "SELECT activity FROM post_press WHERE activity !='".$row['packaging_required']."'";
                $res = mysqli_query($conn, $sql_finish);
                while($rowpr=mysqli_fetch_assoc($res)){
                  echo '
                    <option value="'.$rowpr['activity'].'">'.$rowpr['activity'].'</option>
                  ';
                           }
                                    // <input type="text" class="form-control" placeholder="Packaging Required" name="p_required" value="'.$row['packaging_required'].'">
                          echo '
                                    </select>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                             <div class="form-group">
                             <h6>Quantity:</h6>
                                    <input  type="number" class="form-control" placeholder="Quantity" name="quantity" value="'.$row['quantity'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                             <h6>No. of Pages:</h6>
                                    <input  type="number" class="form-control" placeholder="No. of Pages" name="no_pages" value="'.$row['pages'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                              <div class="form-group">
                              <h6>Size of Final Output:</h6>
                                    <input  type="text" class="form-control" placeholder="Size of Final Output" name="s_output" value="'.$row['size'].'">
                                  </div>
                                </div>
                              <div class="col col-sm-6">
                              <div class="form-group">
                              <h6>Paper to be Used:</h6>
                                    <input  type="text" class="form-control" placeholder="Paper to be Used" name="p_used" value="'.$row['paper'].'">
                                  </div>
                                </div>
                              <div style="margin:0px 12px 0px 12px" class="et form-group">
                                    <h5>Estimated Transmittal Date to Warehouse:</h5>
                                    <input  type="date" class="form-control" name="e_transmittal" value="'.$row['date_to_warehouse'].'">
                                  </div>
                              <div style="margin:0px 12px 15px 12px" class="cr form-group">
                                    <h5>Client Requested Delivery Date:</h5>
                                    <input  type="date" class="form-control" name="c_delivery" value="'.$row['requested_delivery'].'">
                                  </div>
                                <div class="col col-sm-6">
                                <div class="form-group">    
                                <h6>Remarks:</h6>                      
                                    <input  type="textarea" class="form-control" placeholder="Remarks" name="remarks" value="'.$row['remarks'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h6>Status:</h6>
                                    <select class="form-control" name="status" required>
                                ';
                                if($row['status']=="Pending"){
                                  echo '
                                 <option selected="true" value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                 <option value="Rejected">Rejected</option>
                                  ';
                                }else if($row['status'] =="Acknowledged") {
                                   echo '
                                 <option value="Pending">Pending</option>
                                 <option selected="true" value="Acknowledged">Acknowledged</option>
                                 <option value="Rejected">Rejected</option>
                                  ';
                                }else if($row['status'] =="Rejected") {
                                   echo '
                                 <option value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                 <option selected="true" value="Rejected">Rejected</option>
                                  ';
                                }else {
                                  echo '
                                 <option selected="true" value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                 <option value="Rejected">Rejected</option>
                                  ';
                                }
                                    // <input  type="text" class="form-control" placeholder="Status" value="'.$row['status'].'" name="status">


                                    echo'
                                    </select>
                                  </div>
                                </div>
                           
                            ';

                          
                          ?>
                           <div class="col-lg-12 controls">
                             <button name="updatejo" class="btn btn-warning btn-md" value="UPDATE" disabled><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>
                                    
                                    </div>
                                </div>
                              </div>
                            </form>   
                            <?php 
                          }else {
                            echo '   
                         <form method="POST" class="form-horizontal" action="../index_admin" role="form">     
                        <input type="hidden" name="jo_id" value="'.$row['job_order_control_no'].'" disabled>
                           <div class="row">
                           <div class="col col-sm-4">
                           <div class="form-group">
                             <h6>Job Order No.:</h6>
                                    <input type="text" class="form-control" placeholder="Job Order Control No." name="jo_no" value="'.$row['job_order_control_no'].'" disabled>
                                  </div>
                              </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                             <h6>Sales No.:</h6>
                                    <input type="text" class="form-control" placeholder="Sales No." name="sales_no" value="'.$row['sales_number'].'" disabled>
                                  </div>
                              </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                             <h6>Client Name:</h6>
                                    <input type="text" class="form-control" placeholder="Client Name" name="c_name" value="'.$row['client_name'].'" disabled>
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                            <h6>Project Name:</h6>
                                    <input type="text" class="form-control" placeholder="Project Name" name="p_name" value="'.$row['proj_name'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                            <h6>Item Description and Title:</h6>
                                    <input type="text" class="form-control" placeholder="Item Description and Title" name="d_title" value="'.$row['item_desc_and_title'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                             <h6>Costing Based on Machine:</h6>
                            ';

                          echo ' <select class="form-control" name="c_machine" disabled>
                                <option value="'.$row['costing_run'].'" selected="true">'.$row['costing_run'].'</option>';
          
            

          
         echo   '</select>';


                            echo '
                                   
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Finishing Required:</h6>
                                  <select class="form-control" name="f_required" required disabled>
                                  <option value="'.$row['finishing_required'].'">'.$row['finishing_required'].'</option>
                            ';
                           
                            
 // <input type="text" class="form-control" placeholder="Finishing Required" name="f_required" value="'.$row['finishing_required'].'">

                            echo '
                              </select>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Packaging Required:</h6>
                            <select class="form-control" name="p_required" disabled>
                             <option value="'.$row['packaging_required'].'">'.$row['packaging_required'].'</option>
                            ';

                           
                                    // <input type="text" class="form-control" placeholder="Packaging Required" name="p_required" value="'.$row['packaging_required'].'">
                          echo '
                                    </select>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                             <div class="form-group">
                             <h6>Quantity:</h6>
                                    <input  type="number" class="form-control" placeholder="Quantity" name="quantity" value="'.$row['quantity'].'" disabled>
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                             <h6>No. of Pages:</h6>
                                    <input  type="number" class="form-control" placeholder="No. of Pages" name="no_pages" value="'.$row['pages'].'" disabled>
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                              <div class="form-group">
                              <h6>Size of Final Output:</h6>
                                    <input  type="text" class="form-control" placeholder="Size of Final Output" name="s_output" value="'.$row['size'].'" disabled>
                                  </div>
                                </div>
                              <div class="col col-sm-6">
                              <div class="form-group">
                              <h6>Paper to be Used:</h6>
                                    <input  type="text" class="form-control" placeholder="Paper to be Used" name="p_used" value="'.$row['paper'].'" disabled>
                                  </div>
                                </div>
                              <div style="margin:0px 12px 0px 12px" class="et form-group">
                                    <h5>Estimated Transmittal Date to Warehouse:</h5>
                                    <input  type="date" class="form-control" name="e_transmittal" value="'.$row['date_to_warehouse'].'" disabled>
                                  </div>
                              <div style="margin:0px 12px 15px 12px" class="cr form-group">
                                    <h5>Client Requested Delivery Date:</h5>
                                    <input  type="date" class="form-control" name="c_delivery" value="'.$row['requested_delivery'].'" disabled>
                                  </div>
                                <div class="col col-sm-6">
                                <div class="form-group">    
                                <h6>Remarks:</h6>                      
                                    <input  type="textarea" class="form-control" placeholder="Remarks" name="remarks" value="'.$row['remarks'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h6>Status:</h6>
                                    <select class="form-control" name="status" disabled>
                                ';
                                if($row['status']=="Pending"){
                                  echo '
                                 <option selected="true" value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                 <option value="Rejected">Rejected</option>
                                  ';
                                }else if($row['status'] =="Acknowledged") {
                                   echo '
                                 <option value="Pending">Pending</option>
                                 <option selected="true" value="Acknowledged">Acknowledged</option>
                                 <option value="Rejected">Rejected</option>
                                  ';
                                }else if($row['status'] =="Rejected") {
                                   echo '
                                 <option value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                 <option selected="true" value="Rejected">Rejected</option>
                                  ';
                                }
                                    // <input  type="text" class="form-control" placeholder="Status" value="'.$row['status'].'" name="status">


                                    echo'
                                    </select>
                                  </div>
                                </div>
                            <div class="col-lg-12 controls">
                             <button name="updatejo" class="btn btn-warning btn-md" value="UPDATE" disabled><span class="glyphicon glyphicon-edit" aria-hidden="true" ></span> Update</button>
                            ';

                          }
                          ?>
                          
                                    
                                    </div>
                                </div>
                              </div>
                            </form>   
                            <?php 
                          }


                          }
                        
                        


                          
                          ?>
                         
                           
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['updatejo'])){
//error_reporting(0);
  // $jo_no = $_POST['jo_no'];
  $jo_id = $_POST['jo_id'];
  $sales_no = $_POST['sales_no'];
  $c_name = $_POST['c_name'];
  $d_title = $_POST['d_title'];
  $c_machine = $_POST['c_machine'];
  $f_required = $_POST['f_required'];
  $p_required = $_POST['p_required'];
  $quantity = $_POST['quantity'];
  $no_pages = $_POST['no_pages'];
  $s_output = $_POST['s_output'];
  $p_used = $_POST['p_used'];
  $e_transmittal = $_POST['e_transmittal'];
  $c_delivery = $_POST['c_delivery'];
  $remarks = $_POST['remarks'];
  $p_name = $_POST['p_name'];
  $status = $_POST['status'];
  $now = date("Y-m-d H:i:s");
  
 
  // $stmt = $conn->prepare("UPDATE `job_order` SET `job_order_control_no=?`,`sales_number`=?,`client_name`=?,`item_desc_and_title`=?,`proj_name`=?,`costing_run`=?,`finishing_required`=?,`packaging_required`=?,`date_to_warehouse`=?,`requested_delivery`=?,`quantity`=?,`size`=?,`pages`=?,`paper`=?,`remarks`=?,`status`=? WHERE `job_order_control_no` = ?");
  $sql_update = "UPDATE `job_order` SET `sales_number`='$sales_no',`client_name`='$c_name',`item_desc_and_title`='$d_title',`proj_name`='$p_name',`costing_run`='$c_machine',`finishing_required`='$f_required',`packaging_required`='$p_required',`date_to_warehouse`='$e_transmittal',`requested_delivery`='$c_delivery',`quantity`='$quantity',`size`='$s_output',`pages`='$no_pages',`paper`='$p_used',`remarks`='$remarks',`status`='$status' WHERE `job_order_control_no` = '". $_SESSION['jo_id']."'";
  mysqli_query($conn,$sql_update);
                              // $stmt->bind_param('sssssssssssssssss',$jo_no,$sales_no,$c_name,$d_title,$p_name,$c_machine,$f_required,$p_required,$e_transmittal,$c_delivery,$quantity,$s_output,$no_pages,$p_used,$remarks,$status,$jo_id);

                              // if($stmt->execute()){
                                // echo'<script>swal("Successfully Updated!","", "success");</script>';
                                echo '<script>alert("Successfully Updated!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Job Order')";
                              mysqli_query($conn,$sql1);
                              //header("Location: ../index_admin");
                               echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                              // } 
                              // else {
                              //   echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
                              // }
                              // //else { echo"<script>alert('ERROR')</script>"; }

                              // $stmt->close();

}


?>