 <?php

//Note: first of all create folder 'uploads' and change its permission. To do so, go to terminal and write: sudo chmod -R 777 ~/.bitnami/stackman/machines/xampp/volumes/root/htdocs/php/uploads. and then enter. restart apache server (sudo apachectl restart). Also change file_uploads = on in php.ini file. 

  
	$target_dir = "uploads/"; //name of the directory where image will be loaded. Make sure the folder 'uploads' is in the same directory as the php file. 
  $target_file = $target_dir . basename($_FILES["img"]["name"]);

  
  /*basename is PHP inbuilt function which returns the base name of the file path. $_FILES: is an associative global array of items to be uploaded and has attributes: 
		1. $_FILES[input-field-name][name]: name of the file to be uploaded
		2. $_FILES[input-field-name][tmp_name]: a temporary address where file is located originally. 
		3. $_FILES[input-field-name][size]: returns size of the file
		4. $_FILES[input-field-name][type]: returns type of the file like. txt, .pdf, .gif, ...
		5. $_FILES[input-field-name][error]: returns the type of the errir occured during uploading. */

	$uploadOk = 1;   
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

  /* 
	pathinfo(path, options): is PHP inbuilt function use to return information about a path using a string or array. The return information contains: 
		1. directoryname
		2. basename
		3. extention

		by defualt, it returns all of them. But you can restrict it by using option parameter (PATHINFO_DIRNAME, PATHINFO_BASENAME, PATHINFO_EXTENSION) */

  
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    
    //getimagesize(path): returns an array with image size, width and height, and file type. it RETURNS 0 if no image or multiple image. 
	  if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".   "; //file extension: check["mime"]
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
    
	  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) //moves the uploaded file to destination 
	  {
	    echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
	  } else {
	    echo "Sorry, there was an error uploading your file.";
	  }
	}
?>