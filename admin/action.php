<?php
	
	require 'db_config.php';

	/// Code for product insert
	if(isset($_POST['btn-ProductInsert']))
	{
	

		$product_name=$_POST['product_name'];
		$cost_price=$_POST['cost_price'];
		$selling_price=$_POST['selling_price'];
		$quantity=$_POST['quantity'];
		$company_name=$_POST['company_name'];
		$company_address=$_POST['company_address'];
		$company_email=$_POST['company_email'];
		$unit_type = $_POST['unit_type'];

		if (isset($_FILES["fileToUpload"]["name"])) {
			
			$target_dir = "product_images/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			  
			  $uploadOk = 0;
			  header("Location: buy_products.php?error=imgerror");
			  die();
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			  } else {
			    echo "Sorry, there was an error uploading your file.";
			  }
			}


		}
		$sql = "INSERT INTO products (product_name, cost_price, selling_price,quantity,company_name,company_address,company_email,unit_type,product_image) VALUES ('$product_name','$cost_price','$selling_price','$quantity','$company_name','$company_address','$company_email','$unit_type','$target_file')";

		$db->query($sql);
		header("Location: buy_products.php?msg=inserted");

	}



	////code for deleting a product using the Product ID
	if(isset($_GET['delete_product_id'])){
		$productId=$_GET['delete_product_id'];

		$sql = "DELETE FROM products WHERE id='$productId';";

		$db->query($sql);

		header("Location: buy_products_list.php?delete=success");

	}



	///code for updating any product using their product Id
	if(isset($_POST['btn-ProductUpdate']))
	{

		$product_id=$_POST['product_id'];
		$product_name=$_POST['product_name'];
		$cost_price=$_POST['cost_price'];
		$selling_price=$_POST['selling_price'];
		$quantity=$_POST['quantity'];
		$company_name=$_POST['company_name'];
		$company_address=$_POST['company_address'];
		$company_email=$_POST['company_email'];
		$unit_type = $_POST['unit_type'];

		// die($product_name);

		$sql = "UPDATE products SET product_name='$product_name', cost_price='$cost_price' , selling_price='$selling_price' ,  quantity ='$quantity' , company_name='$company_name' , company_address='$company_address' , company_email='$company_email' ,  unit_type='$unit_type' WHERE id='$product_id';";

		$db->query($sql);


		if (isset($_FILES["fileToUploads"]["name"])) {
			
			$target_dir = "product_images/";
			$target_file = $target_dir . basename($_FILES["fileToUploads"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			  
			  $uploadOk = 0;
			  header("Location: edit_products.php?edit_product_id=$product_id&error=imgerror");
			  
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["fileToUploads"]["tmp_name"], $target_file)) {
			    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUploads"]["name"])). " has been uploaded.";

			    
			    $sql2 = "UPDATE products SET product_image='$target_file' WHERE id='$product_id';";

				$db->query($sql2);



			  } else {
			    echo "Sorry, there was an error uploading your file.";
			  }
			}


		}	

		header("Location: buy_products_list.php?update=success");

	}


?>