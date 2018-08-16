<?php
session_start();
include 'db.php';
$id=$_GET['id_article'];
$var1="SELECT * FROM article WHERE ar_id=".$id;
$q=$conn->query($var1) or die(mysqli_error($conn));
$row = $q->fetch_array(MYSQLI_ASSOC);
$sql="SELECT * from category WHERE id=".$row['category_id'];
$result=$conn->query($sql);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="logincss.css">
	<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}

	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
	}

	img.avatar {
		width: 40%;
		border-radius: 50%;
	}

	.container {
		padding: 16px;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
		.cancelbtn {
			width: 100%;
		}
	}
</style>
<body>

	
	<form method="post" name="myForm" action="edit_approve.php?id_article=<?php echo $id; ?>" enctype="multipart/form-data" role="form">
		<h2 style="text-align: center;">Edit Article Before Uploading</h2>

		<div class="container">

			<label><b>Author's name</b></label>
			<input type="text" value="<?php echo $row['author_name'] ?>" name="name" required>
			
			<label><b>Artice Title</b></label>
			<input type="text" value="<?php echo $row['title'] ?>" name="title" required>
			
			<label><b>Artice tagline</b></label>
			<input type="text" value="<?php echo $row['tagline'] ?>" name="tagline" required>
			
			
			<br><br>
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


			<br><br>
			<label><b>Image : </b></label>
			<img class="img-responsive" src="uploads/<?php echo $row['im_name']; ?>" width="30%" height="40%"> 

			<br><br>
			<label><b>Article</b></label>
			<textarea name="editor1"><?php echo $row['content']; ?></textarea> <script> CKEDITOR.replace( 'editor1' ); </script>
			<input type="hidden" name="submitted" value="1">
			
			<a href="edit_approve.php?id_article=<?php echo $id; ?>"><button type="submit" class="btn btn-primary btn-block" >SAVE AND APPROVE</button></a>
		</div>
	</div>
</form>
</body>
</html>

