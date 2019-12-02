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
                    <div class="panel-title">Add Job Order</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                           
                             <div class="col col-sm-12">
                             <div class="form-group">
                                <select class="form-control" name="c_name" onmousedown="if(this.options.length>3){this.size=3;}" onchange='this.size=0;' onblur="this.size=0;">
                                  <option value="NULL" selected="true" disabled>SELECT CLIENT</option>
            <?php
                  $client_sql="SELECT * FROM client_info";
                  $result=mysqli_query($conn,$client_sql);
                  while ($row=mysqli_fetch_assoc($result)) {
                      echo '
                          <option value="'.$row['client_name'].'">'.$row['client_name'].'</option>
                      ';
                  }

                                  ?>
                                </select>
                                  <!--   <input type="text" class="form-control" name="c_name" placeholder="Client Name" required> -->
                                  </div>
                                </div>
                                  <div class="col col-sm-4">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="sales_no" placeholder="Sales No." required>
                                  </div>
                              </div>
                             <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="p_name" placeholder="Project Name" required>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="d_title" placeholder="Item Description and Title" required>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                              <select class="form-control" name="c_machine" required>
                                <option value="NULL" selected="true" disabled>Costing Based on Machine</option>
          <?php
                $sql_machine = "SELECT machine_name FROM machine";
                $result = mysqli_query($conn,$sql_machine);
                while($row = mysqli_fetch_assoc($result)){
                  echo '
                        <option value="'.$row['machine_name'].'">'.$row['machine_name'].'</option>
                  ';
                }

           ?>
           </select>
                                   <!--  <input type="text" class="form-control" name="c_machine" placeholder="Costing based on Machine" required> -->
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                <select class="form-control" name="f_required" required>
                                      <option selected="true" value="NULL" disabled>SELECT FINISHING REQUIRED</option>
                          <?php
                $sql_finish = "SELECT activity FROM post_press";
                $res = mysqli_query($conn, $sql_finish);
                while($rowf=mysqli_fetch_assoc($res)){
                  echo '
                    <option value="'.$rowf['activity'].'">'.$rowf['activity'].'</option>
                  ';
                }

                          ?>
                                    </select>
                             <!--        <input type="text" class="form-control" name="f_required" placeholder="Finishing Required" required> -->
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                              <select class="form-control" name="p_required" required>
                                <option selected="true" value="NULL" disabled>SELECT PACKAGING REQUIRED</option>
          <?php
                $sql_finish = "SELECT activity FROM post_press";
                $res = mysqli_query($conn, $sql_finish);
                while($rowf=mysqli_fetch_assoc($res)){
                  echo '
                    <option value="'.$rowf['activity'].'">'.$rowf['activity'].'</option>
                  ';
                }

                          ?>
                              </select>
                                    <!-- <input type="text" class="form-control" name="p_required" placeholder="Packaging Required" required> -->
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                             <div class="form-group">
                                    <input  type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input  type="number" class="form-control" name="no_pages" placeholder="No. of Pages" required>
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                              <div class="form-group">
                                    <input  type="text" class="form-control" name="s_output" placeholder="Size of Final Output" required>
                                  </div>
                                </div>
                              <div class="col col-sm-6">
                              <div class="form-group">
                  <select class="form-control" name="p_used" required>
                                <option value="NULL" selected="true" disabled>Paper to be used</option>
          <?php
                $sql_machine = "SELECT item_name FROM materials WHERE category = 'Paper'";
                $result = mysqli_query($conn,$sql_machine);
                while($row = mysqli_fetch_assoc($result)){
                  echo '
                        <option value="'.$row['item_name'].'">'.$row['item_name'].'</option>
                  ';
                }

           ?>
           </select>

                                   <!--  <input  type="text" class="form-control" name="p_used" placeholder="Paper to be used" required> -->
                                  </div>
                                </div>
                              <div style="margin:0px 12px 0px 12px" class="et form-group">
                                    <h5>Estimated Transmittal Data to Warehouse:</h5>
                                    <input  type="date" id="start" class="form-control" name="e_transmittal"  required>
                                  </div>
                              <div style="margin:0px 12px 15px 12px" class="cr form-group">
                                    <h5>Client Requested Delivery Date:</h5>
                                    <input  type="date" id="finish" class="form-control" name="c_delivery" required>
                                  </div>
                                <div class="col col-sm-12">
                                <div class="form-group">                          
                                    <input  type="textarea" class="form-control" placeholder="Remarks" name="remarks" required>
                                  </div>
                                </div>
                               <!--  <div class="col col-sm-6">
                                <div class="form-group">
                                  <select name="status" class="form-control" required>
                                  <option selected="true" value="NULL" disabled="">SELECT STATUS</option>
                                 <option value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                 <option value="Rejected">Rejected</option>
                                </select> 
                                 
                                  </div>
                                </div> -->
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addjo" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['addjo'])){
//error_reporting(0);
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
  $status = "Pending";
  $now = date("Y-m-d H:i:s");
  $jo_status = 0;
  if(empty($sales_no) || empty($c_name) || empty($d_title) || empty($c_machine) || empty($f_required) || empty($p_required) || empty($quantity) || empty($no_pages) || empty($s_output) || empty($p_used) || empty($e_transmittal) || empty($c_delivery) || empty($remarks) || empty($p_name) || empty($status)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `job_order`(`sales_number`, `client_name`, `item_desc_and_title`, `proj_name`, `date_created`, `costing_run`, `finishing_required`, `packaging_required`, `date_to_warehouse`, `requested_delivery`, `quantity`, `size`, `pages`, `paper`, `remarks`, `status`,`jo_status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssssssssssssss', $sales_no,$c_name,$d_title,$p_name,$now,$c_machine,$f_required,$p_required,$e_transmittal,$c_delivery,$quantity,$s_output,$no_pages,$p_used,$remarks,$status,$jo_status);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                                 echo '<script>alert("Successfully Added!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Job Order')";
                              mysqli_query($conn,$sql1);
                            //  header("Location:../../index_admin");
                        echo "<script type='text/javascript'>location.href = '../../index_admin';</script>";
                              } 
                              else {
                                // echo'<script>swal("Error!","Sales Number already Exist" ,"warning");</script>';
                                echo'<script>alert("Sales Number already Exist");</script>';
                              }
                              //else { echo"<script>alert('ERROR')</script>"; }

                              $stmt->close();
}
}
?>



<script>
  $(document).ready(function(){
   $('#start').change(function(){
    document.getElementById('finish').setAttribute("min",$('#start').val());
   });
  });
</script> 