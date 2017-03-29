<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

	<title>HTML PAGE</title>
</head>
<body>


<fieldset>
<center><legend>USER</legend></center>
<div id="wrapper">
<div id="left-panel">

<div class="form-wrapper">
<fieldset>
<legend>INSERT</legend>
<form method="post" action="insert_record.php">
<label>Name:</label><br>
<input type="text" name="insert_name" placeholder="name" required><br>
<label>Address:</label><br>
<input type="text" name="insert_address" placeholder="address" required><br>
<button type="submit" name="insert">Insert</button>
</form>
</fieldset>
</div>

<div class="form-wrapper">
<fieldset>
<legend>UPDATE</legend>
<form method="post" action="edit_record.php">
<select name="set_id">
<?php 
include('main_db.php');
$con=connect_database();
select_id($con);
?>
</select>

<select name="set_value">
<option value="" selected>Select</option>
<option value="name">Name</option>
<option value="address">Address</option>
<select>
<input type="text" name="update_input" placeholder="Enter Value" required><br>
<button type="submit" name="update">Update</button>
</form>
</fieldset>
</div>

<div class="form-wrapper">
<fieldset>
<legend>DELETE</legend>
<form method="post" action="delete_record.php">
<label>ID:</label><br>
<input type="text" name="delete_contents" placeholder="Enter ID" required><br>
<button type="submit" name="delete">Delete</button>
</form>
</fieldset>
</div>


</div>

<div id="right-panel">
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
</tr>
<tbody>
<?php 


$con=connect_database();

select_data($con);


?>
</tbody>
</table>
<?php if(isset($_GET['message']))
{
	echo "<center>".$_GET['message']."</center>";
}
?>
</div>



</fieldset>
</body>

</html>
