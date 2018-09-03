
<?php
session_start();
include 'db.php';

if(isset($_SESSION["Authentication"])){
  if($_SESSION["Authentication"]=="Fail")
   header("Location: login_signup.php");
}
else 
  header("Location: login_signup.php");
?>
<html>
<head>

 <!-- <script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script> -->
 <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>PODIUM</title>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="album.css" rel="stylesheet">
</head>
<body>
  <style>
  form {
    border: 3px solid #f1f1f1;
  }

  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  button {
    background-color: #fe6f5e;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

span.psw {
    float: right;
    padding-top: 16px;
  }
  .fa {
    padding: 10px;
    font-size: 20px;
    width: 20px;
    margin-right: 10px;
    text-decoration: none;

  }

  .footer {
    background: #061D25;
    padding: 10px 0;
  }
  .footer a {
    color: #70726F;
    font-size: 15px;
    padding: 10px;

  }

  .footer a:hover {
    color: white;
  }
.nav-link {
   padding: 5px 12px;
   margin: 0;
   border-radius: 3px;
   color: #fff;
   line-height: 24px;
   display: inline-block; 
 } 
 .navbar .nav-link:hover
 {
  background-color: #fd680e;
  color: #fff;
} 
.jumbotron {
background-image: url(img/a.jpg);
background-size: cover;
height: 80%;
margin: 0;
}
.navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
}
 }
</style>
<body

<!-- Navbar-->
<nav class="navbar navbar-expand-md fixed-top" style="background-color:#061D25;">
    <a class="navbar-brand" href="index.php" style="color: #fd680e">PODIUM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" style="width: 60px;">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarCollapse">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>

    </ul>
    <ul class="nav">
    <?php
    if(isset($_SESSION["Authentication"]) && $_SESSION["Authentication"]=="True"):
      ?>
      <li>
       <a class="btn" href="logout.php">
        <button type="button" class="btn btn-info" >Logout
        </button>
      </a>
    </li>
    <?php
  else:
    ?>
    <?php
    if($_SERVER["PHP_SELF"]!="/testing/login_signup.php"):
      ?> 
      <li>
       <a class="btn" href="login_signup.php">
        <button type="button" class="btn btn-info" ><span class="fa fa-user" style=" font-size: 15px;"></span> Join Us and Explore! </button>
      </a>
    </li>
    <?php
  endif;
endif;
?>
</ul>
</div>
</nav>
<main role="main">

  <div class="jumbotron " style="background-image: url(img/a.jpg)";>
  </div>
</main>
<!-- NAVBAR END-->

  <form method="post" name="myForm" action="savearticle.php" enctype="multipart/form-data" role="form">
   <br>
   <div class="container">
      <h1 class="jumbotron-heading" style="text-align: center;">Upload your article here!</h1>
   
    <label><b>Your name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>
    <div class="error">
      <?php
      if(isset($_SESSION['nameErr']))
        echo $_SESSION['nameErr'];
      unset($_SESSION['nameErr']);
      ?> </div>


      <label><b>Artice Title</b></label>
        <input type="text" placeholder="Enter title" name="title" required>
      <div class="error">
        <?php
        if(isset($_SESSION['titleErr']))
          echo $_SESSION['titleErr'];
        unset($_SESSION['titleErr']);
        ?> </div>

        <label><b>Artice tagline</b></label>
          <input type="text" placeholder="Enter tagline" name="tagline" >
        <div class="error">
          <?php
          if(isset($_SESSION['taglineErr']))
            echo $_SESSION['taglineErr'];
          unset($_SESSION['taglineErr']);
          ?> </div>

          <?php
          $sql="SELECT * from category";
          $result=$conn->query($sql);
          ?>
          <div class="dropdown">
           <label><b>Category</b></label>
           <select name="cat">
            <?php
            foreach($result as $cat):
              ?>
              <option value=<?php echo $cat['id']; ?> ><?php echo $cat['title']; ?></option>
              <?php
            endforeach;
            ?>
          </select>   
        </div>
        <label><b>Image</b></label>
        <input type="file" placeholder="Upload image" name="img"  required>
        <div class="error">
          <?php
          if(isset($_SESSION['errformat']))
            echo $_SESSION['errformat'];
          unset($_SESSION['errformat']);
          ?> </div>
          <label><b>Article</b></label>
          <textarea name="text" id="text">This is a demo .</textarea><script> CKEDITOR.replace( 'text' );</script>
         <!-- <textarea name="editor1"></textarea> <script> CKEDITOR.replace( 'editor1' ); </script --> 
          <input type="hidden" name="submitted" value="1">
          <?php
          if(isset($_SESSION['articleErr']))
            echo $_SESSION['articleErr'];
          unset($_SESSION['articleErr']);
          ?> 
          <button type="submit">Save</button></div>
        </div>
      </form>
    </body>
    </html>

