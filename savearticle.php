<?php
session_start();
include 'db.php';
if(isset($_POST['submitted']) == 1){
	$name= mysqli_real_escape_string($conn,$_POST['name']);
	$title= mysqli_real_escape_string($conn,$_POST['title']);
	$tag= mysqli_real_escape_string($conn,$_POST['tagline']);
	$article= $_POST['text'];
	$imgErr=$nameErr = $titleErr = $taglineErr = $articleErr ="";
	$name1 = $title1 = $tagline1 = $article1 = $img_name="";

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$flag=1;

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{

		if (empty($name)) {
			$flag=0;
			$_SESSION['nameErr'] = "Name is required";
		} else {
			$name1 = test_input($name);
    // check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name1)) {
				$flag=0;
				$_SESSION['nameErr'] = "Only letters and white space allowed"; 
			}
		}

		if (empty($title)) {
			$flag = 0;
			$_SESSION['titleErr'] = "Title is required";
		} else {
			$title1 = test_input($title);
    // check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$title1)) {
				$_SESSION['titleErr'] = "Only letters and white space allowed"; 
			}
		}

		if(empty($tag)) {
			$flag = 0;
			$_SESSION['taglineErr'] = "Tagline is required";
		}
		else {
			$tagline1 = test_input($tag);
		}


		if (empty($article)) {
			$flag = 0;
			$_SESSION['articleErr'] = "Article content field was empty";
		} else {	
			$article1 = $article;
		}

		$file_name=$_FILES["img"]["name"];
		$temp_name=$_FILES["img"]["tmp_name"];
		$imgtype=$_FILES["img"]["type"]; 
		$path_parts = pathinfo($_FILES["img"]["name"]);
		$extension = $path_parts['extension'];
		if (empty($file_name)||empty($extension)) {
			$flag = 0;
			$_SESSION['imgErr'] = "Image name cannot be blank";
		} else {
			$img_name = test_input($file_name);
		}
		$extension=strtolower($extension);
		if($extension=="jpeg" || $extension=="jpg" || $extension=="png")
		{
			$target_path = "uploads/".$img_name;
			move_uploaded_file($temp_name, $target_path) or die("your image can not be uploaded");
		}
		else
		{
			$flag=0;
			$_SESSION['errformat']="Wrong format";
		}
	}


	if($flag==1)
	{
		$category=mysqli_real_escape_string($conn,$_POST['cat']);
		$sql="INSERT INTO article (ar_id,author_name, title,tagline,content,im_name,category_id) VALUES ('', '$name1','$title1', '$tagline1','$article1','$img_name','$category')";
		$result=$conn->query($sql) or die(mysqli_error($conn));

		if($result)
		{
			$_SESSION['article_upload']=TRUE;
			header("Location: index.php");
		}		
		else
		{
			echo "Server Error";
		}
	}
	else 
	{
		header("Location: upload.php");
	}
} ?>