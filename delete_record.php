<?php 
include('main_db.php');

$con=connect_database();

$id=mysqli_real_escape_string($con,trim($_POST["delete_contents"]));

if(!$id)
{
	header('Location:index.php?id=error&message=Enter ID');
}
else
{
	$delete=delete_data($con,$id);
}

if($delete===true)
{
	
	header('Location:index.php?id=success&message=Deleted');
}
else if($delete===false)
{
	header('Location:index.php?id=error&message=Not Deleted');
}
?>