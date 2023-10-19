<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","root","123456789","files") or die("Error Connect to Database");
		$objDB = mysql_select_db("files");

		$strSQL = "UPDATE files ";
		$strSQL .=" SET NAME = '".$_POST["txtName"]."' WHERE FilesID = '".$_GET["FilesID"]."' ";
		$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("myfile/".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
			$strSQL = "UPDATE files ";
			$strSQL .=" SET FilesName = '".$_FILES["filUpload"]["name"]."' WHERE FilesID = '".$_GET["FilesID"]."' ";
			$objQuery = mysql_query($strSQL);		

			echo "Copy/Upload Complete<br>";

		}
	}
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>