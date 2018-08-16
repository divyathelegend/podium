<?php
$sql="SELECT * FROM category";
$categories=$conn->query($sql);
$row = $categories->fetch_array(MYSQLI_ASSOC);
foreach ($categories as $category):
	?>
	<hr>
	<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style=" text-align: center; margin-left:5%;font-family:Garamond">
			<h1><?php echo $category['title'];?></h1>
		</div>
	</div>


	<?php
	$sql="SELECT *FROM article WHERE approve=1 AND category_id={$category['id']} order by date desc limit 3";
	$articles=$conn->query($sql) or die(mysqli_error($conn));
        ?>
        <div class="row">
			<?php
			foreach ($articles as $article):
				?>
				<?php
				if ($article['category_id']==$category['id']):
					if (count($articles)!=0) :
	            ?>

     <div class="col-md-4">
					<br>
					<div class="thumbnail" style="color: black; position: relative; padding-bottom: 100%; overflow: hidden; width: 100%;" >
						<a  href="article.php?id_article=<?php echo $article['ar_id'];?>" target="_blank" style="text-decoration: none;">
						<img src="uploads/<?php echo $article['im_name']; ?>" alt="Lights" style=" position: absolute; width:100%; height:100%;"> </div>
						<div class="caption">
							<div style=" font-family: 'Droid Sans';text-align: center; color: black;"><?php echo $article['title']; ?>:<?php echo $article['tagline']; ?></div>
						</div>
					<div style="text-align: center; font-family: 'Lato';">
							<h6 style="color: black;">Post by: <i><?php echo $article['author_name']?></i> </h6> 
						<a href="article_list.php?id=<?php echo $article['category_id'];?>"><h6 style="color: black;"> Category:<?php echo $category['title']?></h6></a>
					</div>
					</a>
					
				</div>
		<?php
	else:
		?>
        <div><h3>No Recent Articles</h3></div>
					<?php
				endif;
				endif;
				?>
				<?php 		
			endforeach;
			?>
		</div></div>
	<?php 		
endforeach;
?>


