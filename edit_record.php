<?php 
include('main_db.php');

$con=connect_database();

/*if(isset($_['set_value'])&&isset($_REQUEST['update_input']))
{
	echo 'A';
}
else
{
	echo 'B';
}
*/

$id=mysqli_real_escape_string($con,trim($_POST['set_id']));
$selected=trim($_POST['set_value']);
$value=mysqli_real_escape_string($con,trim($_POST['update_input']));

if(!$id)
{
	header("Location:index.php?id=error&message=Enter id");
}

if(!$selected)
{
header("Location:index.php?id=error&message=Enter Proper Column In Dropdown");
}
if(!$value)
{
	header("Location: index.php?id=error&message=Enter Value");
}

if($id&&$selected&&$value){
		$edit=edit_data($con,$id,$selected,$value);

}

if($edit===true)
{
	
	header("Location: index.php?id=success&message=Success");
}
else if($edit===false)
{
	header("Location: index.php?id=error&message=Error");

}