<?php
include('main_db.php');

$con=connect_database();



$name=mysqli_real_escape_string($con,trim($_POST['insert_name']));
$address=mysqli_real_escape_string($con,trim($_POST['insert_address']));

if(!$name)
{
	header("Location: index.php?id=error&message=Enter Name");
}
if(!$address)
{
	header("Location: index.php?id=error&message=Enter Address");
}

if($name&&$address){
		$insert=insert_data($con,$name,$address);

}

if($insert===true)
{
	
	header("Location: index.php?id=success&message=Success");
}
else if($insert===false)
{
	header("Location: index.php?id=error&message=Error");

}


?>
