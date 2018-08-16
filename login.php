<?php
session_unset();
 session_start();
 include 'db.php';
   if(isset($_POST['submitted']) == 1){
   		$pwd= mysqli_real_escape_string($conn,$_POST['pwd']);
   		$pwd = md5($pwd);
	    $email= mysqli_real_escape_string($conn,$_POST['email']);
		$sql="SELECT * FROM USER where pwd='$pwd' and email='$email'";
		$result=$conn->query($sql);
		$output= $result->fetch_array(MYSQLI_ASSOC);
		if($result->num_rows && $output['role'] == 0){
			$_SESSION["Authentication"] = "True";
			$_SESSION["ADMIN"] = "false";
			header("Location: index.php");	
		}
		else if($result->num_rows && $output['role'] == 1){
	        $_SESSION["Authentication"] = "True";
	        $_SESSION["ADMIN"] = "True";
	        header("Location: try_admin.php");
	    }
		   else {
		$_SESSION["Authentication"] = "Fail";
		header("Location: login_signup.php");	
	   	}
   }
   else {
	$_SESSION["Authentication"] = "Fail";
	header("Location: login_signup.php");	
   }
?>
  
  