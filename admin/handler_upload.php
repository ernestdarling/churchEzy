<?php
include("includes/top.php");
//Check From Which Form this Request is Coming From
if (!isset($_GET['ref'])) {
	//Form Not From Any Location
	//Redirect with Error Message
	$URL = './';
	header("Location:$URL");
}
else {
	//Form is From A Source
	$ref = $_GET['ref'];
	if ($ref == 'logo') {
		//Form is to Upload a New Logo
		$target_dir = "../cdn/imageproxy/$admin_church/";
		$target_file = $target_dir . basename($_FILES["txtAppLogo"]["name"]);
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*/ Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		/*/ Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["txtAppLogo"]["size"] > 500000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "png") {
			$error = "Sorry, only PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//Rename
			$temp = explode(".", $_FILES["txtAppLogo"]["name"]);
			$newfilename = 'app_logo' . '.' . end($temp);
			if (move_uploaded_file($_FILES["txtAppLogo"]["tmp_name"], $target_dir.$newfilename)) {
				$success = "The file ". basename( $_FILES["txtAppLogo"]["name"]). " has been uploaded.";
				$URL = "cms_home.php?success=$success";
				header("Location:$URL");
			} else {
				$URL = "cms_home.php?error=$error";
				header("Location:$URL");
			}
		}
	}
	else if ($ref == 'slide') {
		//User Uploading New Slider for Homepage
		//Check slides and display them
		$all_files = scandir("../cdn/imageproxy/$admin_church/slides/",1);
		//$last_files = preg_replace('/\\.[^.\\s]{3,4}$/', '', $all_files[0]);
		
		//Check DB for Current Slides from this Church
		$query_slides = mysql_query("SELECT * FROM slides WHERE SlideChurch = '$admin_church' ORDER BY SlideID DESC LIMIT 1");
		while ($row_slides = mysql_fetch_array($query_slides, MYSQL_ASSOC)) {
			//Get Last ID from this Church
			$last_slide = $row_slides['SlideID'];
		}
		
		//Next Slide Number
		$next_slide = $last_slide + 1;
		
		//Form is to Upload a New Slide
		$target_dir = '../cdn/imageproxy/'.$admin_church.'/slides/';
		$target_file = $target_dir . basename($_FILES["txtSlide"]["name"]);
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*/ Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		/*/ Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		/*/ Check file size
		if ($_FILES["txtSlide"]["size"] > 500000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}*/
		// Allow certain file formats
		if($imageFileType != "png") {
			//echo $error = "Sorry, only PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//Rename
			$temp = explode(".", $_FILES["txtSlide"]["name"]);
			$newfilename = $next_slide . '.' . end($temp);
			if (move_uploaded_file($_FILES["txtSlide"]["tmp_name"], $target_dir.$newfilename)) {
				//$success = "The file ". basename( $_FILES["txtSlide"]["name"]). " has been uploaded.";
				
				//Now Add File to Slides in Database
				$slide_link = 'http://cdn.churchezy.com/imageproxy/'.$admin_church.'/slides/'.$newfilename;
				$slide_added = time();			
				//Insert Into DB NOW
				mysql_query("INSERT INTO slides (SlideChurch, SlideLink, SlideFileType, SlideStatus, SlideAdded) VALUES ('$admin_church', '$slide_link', 'PNG', 'active', '$slide_added')");			
				//Now Redirect
				$URL = "cms_home.php?success=$success";
				header("Location:$URL");
			} else {
				$URL = "cms_home.php?error=$error";
				header("Location:$URL");
			}
		}
	}
	else if ($ref == 'header_giving') {
		//Admin Uploading New Giving Header Image
		$target_dir = "../cdn/imageproxy/$admin_church/headers/";
		$target_file = $target_dir . basename($_FILES["txtHeader"]["name"]);
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*/ Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		/*/ Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["txtHeader"]["size"] > 500000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "png") {
			$error = "Sorry, only PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//Rename
			$temp = explode(".", $_FILES["txtHeader"]["name"]);
			$newfilename = 'donate' . '.' . end($temp);
			if (move_uploaded_file($_FILES["txtHeader"]["tmp_name"], $target_dir.$newfilename)) {
				$success = "The file ". basename( $_FILES["txtHeader"]["name"]). " has been uploaded.";
				$URL = "cms_giving.php?success=$success";
				header("Location:$URL");
			} else {
				$URL = "cms_giving.php?error=$error";
				header("Location:$URL");
			}
		}
		
	}
	else if ($ref == 'header_about') {
		//Admin Uploading New About Header Image
		$target_dir = "../cdn/imageproxy/$admin_church/headers/";
		$target_file = $target_dir . basename($_FILES["txtHeader"]["name"]);
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*/ Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		/*/ Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["txtHeader"]["size"] > 500000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "png") {
			$error = "Sorry, only PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//Rename
			$temp = explode(".", $_FILES["txtHeader"]["name"]);
			$newfilename = 'about' . '.' . end($temp);
			if (move_uploaded_file($_FILES["txtHeader"]["tmp_name"], $target_dir.$newfilename)) {
				$success = "The file ". basename( $_FILES["txtHeader"]["name"]). " has been uploaded.";
				$URL = "cms_about.php?success=$success";
				header("Location:$URL");
			} else {
				$URL = "cms_about.php?error=$error";
				header("Location:$URL");
			}
		}
	}
	else if ($ref == 'header_times') {
		//Admin Uploading New Service Times Header Image
		$target_dir = "../cdn/imageproxy/$admin_church/headers/";
		$target_file = $target_dir . basename($_FILES["txtHeader"]["name"]);
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*/ Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		/*/ Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["txtHeader"]["size"] > 500000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "png") {
			$error = "Sorry, only PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//Rename
			$temp = explode(".", $_FILES["txtHeader"]["name"]);
			$newfilename = 'service' . '.' . end($temp);
			if (move_uploaded_file($_FILES["txtHeader"]["tmp_name"], $target_dir.$newfilename)) {
				$success = "The file ". basename( $_FILES["txtHeader"]["name"]). " has been uploaded.";
				$URL = "cms_times.php?success=$success";
				header("Location:$URL");
			} else {
				$URL = "cms_times.php?error=$error";
				header("Location:$URL");
			}
		}
	}
	else if ($ref == 'header_prayer') {
		//Admin Uploading New Prayer Request Header Image
		$target_dir = "../cdn/imageproxy/$admin_church/headers/";
		$target_file = $target_dir . basename($_FILES["txtHeader"]["name"]);
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*/ Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		/*/ Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["txtHeader"]["size"] > 500000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "png") {
			$error = "Sorry, only PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//Rename
			$temp = explode(".", $_FILES["txtHeader"]["name"]);
			$newfilename = 'prayer' . '.' . end($temp);
			if (move_uploaded_file($_FILES["txtHeader"]["tmp_name"], $target_dir.$newfilename)) {
				$success = "The file ". basename( $_FILES["txtHeader"]["name"]). " has been uploaded.";
				$URL = "cms_prayer.php?success=$success";
				header("Location:$URL");
			} else {
				$URL = "cms_prayer.php?error=$error";
				header("Location:$URL");
			}
		}
	}
	else if ($ref == 'header_event') {
		//Admin Uploading New Contact Us Header Image
		$target_dir = "../cdn/imageproxy/$admin_church/headers/";
		$target_file = $target_dir . basename($_FILES["txtHeader"]["name"]);
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*/ Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}*/
		/*/ Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["txtHeader"]["size"] > 500000) {
			$error = "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "png") {
			$error = "Sorry, only PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//Rename
			$temp = explode(".", $_FILES["txtHeader"]["name"]);
			$newfilename = 'event' . '.' . end($temp);
			if (move_uploaded_file($_FILES["txtHeader"]["tmp_name"], $target_dir.$newfilename)) {
				$success = "The file ". basename( $_FILES["txtHeader"]["name"]). " has been uploaded.";
				$URL = "cms_events.php?success=$success";
				header("Location:$URL");
			} else {
				$URL = "cms_events.php?error=$error";
				header("Location:$URL");
			}
		}
	}
}
?>