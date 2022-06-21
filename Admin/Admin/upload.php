<?php
session_start(); 
include "../connection.php";


if (isset($_POST['submit'])) {
	

	echo "<pre>";
	print_r($_FILES['p_image']);
	echo "</pre>";

	$img_name = $_FILES['p_image']['name'];
	$img_size = $_FILES['p_image']['size'];
	$tmp_name = $_FILES['p_image']['tmp_name'];
	$error = $_FILES['p_image']['error'];

	$name = $_POST['pname'];
	$code = $_POST['pcode'];
	$price = $_POST['pprice'];
	$category = $_POST['category'];
	$status = 'active';


	if ($error === 0) {
		if ($img_size > 1000000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO product(category,name,code,image,price,active) 
				        VALUES('$category','$name','$code','$new_img_name','$price','$status')";
				mysqli_query($conn, $sql);
				header("Location: product.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: productform.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: productform.php?error=$em");
	}

}else {
	// header("Location: index.php");
}

?>