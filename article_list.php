<?php
include "no_carousal.php";
$id=$_GET['id'];
$sql="SELECT * FROM category";
$result=$conn->query($sql);

$var="SELECT * FROM category WHERE id=".$id;
$r=$conn->query($var);
if($r->num_rows==0)
{
  echo "CATEGORY DOES NOT EXIST";
  return;
}
$row = $r->fetch_array(MYSQLI_ASSOC);
$var1="SELECT * FROM article WHERE category_id=".$id. " ORDER BY date DESC LIMIT 10";
$q=$conn->query($var1);
?>
 <div class="container">
<br><br>
      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 style="text-align: center; background-color:#007399;font-family: 'Old Standard TT', serif;"  class="card-header"><?php echo $row['title']; ?></h1>
          <br>
            <?php
            foreach ($q as $key):
            if ($key['approve']==1):
            ?>
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" style="width: 100%; height:300px; display: block;"  src="uploads/<?php echo $key['im_name']; ?>" alt="Card image cap">
            <div class="card-body">
              <h2 style="font-family: 'Droid Sans';"><?php echo $key['title']; ?> : <small><?php echo $key['tagline']; ?></small></h2>
              <h6 style="font-family: 'Vollkorn', serif;"><?php echo substr($key['content'], 0 , 300); ?></h6>
              <a href= "article.php?id_article=<?php echo $key['ar_id'];?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
      <?php 
    endif;
    ?>
    <?php 
  endforeach;
  ?>
        </div>
        <!--Sidebar SPONSORS-->
        <div class="col-md-4">
            <h1 style="text-align: center; background-color:#007399;font-family: 'Old Standard TT', serif;"  class="card-header">Our Sponsers</h1>
            <div class="card-body">
              <div class="row">
                
                  <ul class="list-unstyled mb-0">
                    <li>
                      <img class="card-img-top" style="width: 75%; height: 20%; display: block;"  src="img/burger_king.jpg" alt="Card image cap">
                    </li>
                    <br>
                    <li>
                     <img class="card-img-top" style="width: 80%; height: 20%; display: block;"  src="img/cash_back.jpg" alt="Card image cap">
                    </li>
                    <br>
                    <li>
                      <img class="card-img-top" style="width: 80%; height: 20%; display: block;"  src="img/niit.jpg" alt="Card image cap">
                    </li>
                    <br>
                  </ul>
                </div>
              </div>
        </div>
      </div>
    </div>
<?php
include "footer.php";
?>
       