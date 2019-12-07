  <?php  
       session_start();
    include_once '../../config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_genservass" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">View Material Request</div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <?php


            if(isset($_POST['view_purchase'])){
               $_SESSION['request_id'] = $_POST['request_id'];
                      $request_id = $_POST['request_id'];
            $sql="SELECT * FROM material_request_form WHERE request_id = '".$_SESSION['request_id']."'";
            $result = mysqli_query($conn,$sql);
            while($rows = mysqli_fetch_assoc($result)){


                  echo '
                            <div class="row">
                               <div class="col col-sm-12">
                             <div class="form-group">
                                  <select class="form-control" name="jo_controlno" disabled>
                                    <option value="'.$rows['job_order_control_no'].'" selected="true" disabled>'.$rows['job_order_control_no'].'</option>
                         ';
                  
                  echo '
                                  </select>
                                    <!-- <input type="text" class="form-control" name="jo_controlno" placeholder="Job Control No." required> -->
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                              <label>No. of Reams</label>
                                    <input type="text" class="form-control" name="no_reams" value="'.$rows['no_of_reams'].'" placeholder="No. of Reams" disabled>
                                  </div>
                                </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                               <label>Paper Size</label>
                                    <input type="text" class="form-control" name="p_size" value="'.$rows['paper_size'].'" placeholder="Paper Size" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                               <label>Kind of Paper</label>
                          <select class="form-control" name="k_paper">
                               <option value="'.$rows['item_name'].'" selected disabled>'.$rows['item_name'].'</option>
                    ';

                          
     $sql_material = "SELECT item_name FROM materials WHERE category = 'Paper' AND item_name !='".$rows['item_name']."'";
              $result_material = mysqli_query($conn,$sql_material);
              while($row_material = mysqli_fetch_assoc($result_material)){
                    echo '
                        <option value="'.$row_material['item_name'].'">'.$row_material['item_name'].'</option>
                    ';
              }

                    echo '
                               </select>
                                 
                                  </div>
                            </div>
                            <div class="col col-sm-12">
                            <div class="form-group">
                               <label>Quantity</label>
                                    <input type="number" class="form-control" name="quantity" value="'.$rows['quantity'].'" placeholder="Quantity" min="0" disabled>
                                  </div>
                            </div>             
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" value="'.$rows['date'].'" name="d_date" placeholder="Delivery Date" disabled>
                                  </div>
                            </div>
                           <!--   <div class="col col-sm-12">
                            <div class="form-group">
                                <select class="form-control" name="p_status" disabled>
                                    <option selected="true" value="'.$rows['pending_status'].'" disabled="">'.$rows['pending_status'].'</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                </select>
                                   
                                  </div>
                            </div> -->
                             <div class="col col-sm-12">
                            <div class="form-group">
                               <label>Remarks</label>
                                    <input type="text" class="form-control" value="'.$rows['remarks'].'" name="remarks" placeholder="Remarks" disabled>
                                  </div>
                            </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="addmaterialreq" class="btn btn-success" disabled>
                                    </div>
                                </div>';

                    
                  }
                }
                            ?>    
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
  