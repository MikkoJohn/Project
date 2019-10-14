  <!-- Sidebar -->
  <style>

@media screen and (max-width: 700px){
        .logo{
          height: 40px;
        }
}
  </style>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #4a89ff; overflow: true;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
        <!-- <div class="sidebar-brand"> -->
         <!-- <i class="#"></i> -->
         <center><img src="logo.png" class="logo" width="100%" height="60"></center> 
       <!-- </div> -->
       <!-- <div class="sidebar-brand-text mx-3"></div> -->
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard 
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

<?php 
//session_start();
//echo $_SESSION['acct_name'];

?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Production Head
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
         <a type="button" href="modal/admin/addaccount" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Account</center></span></a>
      </li>

      <li class="nav-item">
        <a type="button"  href="modal/admin/addmachine" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">

          <span><center>Add Machine</center></span></a>
      </li>
      <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Production Assistant
      </div>
       
        <li class="nav-item">
        <a type="button"  href="modal/admin/addjobticket" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Job Ticket</center></span></a>
      </li>

      <li class="nav-item">
         <a type="button" href="modal/admin/addworkorder" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">

          <span><center>Add Work Order</center></span></a>
             
      </li>

       <li class="nav-item">
        <a type="button"  href="modal/admin/addtransmittal" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">

          <span><center>Add Transmittal</center></span></a>
             
      </li>

      <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Production Planner
      </div>
       
        <li class="nav-item">
        <a type="button"  data-toggle="modal" data-target="#AddSchedule" style="background: #4a89ff; width: 100%; color: #006699 ">

          <span><center>Add Schedule</center></span></a>
      </li>

   
      <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Division Supervisor
      </div>
       
        <li class="nav-item">
        <a type="button"  href="modal/admin/addreport" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">

          <span><center>Add Report</center></span></a>
      </li>

     <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Production Operators
      </div>
       
        <li class="nav-item">
        <a type="button"  href="modal/admin/addmaterialrequest" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">

          <span><center>Materials Request</center></span></a>

      </li>

       <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        General Services
      </div>
       
        <li class="nav-item">
          <a type="button"  href="modal/admin/add_purchase_request" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">

          <span><center>Purchase Request</center></span></a>

         <li class="nav-item">
        <a type="button"  href="modal/admin/addmaterial" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Material</center></span></a>
             
              
      </li>

       <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Sales
      </div>
       
        <li class="nav-item">
        <a type="button" href="modal/admin/addjoborder" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Job Order</center></span></a>
            
      </li>

        <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Calendar
      </div>
       
        <li class="nav-item">
        <a type="button"   data-toggle="modal" data-target="#" style="background: #4a89ff; width: 100%; color: #006699 ">
          <span><center>Calendar Schedule</center></span></a>
              <?php 
               //include ('modal/admin/addoperator.php');
              ?>
      </li>

       <br>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Manage Settings
      </div>
       
        <li class="nav-item">
        <a type="button"  href="" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Client</center></span></a>
              <?php 
               //include ('modal/admin/addoperator.php');
              ?>
      </li>

      <li class="nav-item">
        <a type="button"  href="" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Suppliers</center></span></a>
              <?php 
               //include ('modal/admin/addoperator.php');
              ?>
      </li>

      <li class="nav-item">
        <a type="button"  href="" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Operators</center></span></a>
              <?php 
               //include ('modal/admin/addoperator.php');
              ?>
      </li>

      <li class="nav-item">
        <a type="button"  href="" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Pre-Press Activities</center></span></a>
              <?php 
               //include ('modal/admin/addoperator.php');
              ?>
      </li>

      <li class="nav-item">
        <a type="button"  href="" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Press Activities</center></span></a>
              <?php 
               //include ('modal/admin/addoperator.php');
              ?>
      </li>

      <li class="nav-item">
        <a type="button"  href="" style="background: #4a89ff; width: 100%; color: black; text-decoration: none;">
          <span><center>Add Post-Press Activities</center></span></a>
              <?php 
               //include ('modal/admin/addoperator.php');
              ?>
      </li>
    </ul>
    <!-- End of Sidebar -->

 <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


      <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
