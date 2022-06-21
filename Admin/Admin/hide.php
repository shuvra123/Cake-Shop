<?php
session_start(); 
include "../connection.php";



if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$status = $_GET['active'];
	if ($status == 'inactive') {
		$sql = "UPDATE product SET active='active' WHERE id='$id'";

		if ($conn->query($sql) === TRUE) {
		  echo "<script>alert('Product status now active')</script>";
	      echo "<script>window.location = './product.php'</script>";
		} else {
		  echo "Error updating record: " . $conn->error;
		}
	}
	else if ($status == 'active') {
		$sql2 = "UPDATE product SET active='inactive' WHERE id='$id'";

		if ($conn->query($sql2) === TRUE) {
		  echo "<script>alert('Product status now inactive')</script>";
	      echo "<script>window.location = './product.php'</script>";
		} else {
		  echo "Error updating record: " . $conn->error;
		}
	}
	
}

?>