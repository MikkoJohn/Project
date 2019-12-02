  <?php  
  session_start();
    include_once '../../config.php';
    include '../../includes/link.php';
    include '../../includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];
  ?>

   <a href="../../index_sales" class="btn btn-primary" style="margin:2%">BACK</a>
        <div class="container" style="width: 100%;">    
        <div id="loginbox" style="margin-top:0px;" class="mainbox col-lg-12 col-lg-offset-2 col-lg-8">                    
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Update Job Ticket</div>
                </div>     

                <div style="padding-top:10px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                     <form method="POST" onsubmit="return confirm('Are you sure?')">
                <?php

                if(isset($_POST['view_jticket'])){
                   $_SESSION['ticket_no'] = $_POST['ticket_no'];
                  $ticket_no = $_POST['ticket_no'];
                  $_SESSION['ticket_no'] = $_POST['ticket_no'];
                  $sql = "SELECT * FROM job_ticket where ticket_no = '".$_SESSION['ticket_no']."'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
              if($row['status'] != "Disabled"){
                    echo '
                       
                           <div class="row">
                             <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Job Order No.:</h6>
                                    <input type="text" class="form-control" name="jo_no" placeholder="Job Order No" value="'.$row['job_order_control_no'].'" required>
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Machine Name:</h6>
                             <select class="form-control" name="mname" required>
                             ';

                             if($row['machine_name'] == ""){
                                   echo '<option value="NULL" selected="true" disabled>SELECT MACHINE NAME</option>
                             ';
                           }else {
                              echo '<option value="'.$row['machine_name'].'">'.$row['machine_name'].'</option>
                             ';
                           }
                    $sql_machine = "SELECT machine_name FROM machine WHERE machine_name != '".$row['machine_name']."'";
                    $result_machine = mysqli_query($conn,$sql_machine);
                    while($rows = mysqli_fetch_assoc($result_machine)){
                      echo '
                            <option value="'.$rows['machine_name'].'">'.$rows['machine_name'].'</option>
                      ';
                    }

                                    // <input type="text" class="form-control" name="mname" placeholder="Machine Name" value="'.$row['machine_name'].'">
                  echo '
                    </select>
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Client Name:</h6>
                                    <input type="text" class="form-control" name="c_name" placeholder="Client Name" value="'.$row['client_name'].'" required>
                                  </div>
                                </div>
                               <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Project Name:</h6>
                                    <input type="text" class="form-control" name="p_name" placeholder="Project Name" value="'.$row['proj_name'].'" required>
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" name="d_date" placeholder="" value="'.$row['delivery_date'].'" required>
                                  </div>
                            </div>
                           
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Title:</h6>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="'.$row['title'].'" required>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Quantity:</h6>
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="'.$row['quantity'].'" required>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                             <div class="form-group">
                             <h6>Actual Size:</h6>
                                    <input  type="number" class="form-control" name="a_size" placeholder="Actual Size" value="'.$row['actual_size'].'" required>
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                             <h6>Pages:</h6>
                                    <input  type="text" class="form-control" name="pages" placeholder="Pages" value="'.$row['pages'].'" required>
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                              <div class="form-group">
                              <h6>Paper Cover:</h6>
                                    <input  type="text" class="form-control" name="p_cover" placeholder="Paper Cover" value="'.$row['paper_cover'].'" required>
                                  </div>
                                </div>
                              <div class="col col-sm-4">
                              <div class="form-group">
                              <h6>Color:</h6>
                      <select class="form-control">
                            ';
                  if($row['color'] =="1 Color - Black"){
                    echo '
                        <option selected="true" value="1 Color - Black">1 Color - "Black"</option>
                        <option value="2 Color - Black, Cyan">2 Color - "Black, Cyan"</option>
                        <option value="3 Color - Black, Magenta">3 Color - "Black, Magenta"</option>
                        <option value="4 Color - Black, Yellow">4 Color - "Black, Yellow"</option>
                        <option value="5 Color - CMYK">5 Color - "CMYK"</option>
                    ';
                  }else if($row['color'] =="2 Color - Black, Cyan"){
                    echo '
                        <option value="1 Color - Black">1 Color - "Black"</option>
                        <option selected="true" value="2 Color - Black, Cyan">2 Color - "Black, Cyan"</option>
                        <option value="3 Color - Black, Magenta">3 Color - "Black, Magenta"</option>
                        <option value="4 Color - Black, Yellow">4 Color - "Black, Yellow"</option>
                        <option value="5 Color - CMYK">5 Color - "CMYK"</option>
                    ';
                  }else if($row['color'] =="3 Color - Black, Magenta"){
                    echo '
                        <option value="1 Color - Black">1 Color - "Black"</option>
                        <option value="2 Color - Black, Cyan">2 Color - "Black, Cyan"</option>
                        <option selected="true" value="3 Color - Black, Magenta">3 Color - "Black, Magenta"</option>
                        <option value="4 Color - Black, Yellow">4 Color - "Black, Yellow"</option>
                        <option value="5 Color - CMYK">5 Color - "CMYK"</option>
                    ';
                  }else if($row['color'] =="4 Color - Black, Yellow"){
                    echo '
                        <option value="1 Color - Black">1 Color - "Black"</option>
                        <option value="2 Color - Black, Cyan">2 Color - "Black, Cyan"</option>
                        <option value="3 Color - Black, Magenta">3 Color - "Black, Magenta"</option>
                        <option selected="true" value="4 Color - Black, Yellow">4 Color - "Black, Yellow"</option>
                        <option value="5 Color - CMYK">5 Color - "CMYK"</option>
                    ';
                  }else if($row['color'] =="5 Color - CMYK"){
                    echo '
                        <option value="1 Color - Black">1 Color - "Black"</option>
                        <option value="2 Color - Black, Cyan">2 Color - "Black, Cyan"</option>
                        <option value="3 Color - Black, Magenta">3 Color - "Black, Magenta"</option>
                        <option value="4 Color - Black, Yellow">4 Color - "Black, Yellow"</option>
                        <option selected="true" value="5 Color - CMYK">5 Color - "CMYK"</option>
                    ';
                  }

               echo '

                      </select>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group"> 
                                <h6>Select Binding Method:</h6>                         
                                   <select class="form-control" name="binding" required>
                          <option value="'.$row['binding'].'">'.$row['binding'].'</option>
                                ';
                   $sql_act = "SELECT activity FROM post_press WHERE activity != '".$row['binding']."'";
                $res = mysqli_query($conn,$sql_act);
                while($row_act = mysqli_fetch_assoc($res)){
                    echo '
                      <option value="'.$row_act['activity'].'">'.$row_act['activity'].'</option>
                    ';



                                echo '

                                </select>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">
                                <h6>Lamination:</h6>                          
                                    <input  type="text" class="form-control" placeholder="Lamination" name="lamination" value="'.$row['lamination'].'" required>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">    
                                <h6>Remarks:</h6>                      
                                    <input  type="text" class="form-control" placeholder="Remarks" name="remarks" value="'.$row['remarks'].'" required>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h6>Stock Size:</h6>
                                <select class="form-control" name="s_size">
                        ';
                  if($row['stock_size'] == "" || $row['stock_size'] == "0"){
                        echo '
                        <option selected="true" value="NULL" disabled>SELECT STOCK SIZE</option>
                                ';
                $sql_size = "SELECT * FROM materials WHERE category = 'Paper' ";
                $result = mysqli_query($conn,$sql_size);
                while($row_size = mysqli_fetch_assoc($result)){
                  echo '
                          <option value="'.$row_size['item_name'].'">'.$row_size['item_name'].'</option>
                  ';
                      }
                    }
                    else {
                  echo ' <option value="'.$row['stock_size'].'">'.$row['stock_size'].'</option>';
              $sql_size = "SELECT * FROM materials WHERE category = 'Paper' ";
                $result = mysqli_query($conn,$sql_size);
                while($row_size = mysqli_fetch_assoc($result)){
                  echo '
                          <option value="'.$row_size['item_name'].'">'.$row_size['item_name'].'</option>
                  ';
                            
                          }
                           }         
                          echo '
                          </select>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group"> 
                                <h6>Printing Size:</h6>   
                                  ';
                          if($row['stock_size'] =="0"){
                            echo '              
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size" value="" required>
                            ';
                          }
                          else {
                             echo '              
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size" value="'.$row['printing_size'].'" required>
                            ';
                          }

                            echo '
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Start:</h5>                          
                                    <input  type="date" id="start" class="form-control" placeholder="" name="start" value="'.$row['start'].'" required>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Finish:</h5>                          
                                    <input  type="date" id="finish" class="form-control" placeholder="" name="finish" value="'.$row['finish'].'" required>
                                  </div>
                                </div>
                                 <div class="col col-sm-6">
                            <div class="form-group">
                            <h6>Checked By:</h6>
                                    <input type="text" class="form-control" name="c_by" placeholder="Checked By" value="'.$row['checked_by'].'" required>
                                  </div>
                            </div>
                            <div class="col col-lg-6">
                            <div class="form-group">
                            <h6>Noted By:</h6>
                                    <input type="text" class="form-control" name="n_by" placeholder="Noted By" value="'.$row['noted_by'].'" required>
                                  </div>
                            </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Time Received:</h5>                          
                                    <input  type="text" class="form-control" placeholder="" name="t_received" value="'.$row['date_checked'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Date Received:</h5>                          
                                    <input  type="text" class="form-control" placeholder="" name="d_received" value="'.$row['date_noted'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group"> 
                                <h6>No. of Out:</h6> 
                                ';                
                        if($row['no_of_sheet'] == "0"){
                          echo '                  
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out" value="" required>
                        ';
                      }else {
                        echo '                  
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out" value="'.$row['no_of_out'].'" required>
                        ';
                      }

                        echo '
                                </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group"> 
                                <h6>No. of Sheet:</h6>  
                                ';                
                        if($row['no_of_sheet'] == "0"){
                          echo '
                                <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet" value="" required>
                          ';
                        }else {
                        echo '      
                                    <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet" value="'.$row['no_of_sheet'].'" required>
                              ';
                        }

                          echo '
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">
                                <h6>No. of Ream:</h6>  
                      ';
                      if($row['no_of_ream'] == "0"){
                          echo '
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream" value=""required>
                      ';
                    }else {
                       echo '
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream" value="'.$row['no_of_ream'].'" required>
                      ';
                    }

                        echo '
                                  </div>
                                </div>
                                
                                  <div class="col col-sm-12">
                                    <div class="form-group">  
                           <button name="updatejo" class="btn btn-warning btn-md" value="UPDATE" disabled><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update</button>  
                                </div>
                              </div>
                            </form>  
                 
                    ';
                  
                }
              }else {
                  echo '

                     <div class="row">
                             <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Job Order No.:</h6>
                                    <input type="text" class="form-control" name="jo_no" placeholder="Job Order No" value="'.$row['job_order_control_no'].'" disabled>
                                  </div>
                              </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Machine Name:</h6>
                             <select class="form-control" name="mname" disabled>
                             <option value="'.$row['machine_name'].'">'.$row['machine_name'].'</option>
                             </select>
                             </div>
                             </div>
                             <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Client Name:</h6>
                                    <input type="text" class="form-control" name="c_name" placeholder="Client Name" value="'.$row['client_name'].'" disabled>
                                  </div>
                                </div>
                               <div class="col col-sm-3">
                             <div class="form-group">
                             <h6>Project Name:</h6>
                                    <input type="text" class="form-control" name="p_name" placeholder="Project Name" value="'.$row['proj_name'].'" disabled>
                                  </div>
                                </div>
                             <div class="col col-sm-12">
                            <div class="form-group">
                              <h5>Delivery Date:</h5>
                                    <input type="date" class="form-control" name="d_date" placeholder="" value="'.$row['delivery_date'].'" disabled>
                                  </div>
                            </div>
                           
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Title:</h6>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="'.$row['title'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                            <h6>Quantity:</h6>
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="'.$row['quantity'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-sm-4">
                             <div class="form-group">
                             <h6>Actual Size:</h6>
                                    <input  type="number" class="form-control" name="a_size" placeholder="Actual Size" value="'.$row['actual_size'].'" disabled>
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                             <div class="form-group">
                             <h6>Pages:</h6>
                                    <input  type="text" class="form-control" name="pages" placeholder="Pages" value="'.$row['pages'].'" disabled>
                                  </div>
                                </div>
                             <div class="col col-sm-4">
                              <div class="form-group">
                              <h6>Paper Cover:</h6>
                                    <input  type="text" class="form-control" name="p_cover" placeholder="Paper Cover" value="'.$row['paper_cover'].'" disabled>
                                  </div>
                                </div>
                              <div class="col col-sm-4">
                              <div class="form-group">
                              <h6>Color:</h6>
                      <select class="form-control" disabled>
                      <option>'.$row['color'].'</option>
                      </select>
                      </div>
                      </div>
                       <div class="col col-sm-4">
                                <div class="form-group"> 
                                <h6>Select Binding Method:</h6>                         
                           <select class="form-control" name="binding" disabled>


                      <option value="">'.$row['binding'].'</option>
                      </select>
                      </div>
                      </div>

                       <div class="col col-sm-4">
                                <div class="form-group">
                                <h6>Lamination:</h6>                          
                                    <input  type="text" class="form-control" placeholder="Lamination" name="lamination" value="'.$row['lamination'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">    
                                <h6>Remarks:</h6>                      
                                    <input  type="text" class="form-control" placeholder="Remarks" name="remarks" value="'.$row['remarks'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h6>Stock Size:</h6>
                                ';
                          if($row['stock_size'] =="0"){
                            echo '
                                <input  type="text" class="form-control" placeholder="Stock Size" name="s_size" value="">
                            ';
                          }else {
                             echo '
                                <input  type="text" class="form-control" placeholder="Stock Size" name="s_size" value="'.$row['stock_size'].'" disabled>
                            ';
                          }
                                    
                          echo '
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group"> 
                                <h6>Printing Size:</h6>   
                                  ';
                          if($row['stock_size'] =="0"){
                            echo '              
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size" value="" disabled>
                            ';
                          }else {
                             echo '              
                                    <input  type="text" class="form-control" placeholder="Printing Size" name="p_size" value="'.$row['printing_size'].'" disabled>
                            ';
                          }

                            echo '
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Start:</h5>                          
                                    <input  type="date" id="start" class="form-control" placeholder="" name="start" value="'.$row['start'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Finish:</h5>                          
                                    <input  type="date" id="finish" class="form-control" placeholder="" name="finish" value="'.$row['finish'].'" disabled>
                                  </div>
                                </div>
                                 <div class="col col-sm-6">
                            <div class="form-group">
                            <h6>Checked By:</h6>
                                    <input type="text" class="form-control" name="c_by" placeholder="Checked By" value="'.$row['checked_by'].'" disabled>
                                  </div>
                            </div>
                            <div class="col col-lg-6">
                            <div class="form-group">
                            <h6>Noted By:</h6>
                                    <input type="text" class="form-control" name="n_by" placeholder="Noted By" value="'.$row['noted_by'].'" disabled>
                                  </div>
                            </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Time Received:</h5>                          
                                    <input  type="text" class="form-control" placeholder="" name="t_received" value="'.$row['date_checked'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                <h5>Date Received:</h5>                          
                                    <input  type="text" class="form-control" placeholder="" name="d_received" value="'.$row['date_noted'].'" disabled>
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group"> 
                                <h6>No. of Out:</h6> 
                                ';                
                        if($row['no_of_sheet'] == "0"){
                          echo '                  
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out" value="" disabled>
                        ';
                      }else {
                        echo '                  
                                    <input  type="number" class="form-control" placeholder="No of Out" name="no_out" value="'.$row['no_of_out'].'" disabled>
                        ';
                      }

                        echo '
                                </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group"> 
                                <h6>No. of Sheet:</h6>  
                                ';                
                        if($row['no_of_sheet'] == "0"){
                          echo '
                                <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet" value="" disabled>
                          ';
                        }else {
                        echo '      
                                    <input  type="number" class="form-control" placeholder="No of Sheet" name="no_sheet" value="'.$row['no_of_sheet'].'" disabled>
                              ';
                        }

                          echo '
                                  </div>
                                </div>
                                <div class="col col-sm-4">
                                <div class="form-group">
                                <h6>No. of Ream:</h6>  
                      ';
                      if($row['no_of_ream'] == "0"){
                          echo '
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream" value=""disabled>
                      ';
                    }else {
                       echo '
                                    <input  type="number" class="form-control" placeholder="No of Ream" name="no_ream" value="'.$row['no_of_ream'].'" disabled>
                      ';
                    }

                        echo '
                                  </div>
                                </div>
                  ';
                }

          
                }
              }

                ?>
                
                   
                        </div>                     
                    </div>  
                </div>                      
            </div>
                   
   
<?php 


if(isset($_POST['updatejo'])){
    // echo '<script>alert("'.$_SESSION['ticket_no'].'");</script>';
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
  $status = "Pending";
  $now = date("Y-m-d H:i:s");

 
  $sql_jt = "UPDATE `job_ticket` SET `job_order_control_no`='$jo_no',`machine_name`='$mname',`delivery_date`='$d_date',`checked_by`='$c_by',`noted_by`='$n_by',`client_name`='$c_name',`proj_name`='$p_name',`title`='$title',`quantity`='$quantity',`actual_size`='$a_size',`pages`='$pages',`paper_cover`='$p_cover',`color`='$color',`binding`='$binding',`lamination`='$lamination',`remarks`='$remarks',`stock_size`='$s_size',`printing_size`='$p_size',`start`='$start',`finish`='$finish',`time_received`='$t_received',`date_received`='$d_received',`no_of_out`='$no_out',`no_of_sheet`='$no_sheet',`no_of_ream`='$no_ream',`status`='$status' WHERE ticket_no = '".$_SESSION['ticket_no']."'";
                 mysqli_query($conn,$sql_jt);
                               
                                 echo '<script>alert("Successfully Updated!");</script>';
                                 
                                 $sql1="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype','$now','Updated Job Ticket')";
                              mysqli_query($conn,$sql1);
                   
                               echo "<script type='text/javascript'>location.href = '../index_admin';</script>";
                            
                    
                              


}


?>
<script>
  $(document).ready(function(){
var end = $('#start').val();
$('#start').show();
  });
  $(document).ready(function(){
   // alert(end);
   $('#start').change(function(){
    document.getElementById('finish').setAttribute("min",$('#start').val());
   });
  });


</script>    