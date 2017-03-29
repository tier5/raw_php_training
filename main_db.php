<?php

function connect_database(){

$database="Training";
$servername="localhost";
$username="root";
$password="toor";


$con=new mysqli($servername,$username,$password,$database);

if($con->connect_error)
{
	die("connection error:".$con->connect_error);
} 
return $con;
}


function select_data($con){

$sql="SELECT * FROM users";
$result=mysqli_query($con,$sql);
$tablebody="";

if(mysqli_num_rows($result)>0){
	while($rows=mysqli_fetch_assoc($result))
		{

			$tablebody.="<tr>";
			$tablebody.="<td>".$rows['id']."</td><td>".$rows['name']."</td><td>".$rows['address']."</td>";
			$tablebody.="</tr>";

		}
}
mysqli_close($con);
echo $tablebody;

}

function insert_data($con,$name,$address)
{

	$sql=$con->prepare("INSERT INTO users(`name`,`address`)VALUES(?,?)");
	$sql->bind_param("ss",$name,$address);
	if($sql->execute())
	{	
		return true;
	}
	else
	{
		return false;
	}

}


function delete_data($con,$id)
{

	$sql=$con->prepare("DELETE FROM users where id=?");
	$sql->bind_param("i",$id);
	if($sql->execute())
	{	
		return true;
	}
	else
	{
		return false;
	}

}

function edit_data($con,$id,$selected,$value)
{

	if($selected=='name'){
		$sql=$con->prepare("UPDATE users SET name=?  where id=?");
		}
	else if($selected=='address')
	{
	$sql=$con->prepare("UPDATE users SET address=?  where id=?");
	}
	else if($selected=="")
	{
		header('Location: index.php?id=error&message=Select From DropDown Box');
	}

		$sql->bind_param("si",$value,$id);
	if($sql->execute())
	{	
		return true;
	}
	else
	{
		return false;
	}

}

function select_id($con)
{
	
	$sql="SELECT id from users";
	$result=mysqli_query($con,$sql);
	$options="";
	if(mysqli_num_rows($result)>0)
	{
		while($rows=mysqli_fetch_assoc($result))
		{

			$options.="<option value=".$rows['id'].">".$rows['id']."</option>";
		}
	}
	mysqli_close($con);
	echo $options;
}


?>