<?php
include('dbcon.php');
//if(isset($_POST["request"]==POST)){
	
$name=$_POST['name'];
/*echo "<h1> welcome  $name </h1>";*/
$email=$_POST['email'];
$phone_no=$_POST['phone_no'];
$pwd=$_POST['pwd'];
//echo "WELCOME $name";
//serverside validation

if(($_POST["name"]))
{
	 echo "$name";
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone_no']) && isset($_POST['pwd'])) 
		{
			$first=$_POST['name'];
		
        $x=0;              
        if(preg_match("/^[a-zA-Z -]+$/", $name) === 0)     //First Name
		    {
			   echo " ?> <script> alert("name is not valied"); </script> <?php ";
			   $x++;
		    }
		if(is_numeric($name))
			{
				echo "Name can't be numeric";
				$x++;
			}
			
		     $email = $_POST["email"];        //Email
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
		     {
               // echo("$email is a valid email address");
             }
		else 
		     {
               echo("<br> $email is not a valid email address");
			    $x++;
			 }
			 
			 $phone_no= $_POST['phone_no'];              //age
        if (!is_numeric($phone_no)) 
		     {
               echo "<br> phnumber should be in digits";
			   $x++;
             } 
		else (strlen($age)>10))
		     {
				 echo "Not a valid num";
				 $x++;
		}

$sql="insert into users(username,email,phone_no,password)values('$name','$email','$phone_no','$pwd')";
//echo $sql;

//$s=$conn->query($sql);

?>
<br><br><a href="index.php">Back to home</a>
	