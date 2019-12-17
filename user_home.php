<?php

session_start();
if(isset($_SESSION["sectionname"]))
		{
			$sname=$_SESSION['sectionname'];
			echo "welcome  $sname";
        }
		else
		{
			echo 'failed';
		}
		?>