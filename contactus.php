<?php
 
 include 'db.php';
 if(isset($_POST['submitted']) == 1){
 $name= mysqli_real_escape_string($conn,$_POST['name']);
 $email= mysqli_real_escape_string($conn,$_POST['email']);
 $comment= mysqli_real_escape_string($conn,$_POST['comments']);

 function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$flag = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

if(empty($email)) {
    $flag = 0;
    $_SESSION['emailErr'] = "Email is required";
  }
  else {
    $email1 = test_input($email);
    if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
      $flag = 0;
      $_SESSION['emailErr'] = "Invalid email format"; 
    }
  }

if (empty($comment)) {
    $flag=0;
    $_SESSION['comErr'] = "Name is required";
  } else {
    $comment1 = test_input($comment);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$comment1)) {
      $flag=0;
      $_SESSION['comErr'] = "Only letters and white space allowed"; 
    }
  }
}

if($flag==1){
  $sql="INSERT INTO contactus (name,email,comment) VALUES ('$name1', '$email1', '$comment1')";
  $result=$conn->query($sql) or die(mysqli_error($conn));
  if($result){

    header("Location: index.php");
  }
}
}
?>