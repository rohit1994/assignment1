<?php
include("dbcon.php");


session_start();


if(isset($_POST['submit']))
{
	$username="";
	$pwd="";
$username = trim($_POST['username']);
$pwd = trim($_POST['pwd']);

$query = "SELECT * FROM users WHERE (username='$username' 
AND password='$pwd') or (email='$username' AND password='$pwd')";



$result=$conn->query($query );
foreach($result as $row)
{
	if($row["password"]==$pwd)
	{
		$_SESSION["sectionname"]=$row["username"];
		if(isset($_SESSION["sectionname"]))
		{
			header('location:user_home.php');
			echo 'login succesful';
			exit;
        }
		else
		{
			echo 'failed';
		}
	}
}


}
?>
	<form method="POST">
		<input type="text" name="username" placeholder="Enter user name"></input><br><br>
		<input type="text" name="pwd" placeholder="Enter password"></input><br><br>
		<input type="submit"  name= "submit"></input>
		<input type="submit"  name="reset"></input>
	</form>




