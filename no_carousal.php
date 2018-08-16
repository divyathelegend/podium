<?php
session_start();
include 'db.php';
$sql="SELECT * FROM category";
$result=$conn->query($sql);
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
  <!-- Latest compiled JavaScript -->


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript" src="js/notify.js"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid Sans">
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Old Standard TT">
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin Slab">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Vollkorn">
  <style>
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

.carousel-inner > .carousel-item > img {
    width: 100%;
}

.img-fluid {
 height:250px;
    width:100%;
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
  .carousel-inner{
    width:100%;
    max-height: 600px !important;
  }
  #but{
    float:right;
  }
  .wrapper {
    max-width:200px;
    width:100%;
  }
  .carousel-item-next, .carousel-item-prev, .carousel-item.active {
    display: block !important;
  }
.navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
}
 
</style>
</head>

<body>

  
  <nav class="navbar navbar-expand-md fixed-top" style="background-color:#061D25;">
      <a class="navbar-brand" href="index.php" style="color: #fd680e">PODIUM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarCollapse">
      
        <ul class="navbar-nav mr-auto">
          <?php
          foreach($result as $cat):
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="article_list.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></a>
            </li>
            <?php
          endforeach;
          ?>
          <?php 
            if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']=="True"):
          ?>
            <li class="nav-item active">
              <a class="nav-link" class="btn" href="try_admin.php">Admin Panel</a>
            </li>
          <?php
            endif;
          ?> 
        </ul>
     

     <ul class="nav" >
        <?php
        if(isset($_SESSION["Authentication"]) and isset($_SESSION['ADMIN'])):
          if($_SESSION["Authentication"]=="True" and $_SESSION['ADMIN']=="false"):
            ?>
            <li>
              <a class="btn" class="nav-link" href="upload.php">
                <button type="button" class="btn navbar-btn" id="but" style= "background-color: #fd680e;color: #fff;"> Upload your articles here</button></a>
              </li>
              <?php
            endif;
          endif;
          ?>


          <?php
          if(isset($_SESSION["Authentication"]) && $_SESSION["Authentication"]=="True"):
            ?>
            <li>
             <a class="btn" href="logout.php">
              <button type="button" class="btn  navbar-btn" id="but" style= "background-color: #fd680e;color: #fff;">Logout
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
<br><br>