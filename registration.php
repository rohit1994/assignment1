<?php
 include('dbcon.php');
 if(isset($_POST["submit"]))
 {
	 $msg="";
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone_no']) && isset($_POST['pwd'])) 
		{
			$name=$_POST['name'];
		
        $x=0;              
        if(preg_match("/^[a-zA-Z -]+$/", $name) === 0)     //First Name
		    {
			   $msg.= "NAME IS NOT VALID";
			   $x++;
		    }
	    if(is_numeric($name))
			{
				$msg.= "Name can't be numeric";
				$x++;
			}
			
		$email = $_POST["email"];        //Email
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
		     {
               
             }
		else 
		     {
               echo("<br> $email is not a valid email address");
			    $x++;
			 }
			 $phone_no= $_POST["phone_no"];             
        if (!is_numeric($phone_no)) 
		     {
               echo "<br> phnumber should be in digits";
			   $x++;
             } 
		else if (strlen($phone_no)>10)
		     {
				 echo "Not a valid number";
				 $x++;
		     }
		$pwd=$_POST["pwd"];
			 if (strlen($pwd)<6)
		     {
				 echo "password is  valid";
				 $x++;
		     }
			 
		}
		
			 $sql="insert into users(username,email,phone_no,password)values('$name','$email',$phone_no,'$pwd')";
			//echo $sql;
			$sql1="select * from users where username='$name' and email='$email'";
			$res=$conn->query($sql1);
			if (!$res ) 
			{
			die('Query failed ' . $sql . ' Error:' . mysqli_error());
			}
			else
			{
				$row = mysqli_fetch_assoc($res);
			if( $row['id'] < 0 ) 
			{
				$s=$conn->query($sql);
				if($s)
				{
					$msg="success";
				}
				else
				{
				$msg="Failed";
				}
			}
			else
			{
				$msg="User Alredy exiest";
			}
			}
    }
?>

	<script>
	function validate()
	{ 
	/*alert("we are validating ur data");
		return true; */
		var name=document.forms["register"]["name"].value;
		var email=document.forms["register"]["email"].value;
		var phone_no=document.forms["register"]["phone_no"].value;
		var pwd=document.forms["register"]["pwd"].value;
		var cpwd=document.forms["register"]["cpwd"].value;
		alert("dear "+name);
		
		if(name=="")
		{
			alert("plse entr the name");
			document.forms["register"]["name"].focus();
			return false;
		}	
		else if(email=="")
		{
			alert("plse entr the mail id");
			document.forms["register"]["email"].focus();
			return false;
		}	
	    
		else if(pwd=="")
		{
			alert("plse entr the password");
			document.forms["register"]["pwd"].focus();
			return false;
		}	
		else if(cpwd=="")
		{
			alert("plse confirm the password");
			document.forms["register"]["cpwd"].focus();
			return false;
		}	
		
		else if(pwd.length<6)
		{
			alert("password min 6 value");
			document.forms["register"]["pwd"].focus();
			return false;
		}	
		else if(pwd==cpwd)
			{
				return true;
			}
		else{
			alert("incorrect password");
			return false;
		    }
		
	}
	</script>
<center>
	<form method="post" name="register" submit="return validate()">
	<h1>REGISTRATION </h1>
	<h4> <?php if(isset($msg)){ echo $msg;} ?> </h4>
	
		<input type="text" name="name" placeholder="name"></input><br><br>
		<input type="text"  name="email"placeholder="email"></input><br><br>
		<input type="text"name="phone_no" placeholder="phone_no"></input><br><br>
		<input type="password" name="pwd"  placeholder="password"></input><br><br>
		<input type="password" name="cpwd" placeholder="Con_password"></input><br><br>
		<input type="submit" name="submit" value="submit"></input>
		<input type="submit" value="Reset"></input>
		</center>
	</form>
	