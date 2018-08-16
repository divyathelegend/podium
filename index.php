<?php
  include "navbar.php";
?>

<?php
  $sql="SELECT * FROM category";
  $categories=$conn->query($sql);
  $row = $categories->fetch_array(MYSQLI_ASSOC);
?>

  <br>
        <!-- Three columns of text below the carousel -->
  <div class="container">
    <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12" >
  <h1  class="card-header" style="text-align: center;background-color:#007399;  font-family: 'Old Standard TT', serif;" >Featuring Articles</h1>
  <br>
          <div class="row">
      <?php
      $sql="SELECT *FROM article WHERE approve=1 order by date desc limit 3";
      $articles=$conn->query($sql) or die(mysqli_error($conn));
      foreach ($articles as $article):
      ?>
            <div style="text-align: center;" class="col-lg-4">
            <img  class="rounded-circle" src="uploads/<?php echo $article['im_name']; ?>" alt="Generic placeholder image" width="170" height="170">
            <h3 style="font-family: 'Old Standard TT', serif;"><?php echo $article['title']; ?></h3>
            <h5  style=" font-family: 'Droid Sans';"><?php echo $article['tagline']; ?></h5>
            <?php
            foreach ($categories as $category):
              if ($article['category_id']==$category['id']):
              if (count($articles)!=0):
            ?><p class="date">Post by: <i><?php echo $article['author_name']?></i> | Category: <?php echo $category['title']?></p>
            <p><a  class= "btn btn-info" href="article.php?id_article=<?php echo $article['ar_id'];?>" role="button">Read</a></p>
    </div><!-- /.col-lg-4 -->
    <?php     
  endif;
  endif;
    endforeach;
    endforeach;
    ?>
    </div>
  </div>
</div>
  </div>

        <!-- Recent articles and sponsers -->

        
            
        <div class="container"> 
        <hr class="featurette-divider">     
      
      <div class="row">

    <div class="col-sm-9 col-md-6 col-lg-8" style="overflow:scroll;max-height:800px;">
         <h1  style="text-align: center; background-color: #007399; font-family:'Old Standard TT', serif;" class="card-header">Recent Articles</h1>
        <?php
        include 'recent_article.php';
        ?>
    </div>
<div class="col-sm-3 col-md-6 col-lg-4" >
   <h1 style="text-align: center;  background-color: #007399; size: 1px; font-family: 'Old Standard TT', serif;" class="card-header">Our Sponsers</h1>
            <div class="card-body">
              <div class="row">
                
                  <ul class="list-unstyled mb-0">
                    <li>
                      <img class="card-img-top" style="width: 75%; margin: 0 auto; height: 20%; display: block;"  src="img/burger_king.jpg" alt="Card image cap">
                    </li>
                    <br>
                    <li>
                     <img class="card-img-top" style="width: 80%; margin: 0 auto; height: 20%; display: block;"  src="img/cash_back.jpg" alt="Card image cap">
                    </li>
                    <br>
                    <li>
                      <img class="card-img-top" style="width: 80%; height: 20%; margin: 0 auto; display: block;"  src="img/niit.jpg" alt="Card image cap">
                    </li>
                    <br>
                  </ul>
                </div>
              </div>
            </div>
          

<!--
       <div class="container">
        <hr class="featurette-divider">
        <h1  style="text-align: center; font-family: 'Old Standard TT', serif;">Our Team</h1>
        <br>
        
        <div id="myCarousel" class="OurTeam" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="img/podium.jpg" alt="First slide">
           
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="uploads/Jellyfish.jpg" alt="Second slide">
           
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="img/aboutus.jpg" alt="Third slide">
           
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

</div> -->
<!-- Container (Contact Section) -->
  <div class="container">
  <br><br><hr>
  <h1  style="text-align: center; font-family: 'Old Standard TT', serif;">Contact Us</h1>
  <br>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="fa fa-map-marker"></span> Gautum Budh Nagar, Noida</p>
      <p><span class="fa fa-phone"></span> 999999111</p>
      <p><span class="fa fa-envelope"></span> teamimpetus@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
       <form  action="contactus.php" method="post" autocomplete="on">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
         <div class="error">
      <?php
      if(isset($_SESSION['nameErr']))
        echo $_SESSION['nameErr'];
      unset($_SESSION['nameErr']);
      ?> </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
       <div class="error">
      <?php
      if(isset($_SESSION['emailErr']))
        echo $_SESSION['emailErr'];
      unset($_SESSION['emailErr']);
      ?> </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
         <div class="error">
      <?php
      if(isset($_SESSION['comErr']))
        echo $_SESSION['comErr'];
      unset($_SESSION['comErr']);
      ?> </div>
        <input type="hidden" name="submitted" value="1">
        <div class="col-sm-12 form-group">
          <button style="background-color: #fd680e;" class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
  </div>




    


<!-- FOOTER -->
  <?php
  include "footer.php";
  if(isset($_SESSION['delete'])):
    ?>
<script>
  $(document).ready(function(){
    console.log("Hello");
    $.notify("Article has been deleted.Refresh page!");
  })
</script>
  <?php
  unset($_SESSION['delete']);
endif;
   ?>
    </main>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../podium/bootstrap/js/bootstrap.min.js"></script>
    <!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>

  </body>
</html>
