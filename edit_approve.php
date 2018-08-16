<?php
session_start();
include 'db.php';
$id=$_GET['id_article'];

 if(isset($_POST['submitted']) == 1){
if(isset($_SESSION['ADMIN'])){
	if($_SESSION['ADMIN']=='True'){
		$name= mysqli_real_escape_string($conn,$_POST['name']);
		$title= mysqli_real_escape_string($conn,$_POST['title']);
		$tag= mysqli_real_escape_string($conn,$_POST['tagline']);
		$article= mysqli_real_escape_string($conn,$_POST['editor1']);
	echo $name,$title,$tag,$article;
	$query="UPDATE article SET approve=1,author_name='$name',title='$title',tagline='$tag',content='$article' WHERE ar_id=".$id;
	$re=$conn->query($query);
	echo "ARTICLE APPROVED";
	header("Location: try_admin.php");
}else{
	// header("Location: admin_panel.php");
}}
else
{
	session_unset();
	// header("Location: homep.php");
}}

?>
