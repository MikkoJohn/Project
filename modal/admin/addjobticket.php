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
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-lg-12 col-lg-offset-2 col-lg-8">                    
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Add Job Ticket</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="mname" placeholder="Machine Name">
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="c_name" placeholder="Client Name">
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" name="d_date" placeholder="">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="c_by" placeholder="Checked By">
                                  </div>
                            </div>
                            <div class="col col-lg-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="n_by" placeholder="Noted By">
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                             <div class="form-group">
                                    <input  type="number" class="form-control" name="a_size" placeholder="Actual Size">
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                                    <input  type="text" class="form-control" name="pages" placeholder="Pages">
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                              <div class="form-group">
                                    <input  type="text" class="form-control" name="p_cover" placeholder="Paper Cover">
                                  </div>
                                </div>
                              <div class="col col-sm-4">
                              <div class="form-group">
                                    <input  type="text" class="form-control" name="color" placeholder="Color">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Binding" name="binding">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Lamination" name="lamination">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Remarks" name="remarks">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                    <input  type="text" class="form-control" placeholder="Stock Size" name="s_size">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Start:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="start">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Finis:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="finish">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Time Received:</h5>                          
                                    <input  type="time" class="form-control" placeholder="" name="t_received">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Date Received:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="d_received">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream">
                                  </div>
                                </div>
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
  
  $mname = $_POST['mname'];
  $c_name = $_POST['c_name'];
  $d_date = $_POST['d_date'];
  $c_by = $_POST['c_by'];
  $n_by = $_POST['n_by'];
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
  $t_received = $_POST['t_received'];
  $d_received = $_POST['d_received'];
  $no_out = $_POST['no_out'];
  $no_sheet = $_POST['no_sheet'];
  $no_ream = $_POST['no_ream'];
  
  $now = date("Y-m-d H:i:s");
  if(empty($mname) || empty($c_name) || empty($d_date) || empty($c_by) || empty($n_by) || empty($pages) || empty($quantity) || empty($a_size) || empty($title) || empty($p_cover) || empty($color) || empty($binding) || empty($lamination) || empty($remarks) || empty($s_size) || empty($p_size) || empty($start) || empty($finish) || empty($t_received) || empty($d_received) || empty($no_out) || empty($no_sheet) || empty($no_ream)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
  }else {
 
  $stmt = $conn->prepare("INSERT INTO `job_ticket`(`date_time_created`, `machine_name`, `delivery_date`, `checked_by`, `noted_by`, `client_name`, `title`, `quantity`, `actual_size`, `pages`, `paper_cover`, `color`, `binding`, `lamination`, `remarks`, `stock_size`, `printing_size`, `start`, `finish`, `time_received`, `date_received`, `no_of_out`, `no_of_sheet`, `no_of_ream`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                              $stmt->bind_param('ssssssssssssssssssssssss', $now,$mname,$d_date,$c_by,$n_by,$c_name,$title,$quantity,$a_size,$pages,$p_cover,$color,$binding,$lamination,$remarks,$s_size,$p_size,$start,$finish,$t_received,$d_received,$no_out,$no_sheet,$no_ream);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Added!","", "success");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Add Job Ticket')";
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