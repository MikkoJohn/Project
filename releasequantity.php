<?php
session_start();
    include_once 'config.php';
    include 'includes/link.php';
    include 'includes/header.php';
$accname = $_SESSION['acct_name'];
$acctype = $_SESSION['sess_type'];

if(isset($_POST['add_quantity'])){
	 $_SESSION['material_id'] = $_POST['material_id'];
	$quantity = $_POST['quantity'];
	$sql="SELECT quantity FROM materials WHERE material_id = '".$_SESSION['material_id']."'";
	$result = mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result)){
		$_SESSION['quantity'] = $row['quantity'];
	}

	$total = $_SESSION['quantity'] - $quantity;
	$sql1 = "UPDATE materials SET quantity = '".$total."' WHERE material_id ='".$_SESSION['material_id']."'";
	if(mysqli_query($conn,$sql1)){
		 $sql2="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Release Materials Quantity($quantity)')";
                              mysqli_query($conn,$sql2);
		echo '<script>alert("Quantity Released!");</script>';
		 echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
	}else{
		echo '<script>alert("Error!");</script>';
	}
}else if(isset($_POST['release_quantity_genass'])){
	 $_SESSION['material_id'] = $_POST['material_id'];
	$quantity = $_POST['quantity'];
	$sql="SELECT quantity FROM materials WHERE material_id = '".$_SESSION['material_id']."'";
	$result = mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result)){
		$_SESSION['quantity'] = $row['quantity'];
	}

	$total = $_SESSION['quantity'] - $quantity;
	$sql1 = "UPDATE materials SET quantity = '".$total."' WHERE material_id ='".$_SESSION['material_id']."'";
	if(mysqli_query($conn,$sql1)){
		 $sql2="INSERT INTO `user_action`(`username`, `user_designation`, `action_date`, `action_done`) VALUES ('$accname','$acctype',now(),'Release Materials Quantity($quantity)')";
                              mysqli_query($conn,$sql2);
		echo '<script>alert("Quantity Released!");</script>';
		 echo "<script type='text/javascript'>location.href = 'index_genservass';</script>";
	}else{
		echo '<script>alert("Error!");</script>';
	}
}
?>