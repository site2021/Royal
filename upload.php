<?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }

    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
  		echo('upload');
	}

	if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
		echo('uploadfile');
	}

	// get details of the uploaded file
	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
	$fileName = $_FILES['uploadedFile']['name'];
	$fileSize = $_FILES['uploadedFile']['size'];
	$fileType = $_FILES['uploadedFile']['type'];
	$fileNameCmps = explode(".", $fileName);
	$fileExtension = strtolower(end($fileNameCmps));

	$newFileName = md5(time() . $fileName) . '.' . $fileExtension;

	$allowedfileExtensions = array('JPG', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
	if (in_array($fileExtension, $allowedfileExtensions)) {
		echo('extension');
	}

	// directory in which the uploaded file will be moved
	$uploadFileDir = 'archivos_cargados/';
	$dest_path = $uploadFileDir . $newFileName;
	 
	if(move_uploaded_file($fileTmpPath, $dest_path))
	{
		echo('ENVIADO');
	  	$message ='File is successfully uploaded.';
	}
	else
	{
	  $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
	}

?>