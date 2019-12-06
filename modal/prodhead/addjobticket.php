  <?php  
         include_once '../../config.php';
  include '../../includes/link.php';
    include '../../includes/header.php';
    session_start();
   $accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_prodhead" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-lg-12 col-lg-offset-2 col-lg-8">                    
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Add Job Ticket</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-3">
                             <div class="form-group">
                                <h6>Job Order No.:</h6>
                                    <input type="text" class="form-control" name="jo_no" placeholder="Job Order No" required>
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                              <h6>Select Machine:</h6>
                                <select class="form-control" name="mname" required>
                                  <option selected="true" value="NULL" disabled>SELECT MACHINE</option>
                                <?php
                            $sql="SELECT * FROM machine";
                            $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($result)){
                              echo '<option value="'.$row['machine_name'].'">'.$row['machine_name'].'</option>';
                            }
                                ?>
                                </select>
                                 <!--    <input type="text" class="form-control" name="mname" placeholder="Machine Name"> -->
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                              <h6>Client Name:</h6>
                                    <input type="text" class="form-control" name="c_name" placeholder="Client Name" required>
                                  </div>
                                </div>
                               <div class="col col-sm-3">
                             <div class="form-group">
                              <h6>Project Name:</h6>
                                    <input type="text" class="form-control" name="p_name" placeholder="Project Name" required>
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>

                                    <input type="date" class="form-control" name="d_date" placeholder="" required>
                                  </div>
                            </div>
                            
                            <div class="col col-lg-4">
                            <div class="form-group">
                              <h6>Title:</h6>
                                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Quantity:</h6>
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                             <div class="form-group">
                              <h6>Actual Size:</h6>
                                    <input  type="text" class="form-control" name="a_size" placeholder="Actual Size" required>
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                              <h6>No. of Pages:</h6>
                                    <input  type="number" class="form-control" name="pages" placeholder="No. of Pages" required>
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                              <div class="form-group">
                                <h6>Paper Cover:</h6>
                                    <input  type="text" class="form-control" name="p_cover" placeholder="Paper Cover" required>
                                  </div>
                                </div>
                              <div class="col col-sm-4">
                              <div class="form-group">
                                <h6>Color:</h6>
                                    <!-- <input  type="text" class="form-control" name="color" placeholder="Color" required> -->
                <select class="form-control"  name="color" required>
                        <option>SELECT COLOR</option>
                        <option value="1 Color - Black">1 Color - "Black"</option>
                        <option value="2 Color - Black, Cyan">2 Color - "Black, Cyan"</option>
                        <option value="3 Color - Black, Magenta">3 Color - "Black, Magenta"</option>
                        <option value="4 Color - Black, Yellow">4 Color - "Black, Yellow"</option>
                        <option value="5 Color - CMYK">5 Color - "CMYK"</option>

                  </select> 
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">    
                                  <h6>Select Binding Method:</h6>
                                    <select class="form-control" name="binding" required>
                                      <option selected="true" value="NULL" disabled>SELECT BINDING METHOD</option>
                          <?php
                $sql_act = "SELECT activity FROM post_press";
                $res = mysqli_query($conn,$sql_act);
                while($row = mysqli_fetch_assoc($res)){
                    echo '
                      <option value="'.$row['activity'].'">'.$row['activity'].'</option>
                    ';
                }

                          ?>
                                    </select>
                                    <!-- <input  type="text" class="form-control" placeholder="Binding" name="binding"> -->
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">    
                                <h6>Lamination:</h6>                      
                                    <input  type="text" class="form-control" placeholder="Lamination" name="lamination" required>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">  
                                <h6>Remarks:</h6>                        
                                    <input  type="text" class="form-control" placeholder="Remarks" name="remarks" required>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                  <h6>Stock Size:</h6>
                    <select class="form-control"  name="s_size">
                        <option>SELECT STOCK SIZE</option>
              <?php 
                $sql_size = "SELECT * FROM materials WHERE category = 'Paper' ";
                $result = mysqli_query($conn,$sql_size);
                while($row_size = mysqli_fetch_assoc($result)){
                  echo '
                          <option value="'.$row_size['item_name'].'">'.$row_size['item_name'].'</option>
                  ';
                }

              ?>
                  </select> 
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h6>Printing Size:</h6>                          
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size" required>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Start:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" id="start" name="start" required>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Finish:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" id="finish" name="finish" required>
                                  </div>
                                </div>
                               <!--  <div class="col col-sm-6">
                            <div class="form-group">
                              <h6>Checked By:</h6>
                                    <input type="text" class="form-control" name="c_by" placeholder="Checked By" required>
                                  </div>
                            </div>
                            <div class="col col-lg-6">
                            <div class="form-group">
                              <h6>Noted By:</h6>
                                    <input type="text" class="form-control" name="n_by" placeholder="Noted By" required>
                                  </div>
                            </div> -->
                               <!--  <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Time Received:</h5>                          
                                    <input  type="time" class="form-control" placeholder="" name="t_received" required>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Date Received:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="d_received" required>
                                  </div>
                                </div> -->
                                <div class="col col-sm-3">
                                <div class="form-group"> 
                                <h6>No. of Out:</h6>                         
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out" required>
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">
                                <h6>No. of Sheet:</h6>                          
                                    <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet" required>
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">   
                                <h6>No. of Ream:</h6>                       
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream" required>
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">  
                                <h6>Select Status:</h6> 
                                <select name="status" class="form-control" required="">
                                  <option selected="true" value="NULL" disabled="">SELECT STATUS</option>
                                 <option value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                </select>                       
                                    <!-- <input  type="text" class="form-control" placeholder="Status" name="status" required> -->
                                  </div>
                                </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addjticket" class="btn btn-success">
                                    </div>
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>

                  
   
<?php if(isset($_POST['addjticket'])){
//error_reporting(0);
  $jo_no = $_POST['jo_no'];
  $mname = $_POST['mname'];
  $c_name = $_POST['c_name'];
  $p_name = $_POST['p_name'];
  $d_date = $_POST['d_date'];
  // $c_by = $_POST['c_by'];
  // $n_by = $_POST['n_by'];
  $title = $_POST['title'];
  $quantity = $_POST['quantity'];
  $a_size = $_POST['a_size'];
  $pages = $_POST['pages'];
  $p_cover = $_POST['p_cover'];
  $color = $_POST['color'];
  $binding = $_POST['binding'];
  $lamination = $_POST['lamination'];
  $remarks = $_POST['remarks'];
  $s_size = $_POST['s_size'];
  $p_size = $_POST['p_size'];
  $start = $_POST['start'];
  $finish = $_POST['finish'];
  // $t_received = $_POST['t_received'];
  // $d_received = $_POST['d_received'];
  $no_out = $_POST['no_out'];
  $no_sheet = $_POST['no_sheet'];
  $no_ream = $_POST['no_ream'];
  $status = $_POST['status'];
  $now = date("Y-m-d H:i:s");
  if(empty($jo_no) || empty($mname) || empty($c_name) || empty($c_name) || empty($d_date)  || empty($pages) || empty($quantity) || empty($a_size) || empty($title) || empty($p_cover) || empty($color) || empty($binding) || empty($lamination) || empty($remarks) || empty($s_size) || empty($p_size) || empty($start) || empty($finish) || empty($no_out) || empty($no_sheet) || empty($no_ream) || empty($status)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `job_ticket`(`job_order_control_no`,`date_time_created`, `machine_name`,`proj_name` ,`delivery_date`, `checked_by`, `noted_by`, `client_name`, `title`, `quantity`, `actual_size`, `pages`, `paper_cover`, `color`, `binding`, `lamination`, `remarks`, `stock_size`, `printing_size`, `start`, `finish`, `no_of_out`, `no_of_sheet`, `no_of_ream`,`status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('sssssssssssssssssssssss',$jo_no, $now,$mname,$p_name,$d_date,$c_name,$title,$quantity,$a_size,$pages,$p_cover,$color,$binding,$lamination,$remarks,$s_size,$p_size,$start,$finish,$no_out,$no_sheet,$no_ream,$status);

                              if($stmt->execute()){
                                // echo'<script>swal("Successfully Added!","", "success");</script>';
                               echo '<script>alert("Successfully Added!");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Job Ticket')";
                              mysqli_query($conn,$sql1);
                              //header("Location: ../../index_admin");
                      echo "<script type='text/javascript'>location.href = '../../index_prodhead';</script>";
                              } 
                              else {
                                echo'<script>swal("Error!","Please fill blank fields" ,"warning");</script>';
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