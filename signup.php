<?php
include 'db.php';
session_start();

if(isset($_POST['submitted']) == 1){
 $first= mysqli_real_escape_string($conn,$_POST['first']);
 $last= mysqli_real_escape_string($conn,$_POST['last']);
 $pwd= mysqli_real_escape_string($conn,$_POST['pwd']);
 $email= mysqli_real_escape_string($conn,$_POST['email']);

$sql="SELECT count(*) from user WHERE email=".$email;
$result=$conn->query($sql);
echo $result;

 $nameErr = $emailErr = $pwdErr = "";
 $name1 = $name2 = $email1 = $password = "";

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}     

$flag = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($first)) {
    $flag=0;
    $_SESSION['nameErr'] = "Name is required";
  } else {
    $name1 = test_input($first);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name1)) {
      $flag=0;
      $_SESSION['nameErr'] = "Only letters and white space allowed"; 
    }
  }
  if (empty($last)) {
    $flag = 0;
    $_SESSION['lastErr'] = "Name is required";
  } else {
    $name2 = test_input($last);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name2)) {
      $_SESSION['lastErr'] = "Only letters and white space allowed"; 
    }
  }

  if(empty($email)) {
    $flag = 0;
    $_SESSION['emailErr'] = "Email is required";
  }
  else{
    $email1 = test_input($email);
    if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
      $flag = 0;
      $_SESSION['emailErr'] = "Invalid email format"; 
    }else{
    if($result==1){
     $_SESSION['emailErr'] = "Email-id already exists.Choose new email-id";  
    }
  }


  if (empty($pwd)) {
    $flag = 0;
    $_SESSION['pwdErr'] = "Password cannot be empty";
  } else {
    $password = test_input($pwd);
    $password=md5($password);
    if (!preg_match("/^[a-z0-9_-]{6,40}$/i", $password)) {
      $_SESSION['pwdErr'] = "Invalid pwd"; 
    }
  }
}


if($flag==1 and $result==0){
  $sql="INSERT INTO user (first,last,pwd,email) VALUES ('$name1', '$name2', '$password','$email1')";
  $result=$conn->query($sql) or die(mysqli_error($conn));
  if($result){
    $_SESSION["Authentication"]="True";
    $_SESSION["ADMIN"] = "false";
    header("Location: index.php");
  }
  else{
    header("Location: login_signup.php");
  }    
}
else{
  $_SESSION['signup_errors'] = "True";        
  header("Location: login_signup.php");
 }
}
else
  header("Location:login_signup.php");
?>