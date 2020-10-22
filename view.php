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
		die("Connt connet to Database");
	}
	else{	
	$today=date('y:m:d');
	// add 3 days to date
	$thisdays=Date('y:m:01', strtotime('+1 month'));
	$nextdays=Date('y:m:01', strtotime('+2 month'));	
	$followingdays=Date('y:m:01', strtotime('+10000 days'));	
	$username=$_SESSION["username"];
	$pro1 = mysqli_query($con,"SELECT `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate`, `pdesc` FROM `products` WHERE `username` =  '$username' AND `prdate` BETWEEN '$today' AND '$thisdays'");
	$pro2 = mysqli_query($con,"SELECT  `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate`, `pdesc` FROM `products` WHERE username = '$username' AND prdate between '$thisdays' AND '$nextdays'");
	$pro3 = mysqli_query($con,"SELECT `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate`, `pdesc` FROM `products` WHERE username = '$username' 	AND prdate between '$nextdays' AND '$followingdays' ");
		
	$doc1 = mysqli_query($con,"SELECT `dname`, `dcategory`, `idate`, `dedate`, `drdate`, `ddesc` FROM `documents`  WHERE `username` =  '$username' AND `drdate` BETWEEN '$today' AND '$thisdays'");
	$doc2 = mysqli_query($con,"SELECT `dname`, `dcategory`, `idate`, `dedate`, `drdate`, `ddesc` FROM `documents`  WHERE `username` =  '$username' AND `drdate` BETWEEN '$thisdays' AND '$nextdays'");
	$doc3 = mysqli_query($con,"SELECT `dname`, `dcategory`, `idate`, `dedate`, `drdate`, `ddesc` FROM `documents`  WHERE `username` =  '$username' AND drdate between '$nextdays' AND '$followingdays' ");
		
	$count1 = 0;
	$count2 = 0;
	$count3 = 0;
		
		 
		while( $row = mysqli_fetch_assoc($pro1))
		{
				$record1[]=$row;
				$count1++;
				
		}
		if(!isset($record1)){
			$record1[] =  array("pname"=>"_____","pcategory"=>"______","Quantity"=>"______","price"=>"________","pdate"=>"_______","pedate"=>"______","prdate"=>"______","pdesc"=>"_____");
			$count1++;
		}
		
		while( $row = mysqli_fetch_assoc($doc1))
		{
				$record2[]=$row;
				$count1++;
		}
		if(!isset($record2)){
			$record2[] =  array("dname"=>"_____","dcategory"=>"______","idate"=>"______","dedate"=>"______","drdate"=>"______","ddesc"=>"__________");
			$count1++;
		}
		while( $row = mysqli_fetch_assoc($pro2))
		{
				$record3[]=$row;
				$count2++;
				
		}
		if(!isset($record3)){
			$record3[] =  array("pname"=>"_____","pcategory"=>"______","Quantity"=>"______","price"=>"________","pdate"=>"_______","pedate"=>"______","prdate"=>"______","pdesc"=>"_____");
			$count2++;
		}
		while( $row = mysqli_fetch_assoc($doc2))
		{
				$record4[]=$row;
				$count2++;
		}
		if(!isset($record4)){
			$record4[] =  array("dname"=>"_____","dcategory"=>"______","idate"=>"______","dedate"=>"______","drdate"=>"______","ddesc"=>"_______");
			$count2++;
		}
		while( $row = mysqli_fetch_assoc($pro3))
		{
				$record5[]=$row;
				$count3++;
				
		}
		if(!isset($record5)){
			$record5[] =  array("pname"=>"_____","pcategory"=>"______","Quantity"=>"______","price"=>"________","pdate"=>"_______","pedate"=>"______","prdate"=>"______","pdesc"=>"_____");
			$count3++;
		}
		while( $row = mysqli_fetch_assoc($doc3))
		{
				$record6[]=$row;
				$count3++;
		}
		if(!isset($record6)){
			$record6[] =  array("dname"=>"_____","dcategory"=>"______","idate"=>"______","dedate"=>"______","drdate"=>"______","ddesc"=>"_______");
			$count3++;
		}
		mysqli_close($con);
			
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view reminder Page</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include('php/navbar.php');
?>
             
             <div class="container" style="margin-top: 150px;">
             <div class="signup-content">
             
             <h2 class="form-title">This Months</h2>
             <hr>
             </div>
             </div>
<div class="card-container2">
	<?php
			foreach($record1 as $rec1){?>
	<div class="card2">	
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec1['prdate'];  ?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec1['pname'];  ?>
                </h2>
				<hr>
			</header>
			<div>
    <p><b> Category  : </b><?Php echo $rec1['pcategory'];  ?></p>
    <p><b> Quantity  : </b><?Php echo $rec1['Quantity'];  ?></p>
    <p><b> Price : </b><?Php echo $rec1['price'];  ?></p>
    <p><b> Purchase Date : </b><?Php echo $rec1['pdate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec1['pedate'];  ?></p>
    <p><b>Description about product :</b><?Php echo $rec1['pdesc'];  ?></p>
    </div>		
        </div>
	<?php }
		
	foreach($record2 as $rec2){?>
	<div class="card2">
			
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec2['drdate'];  ?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec2['dname'];  ?>
                </h2>
				<hr>
			</header>

	<div>
    <p><b> Category  : </b><?Php echo $rec2['dcategory'];  ?></p>
    <p><b> Issue Date : </b><?Php echo $rec2['idate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec2['dedate'];  ?></p>
    <p><b>Description about product :</b><?Php echo $rec2['ddesc'];  ?></p>
    </div>		
    </div>
	<?php }	 
		if($count1 < 8){
	for($i=0;$i<(8-$count1);$i++){
	?>
	<div class="card2">
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date">_______</span>
                    </div>
                </div>
                <h2 class="article-title">
                    ________
                </h2>
				<hr>
			</header>
	<div >
    <p><b> category  : </b>______</p>
    <p><b> Quantity  : </b>___</p>
    <p><b> price : </b>_____</p>
    <p><b> purchase Date : </b>__________</p>
    <p><b> Expiry Date : </b>__________</p>
    <p><b>description about product :</b>____________________</p>
    </div>
    </div>
	<?php }
		}?>
	</div>
	

             <div class="container" style="margin-top: 100px;">
             <div class="signup-content">
             
             <h2 class="form-title">Next Month</h2>
             <hr>
             </div>
             </div>
<div class="card-container2">
		<?php
	
	foreach($record3 as $rec3){?>
	<div class="card2">	
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec3['prdate'];  ?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec3['pname'];  ?>
                </h2>
				<hr>
			</header>
			<div >
    <p><b> category  : </b><?Php echo $rec3['pcategory'];  ?></p>
    <p><b> Quantity  : </b><?Php echo $rec3['Quantity'];  ?></p>
    <p><b> price : </b><?Php echo $rec3['price'];  ?></p>
    <p><b> purchase Date : </b><?Php echo $rec3['pdate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec3['pedate'];  ?></p>
    <p><b>description about product :</b><?Php echo $rec3['pdesc'];  ?></p>
    </div>		
        </div>
	<?php }
		
	foreach($record4 as $rec4){?>
	<div class="card2">
			
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec4['drdate'];  ?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec4['dname'];  ?>
                </h2>
				<hr>
			</header>

			<div>
    <p><b> Category  : </b><?Php echo $rec4['dcategory'];  ?></p>
    <p><b> Issue Date : </b><?Php echo $rec4['idate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec4['dedate'];  ?></p>
    <p><b>Description about product :</b><?Php echo $rec4['ddesc'];  ?></p>
    </div>		
    </div>
	
	<?php }	 
		if($count2 < 8){
	
	for($i=0;$i<(8-$count2);$i++){
	?>
	<div class="card2">
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date">_______</span>
                    </div>
                </div>
                <h2 class="article-title">
                    ________
                </h2>
				<hr>
			</header>
	<div>
    <p><b> Category  : </b>______</p>
    <p><b> Quantity  : </b>___</p>
    <p><b> Price : </b>_____</p>
    <p><b> Purchase Date : </b>__________</p>
    <p><b> Expiry Date : </b>__________</p>
    <p><b>Description about product :</b>____________________</p>
    </div>
    </div>
	<?php }
		}?>
</div>

               <div class="container" style="margin-top: 100px;">
             <div class="signup-content">
             
             <h2 class="form-title">Following Months</h2>
             <hr>
             </div>
             </div>
 <div class="card-container2">
	 	<?php
	foreach($record5 as $rec5){?>
	<div class="card2">	
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec5['prdate'];  ?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec5['pname'];  ?>
                </h2>
				<hr>
			</header>
			<div>
    <p><b> category  : </b><?Php echo $rec5['pcategory'];  ?></p>
    <p><b> Quantity  : </b><?Php echo $rec5['Quantity'];  ?></p>
    <p><b> price : </b><?Php echo $rec5['price'];  ?></p>
    <p><b> purchase Date : </b><?Php echo $rec5['pdate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec5['pedate'];  ?></p>
    <p><b>description about product :</b><?Php echo $rec5['pdesc'];  ?></p>
    </div>		
        </div>
	<?php }
		
	foreach($record6 as $rec6){?>
	<div class="card2">
			
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec6['drdate'];  ?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec6['dname'];  ?>
                </h2>
				<hr>
			</header>

	<div>
    <p><b> Category  : </b><?Php echo $rec6['dcategory'];  ?></p>
    <p><b> Issue Date : </b><?Php echo $rec6['idate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec6['dedate'];  ?></p>
    <p><b>Description about product :</b><?Php echo $rec6['ddesc'];  ?></p>
    </div>		
    </div>
	
	<?php }	 
		if($count3 < 8){
	
for($i=0;$i<(8-$count3);$i++){
	?>
	<div class="card2">
            <header class="article-header">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date">_______</span>
                    </div>
                </div>
                <h2 class="article-title">
                    ________
                </h2>
				<hr>
			</header>
	<div>
    <p><b> category  : </b>______</p>
    <p><b> Quantity  : </b>___</p>
    <p><b> price : </b>_____</p>
    <p><b> purchase Date : </b>__________</p>
    <p><b> Expiry Date : </b>__________</p>
    <p><b>description about product :</b>____________________</p>
    </div>
    </div>
	<?php }
	  }?>
</div> 



  <div class="navbar2" style="margin-top:50px;" >
<p style="text-align: center; margin-bottom: 0pt;"> We hope all your requirements will fullfil with expiry tracker, you can contact us by using below link.</p> 

<a href="https://www.facebook.com/" class="fa fa-facebook"></a> 
<a href="https://twitter.com" class="fa fa-twitter"></a> 
<a href="https://wa.me/917359359602" class="fa fa-whatsapp"></a>
<a href="https://www.instagram.com/" class="fa fa-instagram"></a>
<a href="https://in.pinterest.com" class="fa fa-pinterest"></a>
<p style="clear: left; margin-top: 0pt;"></p> <hr>
<a href="contact%20us.html" >Contact Us OR Feedback</a><br>
<p style="text-align: center;"> © all rights reserved by EXPIRY TRACKER</p><br>

</div>
 
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php }} ?>