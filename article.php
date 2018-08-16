<?php
session_start();
include 'db.php';
$sql="SELECT * FROM category";
$result=$conn->query($sql);
$id=$_GET['id_article'];
$var1="SELECT * FROM article WHERE ar_id=".$id;
$q=$conn->query($var1) or die(mysqli_error($conn));
if($q->num_rows==0)
     {
      echo "ARTICLE DOES NOT EXIST";
      return;
     }
$row = $q->fetch_array(MYSQLI_ASSOC);
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
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Abril Fatface">
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Old Standard TT">
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin Slab">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Vollkorn">
  <style >
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
  ?>
<?php
endif;
?>
</ul>
</div>
</nav>
<br> <br> <br><br>  
 <?php
            foreach ($q as $key):
            ?>
	<div class="container">
    <div class="row">
      <div class="col-lg-8">
    <h1 style="text-align: center; font-family: 'Lato', serif;"><?php echo $row['title'];  ?></h1>
    <blockquote style="text-align: center;  font-family: 'Old Standard TT', serif;"><h4><?php echo $row['tagline']; ?><h4></blockquote>
    <img src="uploads/<?php echo $row['im_name']; ?>" style="width:100%; height:500px; margin: auto;display: block;">
    <br>
      <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#"><?php echo $key['author_name']; ?></a>
            </div>
<?php endforeach;?>
    <div class="container">
      <h6 style="font-size:20px;font-family: 'Vollkorn';">
  <?php echo  $row['content'] ?> 
    </h6>
    </div>
  </div>

<div class="col-lg-4" >
   <h1 style="text-align: center; padding: 4px; margin-top: 35px; font-family: 'Old Standard TT';">Recent Posts</h1>
  <div class="row">
<?php
      $sql="SELECT * FROM article WHERE approve=1 AND ar_id!=".$id." order by date desc limit 4";
      $articles=$conn->query($sql) or die(mysqli_error($conn));
      foreach ($articles as $article):
      ?>
<div class="thumbnail" >
            <a href="article.php?id_article=<?php echo $article['ar_id'];?>" target="_blank" style="text-decoration: none;">
            <div class="caption">
            <img class="rounded" src="uploads/<?php echo $article['im_name']; ?>" alt="Lights" style="width:350px; height:200px; "> </div>
              <div style="text-align: center; color: black; font-family: 'Droid Sans'; "><?php echo $article['title']; ?></div>
              <br>
            </div></a>
      <?php 
endforeach;
?>
</div>
</div>
 </div>
</div>

    <br><br>
    <div class="container">
    <?php
    if(isset($_SESSION["ADMIN"])):
      if (isset($_SESSION["ADMIN"])=="True" and $row['approve']==0):
        ?>
         <a href="delete.php?id_article=<?php echo $row['ar_id'];?>">
        <button type="button" class="btn btn-primary" >DELETE</button>
      </a>
 
        <a href="edit.php?id_article=<?php echo $row['ar_id'];?>">
          <button type="button" class="btn btn-primary pull-right" >EDIT</button>
        </a>

        <?php
      endif;
    endif;
    ?>
  
  <?php 
    if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']=="True" and $row['approve']==1):
  ?>
  <a href="delete.php?id_article=<?php echo $row['ar_id'];?>">
        <button type="button" class="btn btn-danger" >DELETE</button>
      </a>
 
        <a href="pull_back.php?id_article=<?php echo $row['ar_id'];?>">
          <button type="button" class="btn btn-primary pull-right" >PULL BACK</button>
        </a>
   <?php
    endif;
  ?>
  </div> 
    <br>
    <?php
    include "footer.php";
    ?>
</body>
</html>
