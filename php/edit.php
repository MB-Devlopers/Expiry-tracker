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
			$username=$_SESSION["username"];
	$pnameold=$_POST["pnameold"];
	$pname=$_POST["pname"];
    $pcategory=$_POST["pcategory"];
	$Quantity=$_POST["Quantity"];
	$price=$_POST["price"];
    $prdate0=$_POST["prdate0"];
	$prdate1=$_POST["prdate1"];
	$prdate2=$_POST["prdate2"];
	$prdate3=$_POST["prdate3"];
	$prdate4=$_POST["prdate4"];
	$pdate=$_POST["pdate"];
	$pedate=$_POST["pedate"];
	$rdetails=$_POST["rdetails"];
	$pdesc=$_POST["pdesc"];
		$flag0=0;$flag1=0;$flag2=0;$flag3=0;$flag4=0;
		

		
		$editquery0=" UPDATE products SET flag0='$flag0'WHERE
		username= '$username' AND pname='$pnameold'  AND prdate0 !='$prdate0' ";
		
		$editquery1=" UPDATE products SET flag1='$flag1' WHERE
		username= '$username' AND pname='$pnameold'  AND prdate1 !='$prdate1' ";
		
		$editquery2=" UPDATE products SET flag2='$flag2' WHERE
		username= '$username' AND pname='$pnameold'  AND prdate2 !='$prdate2' ";
		
		$editquery3=" UPDATE products SET flag3='$flag3' WHERE
		username= '$username' AND pname='$pnameold'  AND prdate3 !='$prdate3' ";
		
		$editquery4=" UPDATE products SET flag4='$flag4' WHERE
		username= '$username' AND pname='$pnameold'  AND prdate4 !='$prdate4' ";
		
		$editquery=" UPDATE products SET pname='$pname', pcategory='$pcategory',Quantity ='$Quantity', price='$price',pdate='$pdate', pedate='$pedate', prdate0='$prdate0',prdate1='$prdate1',prdate2='$prdate2',prdate3='$prdate3',prdate4='$prdate4', rdetails='$rdetails', pdesc='$pdesc' WHERE
		username= '$username' AND pname='$pnameold'  AND pdate='$pdate' ";
		
		mysqli_query($con, $editquery0);
		mysqli_query($con, $editquery1);
		mysqli_query($con, $editquery2);
		mysqli_query($con, $editquery3);
		mysqli_query($con, $editquery4);
		
		if(!mysqli_query($con, $editquery))
		{
			echo "<b> Server is down try after sometimes... </b>";
		}
		else
		{
			
			include("loader.php");
			header('refresh: 3; url=http://localhost/Expirytracker/search/sname.php');
		}
		mysqli_close($con);
	}
	
	}
	
	?>