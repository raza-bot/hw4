<?php
	namespace sjsu_174\hw4\src\controllers;

	use sjsu_174\hw4\src\views\helper as helper;
	require_once('../views/helper/CreateNew.php'); 
		
		function upload() {
			$path = $_SERVER['DOCUMENT_ROOT']; 
			$target_dir = $path."/hw4/src/resources/"; 
			$target_file = $target_dir . basename($_FILES["img"]["name"]);
			
			$uploadOk = 1;   
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
			
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["img"]["tmp_name"]);
				
				if($check !== false) {
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}

				// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}

			// Check file size
			if ($_FILES["img"]["size"] > 2000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" 
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				
				$file_name = $_FILES["img"]["tmp_name"]; 
				$check = getimagesize($file_name);
				//upload path above, ext above
				$file = ''; 
				$sourceImgW = $check[0]; 
				$sourceImgH = $check[1]; 
				$sourceImgType = $check[2]; 
				
				switch ($sourceImgType) {

					case IMAGETYPE_JPEG:
							$resourceType = imagecreatefromjpeg($file_name); 
							$imagelayer = convertImage($resourceType, $sourceImgW, $sourceImgH); 
							echo $file . "HI I am HERE"; 
							$file = imagejpeg($imagelayer, $target_dir."active_image.".$imageFileType); 
							
							break;
					case IMAGETYPE_GIF:
							$resourceType = imagecreatefromgif($file_name); 
							$imagelayer = convertImage($resourceType, $sourceImgW, $sourceImgH); 
							$file = imagegif($imagelayer, $target_dir."active_image.".$imageFileType); 
							break;
					case IMAGETYPE_PNG:
							$resourceType = imagecreatefrompng($file_name); 
							$imagelayer = convertImage($resourceType, $sourceImgW, $sourceImgH); 
							$file = imagepng($imagelayer, $target_dir."active_image.".$imageFileType); 
							break;
					default:
						$uploadOk = 0; 
						break;
				}
			}

				if (!$uploadOk) {
					echo "image not supported"; 
					return; 
				}
			
				if (!move_uploaded_file($file, $target_file)) //moves the uploaded file to destination 
				{
					echo "The file uploaded successfully.";
					$help = new helper\CreateNew(); 
					$help->generateNum(); 
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}

		function convertImage($resourceType, $iw, $ih) {
			$desireW = 360; 
			$desireH = 360; 
			$imgLayer = imagecreatetruecolor($desireW, $desireH); 
			imagecopyresampled($imgLayer, $resourceType,0,0,0,0, $desireW, $desireH, $iw, $ih); 
			return $imgLayer; 
		}

		upload(); 

	