<?php
session_start(); 
include "../connection.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$sql = "DELETE FROM product WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
	  echo "<script>alert('Product deleted successfully')</script>";
      echo "<script>window.location = './product.php'</script>";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}


}else {
	// header("Location: index.php");
}

?>