<?php
session_start();
include 'db.php';
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
    <a class="navbar-brand" href="index.php" style="color: #fd680e">ADMIN PANEL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarCollapse">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>

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
<br> <br>   
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">ADMIN PAGE</h1>
      <p class="lead text-muted">Articles Uploaded by people.Let's check it out.</p>
      <p>
        <a href="index.php" class="btn btn-primary">Home Page</a>
      </p>
    </div>
  </section>
</main>
<?php
$var1="SELECT a.*,c.title as categoryTitle FROM article a join category c on a.category_id=c.id WHERE a.approve=0";
$q=$conn->query($var1) or die(mysqli_error($conn));

if(isset($_SESSION["ADMIN"])):
  if($_SESSION["ADMIN"]=="True"):
    ?>
    <!--pending article-->
    <div class="container">
      <h1 style="text-align: center;">Pending Articles</h1>
      <div class="row">
        <?php
        foreach ($q as $key):
          ?>
          <div class="col-lg-4 col-md-4 col-sm-5 col-xs-9">
            <br>
            <div class="thumbnail">
              <img src="uploads/<?php echo $key['im_name']; ?>" alt="Lights" style="width:100%; height: 250px;">
              <div class="caption">
                <b><span style="float:left;">Title: <?php echo $key['title']; ?></span><span style="float: right;">Category: <?php echo $key['categoryTitle'] ?></span></b>
              </div>


              <a href="article.php?id_article=<?php echo $key['ar_id'];?>" target="_blank" style="text-decoration: none;">
                <button type="button" class="btn btn-primary btn-block" >READ</button>
              </a>
            </div>
          </div>
          <?php 
        endforeach;
        ?>
      </div>

        <!--approved article-->
      <?php  
    $var1="SELECT a.*,c.title as categoryTitle FROM article a join category c on a.category_id=c.id WHERE a.approve=1";
    $q=$conn->query($var1) or die(mysqli_error($conn));
    ?>
      
      <h1 style="text-align: center;">Approved Articles</h1>
      <div class="row">
        <?php
        foreach ($q as $key):
          ?>
          <div class="col-lg-4 col-md-4 col-sm-5 col-xs-9">
            <br>
            <div class="thumbnail">
              <img src="uploads/<?php echo $key['im_name']; ?>" alt="Lights" style="width:100%; height: 250px;">
              <div class="caption">
                <b><span style="float:left;">Category: <?php echo $key['categoryTitle'] ?></span></b>
              </div>


              <a href="article.php?id_article=<?php echo $key['ar_id'];?>" target="_blank" style="text-decoration: none;">
                <button type="button" class="btn btn-success btn-block" >READ</button>
              </a>
            </div>
          </div>

          <?php 
        endforeach;
        ?>
        </div>
      </div>
      <?php
    endif;
  endif; 
  ?>
</div>
<br><br>

<?php
include 'footer.php';
?>


</body>
</html>
