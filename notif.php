<!DOCTYPE html>
<html>
<head>
 <title>Notification using PHP Ajax Bootstrap</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <br /><br />
 <div class="container">
    <nav class="navbar navbar-inverse">
     <div class="container-fluid">
      <div class="navbar-header">
       <a class="navbar-brand" href="#">PHP Notification Tutorial First Form</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
        <ul class="dropdown-menu"></ul>
       </li>
      </ul>
     </div>
    </nav>
  <br />
  <form method="post" id="comment_form">
    <div class="row">
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="sales_no" placeholder="Sales No." required>
                                  </div>
                              </div>
                             <div class="col col-sm-6">
                             <div class="form-group">
                                    <input type="text" class="form-control" name="c_name" placeholder="Client Name" required>
                                  </div>
                                </div>
                             <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="p_name" placeholder="Project Name" required>
                                  </div>
                            </div>
                            <div class="col col-sm-6">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="d_title" placeholder="Item Description and Title" required>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="c_machine" placeholder="Costing based on Machine" required>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                               <!--  <select>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select> -->
                                    <input type="text" class="form-control" name="f_required" placeholder="Finishing Required" required>
                                  </div>
                            </div>
                            <div class="col col-lg-4">
                            <div class="form-group">
                                    <input type="text" class="form-control" name="p_required" placeholder="Packaging Required" required>
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
                                    <input  type="text" class="form-control" name="p_used" placeholder="Paper to be used" required>
                                  </div>
                                </div>
                              <div style="margin:0px 12px 0px 12px" class="et form-group">
                                    <h5>Estimated Transmittal Data to Warehouse:</h5>
                                    <input  type="date" class="form-control" name="e_transmittal"  required>
                                  </div>
                              <div style="margin:0px 12px 15px 12px" class="cr form-group">
                                    <h5>Client Requested Delivery Date:</h5>
                                    <input  type="date" class="form-control" name="c_delivery" required>
                                  </div>
                                <div class="col col-sm-6">
                                <div class="form-group">                          
                                    <input  type="textarea" class="form-control" placeholder="Remarks" name="remarks" required>
                                  </div>
                                </div>
                                <div class="col col-sm-6">
                                <div class="form-group">
                                  <select name="status" class="form-control" required="">
                                  <option selected="true" value="NULL" disabled="">SELECT STATUS</option>
                                 <option value="Pending">Pending</option>
                                 <option value="Acknowledged">Acknowledged</option>
                                 <option value="Rejected">Rejected</option>
                                </select> 
                                    <input  type="textarea" class="form-control" placeholder="Status" name="status" required>
                                  </div>
                                </div>
                            <div class="col-lg-12 controls">
                                      <input type="submit" name="post" id="post" class="btn btn-info" value="Post">
                                    </div>
                                </div>
                              </div>
  </form>
 </div>
</body>
</html>
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records
$('#comment_form').on('submit', function(event){
 event.preventDefault();
 if($('#subject').val() != '' && $('#comment').val() != '')
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#comment_form')[0].reset();
    load_unseen_notification();
   }
  });
 }
 else
 {
  alert("All Fields are Required");
 }
});
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>