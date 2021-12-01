<?php
    require "config.php";
    require "models/db.php";
	require "models/product.php";
	require "models/protype.php";
	require "models/manufacture.php";
	if($_POST['action'] == 'product' && isset($_POST['id']))
	{
		$id = $_POST['id'];
		$product = new Product();
		$prodarr = $product->getProductById($id);
		if(isset($_POST['name']) && isset($_POST['manu']) && isset($_POST['type'])
		&& isset($_POST['price']) && isset($_POST['desc']) && isset($_POST['feature']))
		{
			$name = $_POST['name'];
			$manu_id = $_POST['manu'];
			$type_id = $_POST['type'];	
            $price = $_POST['price'];	
			$pro_image = $prodarr['pro_image'];	
			$description = $_POST['desc'];
			$feature = $_POST['feature'];
			//name of image 			
			if($_FILES['fileUpload']['name'] == "")
			{
				$product->updateProduct($id,$name,$manu_id,$type_id,$price,$pro_image,$description,$feature);
				echo "Update succesfully!!! .<a href='javascript: history.go(-2)'>Go Back</a>";
			}
			else{				
				$fileUpload = $_FILES['fileUpload'];
				$pro_image = $fileUpload['name'];
				$target_file = '../img/'.$pro_image;
				$uploadOk = 1;
				//check exist image
				if(file_exists($target_file))
				{
					echo "Image already exists .<a href='javascript: history.go(-1)'>Go Back</a>";					
					$uploadOk = 0;
					die();
				}
				else
				{
					$uploadOk = 1;
				}
				//kiem tra dung dinh dang anh 
				if($fileUpload['type'] == 'image/jpeg' || $fileUpload['type'] == 'image/jpg' || $fileUpload['type'] == 'image/png')
				{
					$uploadOk = 1;
				}
				else {					
					echo "only JPG, JPEG, PNG & GIF files are allowed .<a href='javascript: history.go(-1)'>Go Back</a>";
					$uploadOk = 0;
					die();
				}
				//check file size				
				if($uploadOk == 0)
				{
					echo "Sorry, your file was not uploaded. .<a href='javascript: history.go(-1)'>Go Back</a>";
					die();
				}
				else {
					move_uploaded_file($fileUpload['tmp_name'],$target_file);
					$product->updateProduct($id,$name,$manu_id,$type_id,$price,$pro_image,$description,$feature);
					echo "Update succesfully!!! .<a href='javascript: history.go(-2)'>Go Back</a>";
				}				
			}			
		}
	}