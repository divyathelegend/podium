<?php
session_start();
include 'dbh.php';
$id=$_POST['id']; 
// $sql="SELECT * FROM ARTICLE";
// $result=$conn->query($sql);
// $output= $result->fetch_array(MYSQLI_ASSOC);
 if(isset($_POST['submitted']) == 1){
if(isset($_SESSION['ADMIN'])){
	if($_SESSION['ADMIN']=='True'){
		// $name= mysqli_real_escape_string($conn,$_POST['name']);
		// $title= mysqli_real_escape_string($conn,$_POST['title']);
		// $tag= mysqli_real_escape_string($conn,$_POST['tagline']);
		// $article= mysqli_real_escape_string($conn,$_POST['editor1']);
	$query="UPDATE article SET approve=1 WHERE ar_id=".$id;
	$re=$conn->query($query) or die(mysqli_error($conn));
	return (bool)$re;
}//else{
	//header("Location: admin_panel.php");
}}
//else
//{
	//session_unset();
	//header("Location: homep.php");
//}}

?>
