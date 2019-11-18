  <?php  
     session_start();
    include_once 'config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
  
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-left:0px;width: 100%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View Transactions</div>
                </div>     
              <form method="POST">
                <div style="padding-top:20px" class="panel-body" >
                   <div class="col-lg-11 controls">
                  <select class="form-control" name="view" onmousedown="if(this.options.length>3){this.size=3;}" onchange='this.size=0;' onblur="this.size=0;">
                    <!-- onmousedown="if(this.options.length>3){this.size=3;}" onchange='this.size=0;' onblur="this.size=0;" -->
    <?php
        $sql = "SELECT * FROM job_order";
         $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)){

          echo "
          <option value='".$row['job_order_control_no']."'>".$row['proj_name']."</option>
          ";
        }
    ?>                  
  

                  </select>
    </div>
                            <div class="col-lg-1 controls">
                                      <input type="submit" name="view_transaction" value="VIEW" class="btn btn-primary">
                                            
         </div>
                   </form>
                   <br><br><br><br>
   
<?php 
if(isset($_POST['view_transaction'])){
// error_reporting(0);
 $_SESSION['view'] = $_POST['view'];



////////////////////////////////////////////////////////////job order 

$sql_jo = "SELECT * FROM job_order WHERE job_order_control_no = '".$_SESSION['view']."'";
$result_jo = mysqli_query($conn,$sql_jo);
echo '  
<label>Job Order:</label>
<table class="table table-striped table-bordered">
    <thead>
        <th width="40%">Project Name</th>
        <th width="40%">Client Name</th>
        <th>Status</th>
    </thead>
'
;
while($row_jo = mysqli_fetch_assoc($result_jo)){
  echo '
        <tr>
            <td>'.$row_jo['proj_name'].'</td>
            <td>'.$row_jo['client_name'].'</td>
            <td>'.$row_jo['status'].'</td>
        </tr>
  ';
}
echo '</table>';

////////////////////////////////////////////////////////////job ticket

echo '<br><br>';

$sql_jt = "SELECT * FROM job_ticket WHERE job_order_control_no = '".$_SESSION['view']."'";
$result_jt = mysqli_query($conn,$sql_jt);
echo '  
<label>Job Ticket:</label>
<table class="table table-striped table-bordered">
    <thead>
        <th width="40%">Project Name</th>
        <th width="40%">Client Name</th>
        <th>Status</th>
    </thead>
'
;
while($row_jt = mysqli_fetch_assoc($result_jt)){
  echo '
        <tr>
            <td>'.$row_jt['proj_name'].'</td>
            <td>'.$row_jt['client_name'].'</td>
            <td>'.$row_jt['status'].'</td>
        </tr>
  ';
}
echo '</table>';




////////////////////////////////////////////////////////////material request
echo '<br><br>';

$sql_mr = "SELECT * FROM material_request_form WHERE job_order_control_no = '".$_SESSION['view']."'";
$result_mr = mysqli_query($conn,$sql_mr);
echo '  
<label>Material Request:</label>
<table class="table table-striped table-bordered">
    <thead>
        <th width="40%">Project Name</th>
        <th width="40%">Client Name</th>
        <th>Status</th>
    </thead>
'
;
while($row_mr = mysqli_fetch_assoc($result_mr)){
  echo '
        <tr>
            <td>'.$row_mr['delivery_date'].'</td>
            <td>'.$row_mr['quantity'].'</td>
            <td>'.$row_mr['pending_status'].'</td>
        </tr>
  ';
}
echo '</table>';



////////////////////////////////////////////////////////////work order
echo '<br><br>';

$sql_wo = "SELECT * FROM work_order WHERE job_controlno = '".$_SESSION['view']."'";
$result_wo = mysqli_query($conn,$sql_wo);
echo '  
<label>Work Order:</label>
<table class="table table-striped table-bordered">
    <thead>
        <th width="40%">Job Description</th>
        <th width="40%">Supplier Name</th>
        <th>Status</th>
    </thead>
'
;

while($row_wo = mysqli_fetch_assoc($result_wo)){
  echo '
        <tr>
            <td>'.$row_wo['job_desc'].'</td>
            <td>'.$row_wo['s_name'].'</td>

            ';

if($row_wo == 1){
      echo'
            <td>Disabled</td>
        ';
}else if($row_wo == 0){
      echo'
            <td>Pending</td>
        ';
}else {
       echo'
            <td>'.$row_wo['status'].'</td>
        ';
}

    echo '
        </tr>
  ';
}
echo '</table>';

}


?>

     </div>
                               
                              </div>
                        </div>                     
                    </div>           