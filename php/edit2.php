	<?php

	session_start();
if(!$_SESSION["username"])
	{
		header('location:index.html');
	}
	else{
		
	$con = mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Connot connet to Database :" . mysqli_connect_errno());
	}
	else
	{	
				
                     $dname= $_POST['dname'];
		              $dnameold= $_POST['dnameold'];
                    $username= $_SESSION["username"];
				    $dcategory= $_POST['dcategory'];
				    $idate= $_POST['idate'];
				    $dedate= $_POST['dedate'];
	                $drdate= $_POST['drdate'];
					$drdate1= $_POST['drdate1'];
					$drdate2= $_POST['drdate2'];
					$drdate3= $_POST['drdate3'];
					$drdate4= $_POST['drdate4'];
				    $ddesc= $_POST['ddesc'];
		
		
		$editquery=" UPDATE documents SET dname='$dname', dcategory='$dcategory',idate='$idate', dedate='$dedate', drdate='$drdate',  drdate1='$drdate1', drdate2='$drdate2', drdate3='$drdate3', drdate4='$drdate4',ddesc='$ddesc' WHERE
		username= '$username' AND dname='$dnameold'  AND idate='$idate' ";
		
		if(!mysqli_query($con, $editquery))
		{
			echo "<b> Server is down try after sometimes... </b>";
		}
		else
		{
			
			include('loader.php');
			header('refresh: 3; url=http://localhost/Expirytracker/view/vexpirydate.php');
		}
		mysqli_close($con);
	}
	
	}
	
	?>