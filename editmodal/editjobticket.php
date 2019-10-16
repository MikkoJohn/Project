  <?php  
    include_once '../config.php';
    include '../includes/link.php';
    include '../includes/header.php';
    session_start();$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../index_admin" class="btn btn-primary" style="margin:2%">BACK</a>
   <form method="POST" onsubmit="return confirm('Are you sure?')">
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-lg-12 col-lg-offset-2 col-lg-8">                    
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Update Job Ticket</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <?php

                if(isset($_POST['view_jticket'])){
                   $_SESSION['ticket_no'] = $_POST['ticket_no'];
                  $ticket_no = $_POST['ticket_no'];
                  $_SESSION['ticket_no'] = $_POST['ticket_no'];
                  $sql = "SELECT * FROM job_ticket where ticket_no = '".$_SESSION['ticket_no']."'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    echo '
                       <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="jo_no" placeholder="Job Order No" value="'.$row['job_order_control_no'].'">
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="mname" placeholder="Machine Name" value="'.$row['machine_name'].'">
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="c_name" placeholder="Client Name" value="'.$row['client_name'].'">
                                  </div>
                                </div>
                               <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="p_name" placeholder="Project Name" value="'.$row['proj_name'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" name="d_date" placeholder="" value="'.$row['delivery_date'].'">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="c_by" placeholder="Checked By" value="'.$row['checked_by'].'">
                                  </div>
                            </div>
                            <div class="col col-lg-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="n_by" placeholder="Noted By" value="'.$row['noted_by'].'">
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="'.$row['title'].'">
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="'.$row['quantity'].'">
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                             <div class="form-group">
                                    <input  type="number" class="form-control" name="a_size" placeholder="Actual Size" value="'.$row['actual_size'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                                    <input  type="text" class="form-control" name="pages" placeholder="Pages" value="'.$row['pages'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                              <div class="form-group">
                                    <input  type="text" class="form-control" name="p_cover" placeholder="Paper Cover" value="'.$row['paper_cover'].'">
                                  </div>
                                </div>
                              <div class="col col-sm-4">
                              <div class="form-group">
                                    <input  type="text" class="form-control" name="color" placeholder="Color" value="'.$row['color'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                   <select class="form-control" name="binding">
                                ';
                            if($row['binding'] == "Perfect Bind"){
                              echo '
                                 
                                      <option selected="true" value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Saddle Stitch"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option selected="true" value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                    
                              ';
                            }else if($row['binding'] == "Case Bind"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option selected="true" value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                    
                              ';
                            }else if($row['binding'] == "Varnish"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option selected="true" value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Lamination"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option selected="true" value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Embossing"){
                               echo '
                               
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option selected="true" value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Debossing"){
                               echo '
                                
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option selected="true" value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Horinzontal Ringbind"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option selected="true" value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Vertical Ringbind"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option selected="true" value="Vertical Ringbind">Vertical Ringbind</option>
                                  
                              ';
                            }



                                echo '

                                </select>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Lamination" name="lamination" value="'.$row['lamination'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Remarks" name="remarks" value="'.$row['remarks'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                    <input  type="text" class="form-control" placeholder="Stock Size" name="s_size" value="'.$row['stock_size'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size" value="'.$row['printing_size'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Start:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="start" value="'.$row['start'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Finish:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="finish" value="'.$row['finish'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Time Received:</h5>                          
                                    <input  type="time" class="form-control" placeholder="" name="t_received" value="'.$row['time_received'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Date Received:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="d_received" value="'.$row['date_received'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out" value="'.$row['no_of_out'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet" value="'.$row['no_of_sheet'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream" value="'.$row['no_of_ream'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">                          
                                     <select name="status" class="form-control" required="">
                                ';
                                if($row['status']=="Pending"){
                                  echo '
                                 <option selected="true" value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                  ';
                                }else if($row['status'] =="Acknowledged") {
                                   echo '
                                 <option value="Pending">Pending</option>
                                 <option selected="true" value="Acknowledged">Acknowledged</option>
                                  ';
                                }

                                    // <input  type="text" class="form-control" placeholder="Status" name="status" value="'.$row['status'].'">
                        echo '
                         </select>  
                                  </div>
                                </div>
                    ';
                  }
                }else {
                  // $ticket_no = $_POST['ticket_no'];
                //  $_SESSION['ticket_no'] = $_POST['ticket_no'];
                  $sql = "SELECT * FROM job_ticket where ticket_no = '".$_SESSION['ticket_no']."'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    echo '
                       <form method="POST" class="form-horizontal" role="form">         
                           <div class="row">
                             <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="jo_no" placeholder="Job Order No" value="'.$row['job_order_control_no'].'">
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="mname" placeholder="Machine Name" value="'.$row['machine_name'].'">
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="c_name" placeholder="Client Name" value="'.$row['client_name'].'">
                                  </div>
                                </div>
                               <div class="col col-sm-3">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="p_name" placeholder="Project Name" value="'.$row['proj_name'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" name="d_date" placeholder="" value="'.$row['delivery_date'].'">
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="c_by" placeholder="Checked By" value="'.$row['checked_by'].'">
                                  </div>
                            </div>
                            <div class="col col-lg-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="n_by" placeholder="Noted By" value="'.$row['noted_by'].'">
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="'.$row['title'].'">
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="'.$row['quantity'].'">
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                             <div class="form-group">
                                    <input  type="number" class="form-control" name="a_size" placeholder="Actual Size" value="'.$row['actual_size'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                                    <input  type="text" class="form-control" name="pages" placeholder="Pages" value="'.$row['pages'].'">
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                              <div class="form-group">
                                    <input  type="text" class="form-control" name="p_cover" placeholder="Paper Cover" value="'.$row['paper_cover'].'">
                                  </div>
                                </div>
                              <div class="col col-sm-4">
                              <div class="form-group">
                                    <input  type="text" class="form-control" name="color" placeholder="Color" value="'.$row['color'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group"> 
                                 <select class="form-control" name="binding">
                                ';
                            if($row['binding'] == "Perfect Bind"){
                              echo '
                                 
                                      <option selected="true" value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Saddle Stitch"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option selected="true" value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                    
                              ';
                            }else if($row['binding'] == "Case Bind"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option selected="true" value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                    
                              ';
                            }else if($row['binding'] == "Varnish"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option selected="true" value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Lamination"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option selected="true" value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Embossing"){
                               echo '
                               
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option selected="true" value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Debossing"){
                               echo '
                                
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option selected="true" value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Horinzontal Ringbind"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option selected="true" value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option value="Vertical Ringbind">Vertical Ringbind</option>
                                   
                              ';
                            }else if($row['binding'] == "Vertical Ringbind"){
                               echo '
                                 
                                      <option value="Perfect Bind">Perfect Bind</option>
                                      <option value="Saddle Stitch">Saddle Stitch</option>
                                      <option value="Case Bind">Case Bind</option>
                                      <option value="Varnish">Varnish</option>
                                      <option value="Lamination">Lamination</option>
                                      <option value="Embossing">Embossing</option>
                                      <option value="Debossing">Debossing</option>
                                      <option value="Horinzontal Ringbind">Horinzontal Ringbind</option>
                                      <option selected="true" value="Vertical Ringbind">Vertical Ringbind</option>
                                  
                              ';
                            }



                                echo '

                                </select>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Lamination" name="lamination" value="'.$row['lamination'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Remarks" name="remarks" value="'.$row['remarks'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                    <input  type="text" class="form-control" placeholder="Stock Size" name="s_size" value="'.$row['stock_size'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">                          
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size" value="'.$row['printing_size'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Start:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="start" value="'.$row['start'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Finish:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="finish" value="'.$row['finish'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Time Received:</h5>                          
                                    <input  type="time" class="form-control" placeholder="" name="t_received" value="'.$row['time_received'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Date Received:</h5>                          
                                    <input  type="date" class="form-control" placeholder="" name="d_received" value="'.$row['date_received'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out" value="'.$row['no_of_out'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet" value="'.$row['no_of_sheet'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">                          
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream" value="'.$row['no_of_ream'].'">
                                  </div>
                                </div>
                                <div class="col col-sm-3">
                                <div class="form-group">
                                <select name="status" class="form-control" required="">
                                ';
                                if($row['status']=="Pending"){
                                  echo '
                                 <option selected="true" value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                  ';
                                }else if($row['status'] =="Acknowledged") {
                                   echo '
                                 <option value="Pending">Pending</option>
                                 <option selected="true" value="Acknowledged">Acknowledged</option>
                                  ';
                                }

                                    // <input  type="text" class="form-control" placeholder="Status" name="status" value="'.$row['status'].'">
                        echo '
                         </select>  
                                  </div>
                                </div>
                    ';
                  }

                }

                ?>
                <div class="col col-sm-12">
                   <div class="form-group">  
                           <button name="updatejobticket" class="btn btn-warning btn-md" value="UPDATE"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>  
                                </div>
                              </div>
                            </form>     
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php if(isset($_POST['updatejobticket'])){
//error_reporting(0);
  $jo_no = $_POST['jo_no'];
  $mname = $_POST['mname'];
  $c_name = $_POST['c_name'];
  $p_name = $_POST['p_name'];
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
  $status = $_POST['status'];
  $now = date("Y-m-d H:i:s");
  if(empty($jo_no) || empty($mname) || empty($c_name) || empty($c_name) || empty($d_date) || empty($c_by) || empty($n_by) || empty($pages) || empty($quantity) || empty($a_size) || empty($title) || empty($p_cover) || empty($color) || empty($binding) || empty($lamination) || empty($remarks) || empty($s_size) || empty($p_size) || empty($start) || empty($finish) || empty($t_received) || empty($d_received) || empty($no_out) || empty($no_sheet) || empty($no_ream) || empty($status)){
    echo'<script>swal("Please fill blank fields!","", "warning");</script>';
     echo'<script>alert("Please fill blank fields!");</script>';
  }else {
 
  $stmt = $conn->prepare("UPDATE `job_ticket` SET `job_order_control_no`=?,`machine_name`=?,`delivery_date`=?,`checked_by`=?,`noted_by`=?,`client_name`=?,`proj_name`=?,`title`=?,`quantity`=?,`actual_size`=?,`pages`=?,`paper_cover`=?,`color`=?,`binding`=?,`lamination`=?,`remarks`=?,`stock_size`=?,`printing_size`=?,`start`=?,`finish`=?,`time_received`=?,`date_received`=?,`no_of_out`=?,`no_of_sheet`=?,`no_of_ream`=?,`status`=?");
                              $stmt->bind_param('ssssssssssssssssssssssssss',$jo_no,$mname,$d_date,$c_by,$n_by,$c_name,$p_name,$title,$quantity,$a_size,$pages,$p_cover,$color,$binding,$lamination,$remarks,$s_size,$p_size,$start,$finish,$t_received,$d_received,$no_out,$no_sheet,$no_ream,$status);

                              if($stmt->execute()){
                                echo'<script>swal("Successfully Added!","", "success");</script>';
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Job Ticket')";
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