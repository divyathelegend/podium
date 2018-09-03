<?php
session_start();
include 'db.php';  
 if(isset($_SESSION["Authentication"])){
   if($_SESSION["Authentication"]=="Fail")
     echo "Incorrect credentials";
   else
     header("Location:index.php");
 }
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>PODIUM</title>
  <link rel="stylesheet" type="text/css" href="l&r.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
  <!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Login and Registration Form</h1>
        
            </header>
            <section>       
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" method="post" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your email</label>
                                    <input id="email" name="email" required="required" type="text" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="pwd" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <input type="hidden" name="submitted" value="1">
                                <button type="submit" name="submitted" class="loginbtn">Login</button>
                  <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                  <label for="loginkeeping">Keep me logged in</label>
                </p>
                                <p class="login button"> 
                                   <a href="http://cookingfoodsworld.blogspot.in/" target="_blank" ></a>
                </p>
                                <p class="change_link">
                  Not a member yet ?
                  <a href="#toregister" class="to_register">Join us</a>
                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="signup.php" method="post" autocomplete="on"> 
                                <h1> Sign up </h1>
      <div class="error">
      <?php
      if(isset($_SESSION['nameErr']))
        echo $_SESSION['nameErr'];
      unset($_SESSION['nameErr']);
      ?>
    </div> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Firstname</label>
                                    <input id="usernamesignup" name="first" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
    <div class="error">
      <?php
      if(isset($_SESSION['lastErr']))
        echo $_SESSION['lastErr'];
      unset($_SESSION['lastErr']);
      ?>
    </div>
                                <p> 
                                    <label for="usernamesignup" class="uname" >Lastname</label>
                                    <input id="usernamesignup" name="last" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
      <div class="error">
      <?php
      if(isset($_SESSION['emailErr']))
        echo $_SESSION['emailErr'];
      unset($_SESSION['emailErr']);
      ?>
    </div>
                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
      <div class="error">
      <?php
      if(isset($_SESSION['pwdErr']))
        echo $_SESSION['pwdErr'];
        unset($_SESSION['pwdErr']);
      ?>
    </div>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="pwd" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                
                               <input type="hidden" name="submitted" value="1">
  <button type="submit" class="btn btn-warning" style="width: 20%; ">Sign in</button>
                                <p class="change_link">  
                  Already a member ?
                  <a href="#tologin" class="to_register"> Go and log in </a>
                </p>
                            </form>
                        </div>
            
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>

</body>
</html>
