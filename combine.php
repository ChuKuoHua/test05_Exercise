<?php
session_start();
$con= new mysqli('localhost','root','','txt') or die (mysqli_error($con));

$id = 0;
$name ='';
$phone ='';
$email ='';
$update =false;

if(isset($_POST['save'])){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$con->query("INSERT INTO client(name,phone,email) VALUES('$name','$phone','$email')")
	or die($con ->error);

	$_SESSION['message'] = "save success!";
	$_SESSION['msg_type'] = "success";

	header("Location: test_05.php"); 
}

if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	
	$con->query("DELETE FROM client WHERE id=$id")
	or die($con ->error());

	$_SESSION['message'] = "delete success!";
	$_SESSION['msg_type'] = "danger";

	header("Location: test_05.php"); 
}

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update =true;
	$result = $con->query("SELECT *FROM client WHERE id=$id")
	or die($con ->error());

		$row = $result->fetch_array();
		$name = $row['name'];
		$phone = $row['phone'];
		$email = $row['email'];
	
}

if(isset($_POST['update'])){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$con->query("UPDATE client SET name='$name',  phone='$phone', email='$email' WHERE id=$id")
	or die($con ->error);

	$_SESSION['message'] = "update success!";
	$_SESSION['msg_type'] = "warning";

	header("Location: test_05.php"); 
}

?>