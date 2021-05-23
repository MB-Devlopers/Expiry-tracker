<?php

	session_start();
	
if(!$_SESSION["username"])
	{
		header('location:../index.html');
	}
	else{
	$con = mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Connt connet to Database");
	}
	else{	
	$today=date('y:m:d');
	
	$followingdays=Date('y:m:d', strtotime('-10 years' ));
		echo($followingdays);
	$username=$_SESSION["username"];
	$pro1 = mysqli_query($con,"SELECT `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate0`, `prdate1`, `prdate2`, `prdate3`, `prdate4`,  `rdetails`, `pdesc` FROM `products` WHERE `username` =  '$username' AND `prdate0` BETWEEN '$followingdays' AND '$today' OR `prdate1` BETWEEN '$followingdays' AND '$today' OR `prdate2` BETWEEN '$followingdays' AND '$today' OR `prdate3` BETWEEN '$followingdays' AND '$today' OR `prdate4` BETWEEN '$followingdays' AND '$today'");
	
		
	$doc1 = mysqli_query($con,"SELECT `dname`, `dcategory`, `idate`, `dedate`, `drdate0`,`drdate1`,`drdate2`,`drdate3`,`drdate4`, `ddesc` FROM `documents`  WHERE `username` =  '$username' AND `drdate0` BETWEEN '$followingdays' AND '$today' OR `drdate1` BETWEEN '$followingdays' AND '$today' OR `drdate2` BETWEEN '$followingdays' AND '$today' OR `drdate3` BETWEEN '$followingdays' AND '$today' OR `drdate4` BETWEEN '$followingdays' AND '$today'");
	
		
	$count1 = 0;
		$count2 = 0;

	$record1=array();
	$record2=array();

		 
		while( $row = mysqli_fetch_assoc($pro1))
		{
				$record1[]=$row;
				$count1++;
				
		}
		
		while( $row = mysqli_fetch_assoc($doc1))
		{
				$record2[]=$row;
				$count2++;
		}

		
		mysqli_close($con);
			
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view  expired</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/style.css">
<style type="text/css">
	
	
	</style>
	</head>
<body>
<?php
include('../php/navbar.php');
?>
   
               <div class="container" style="margin-top: 90px; width:50%">
             <div class="signup-content">
           <header >
             <h2 class="form-title">expied reminder of product</h2>
             <hr>
			   </br>
			 </header>
             </div>
             </div>
<div class="card-container2">
	<?php
			foreach($record1 as $rec1){?>
	<div class="card2">	
            <header class="article-header" style="margin:0;">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec1['prdate0'];  
							 if(!is_null($rec1['prdate1']))
									   {
										   if($rec1['prdate1']!=='0000-00-00' )
										   {
											  echo ", ". $rec1['prdate1'].", ";

											  if($rec1['prdate2']!=='0000-00-00'  )
											   {
												   echo $rec1['prdate2'].", </br>";

												   if($rec1['prdate3']!=='0000-00-00')
													{
														echo $rec1['prdate3'].", ";

													   if($rec1['prdate4']!=='0000-00-00')
														{
															 echo $rec1['prdate4'].", ";

														}
													}
											   }
									     }
									   }?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec1['pname'];  ?>
                </h2>
				<hr>
			</header>
			<div>
    <p><b> Category  : </b><?Php echo $rec1['pcategory'];?></p>
    <p><b> Quantity  : </b><?Php echo $rec1['Quantity'];?></p>
    <p><b> Price : </b><?Php echo $rec1['price'];?></p>
    <p><b> Purchase Date : </b><?Php echo $rec1['pdate'];?></p>
    <p><b> Expiry Date : </b><?Php echo $rec1['pedate'];?></p>
	<p><b>Retailer details : </b><?Php echo $rec1['rdetails'];?></p>
				<p><b>Description about product : </b><?Php echo $rec1['pdesc'];?></p></br>
				
<a id="edit" class="clickme"  href = '../pedit.php?pname=<?Php echo $rec1['pname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &pcategory=<?Php echo $rec1['pcategory'];?>
				    &Quantity=<?Php echo $rec1['Quantity'];?>
				    &price=<?Php echo $rec1['price'];?>	    &prdate0=<?Php echo $rec1['prdate0'];?>
				   &prdate1=<?Php echo $rec1['prdate1'];?>
					&prdate2=<?Php echo $rec1['prdate2'];?>
					&prdate3=<?Php echo $rec1['prdate3'];?>
					&prdate4=<?Php echo $rec1['prdate4'];?>
				    &pdate=<?Php echo $rec1['pdate'];?>
				    &pedate=<?Php echo $rec1['pedate'];?>
				    &rdetails=<?Php echo $rec1['rdetails'];?>
				    &pdesc=<?Php echo $rec1['pdesc'];?>'><b>edit</b></a>
				<a  style="float: right" id="edit" class="clickme"   href = '../php/delete.php?pname=<?Php echo $rec1['pname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &pcategory=<?Php echo $rec1['pcategory'];?>
				    &Quantity=<?Php echo $rec1['Quantity'];?>
				    &price=<?Php echo $rec1['price'];?>	    &prdate0=<?Php echo $rec1['prdate0'];?>
				   &prdate1=<?Php echo $rec1['prdate1'];?>
					&prdate2=<?Php echo $rec1['prdate2'];?>
					&prdate3=<?Php echo $rec1['prdate3'];?>
					&prdate4=<?Php echo $rec1['prdate4'];?>
				    &pdate=<?Php echo $rec1['pdate'];?>
				    &pedate=<?Php echo $rec1['pedate'];?>
				    &rdetails=<?Php echo $rec1['rdetails'];?>
				    &pdesc=<?Php echo $rec1['pdesc'];?>'><b>delete</b></a>
    </div>		
        </div>

	<?php }	 
		if($count1 < 8){
	for($i=0;$i<(8-$count1);$i++){
	?>
	<div class="card2">
            <header class="article-header" style="margin:0;">
                <div>
                    <div class="category-title">
                     
                        <span class="date"></span>
                    </div>
                </div>
                <h2 class="article-title">
                     empty	
					 
                </h2>
				</br>
				<hr>
			</header>
	<div >
    <p><b> empty </b></p>
      </br></br></br></br> </br></br> </br></br></br></br>
    </div>
    </div>
	<?php }
		}?>
	</div>
	

             <div class="container" style="margin-top: 90px; width:50%">
             <div class="signup-content">
           <header >
             <h2 class="form-title">expired reminder of document</h2>
             <hr>
			   </br>
			 </header>
             </div>
             </div>
<div class="card-container2">
	
	<?php }
		
	foreach($record2 as $rec2){?>
	<div class="card2">
			
            <header class="article-header" style="margin:0;">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec2['drdate0'];  
							if(!is_null($rec2['drdate1']))
									   {
										   if($rec2['drdate1']!=='0000-00-00' )
										   {
											  echo ", ". $rec2['drdate1'].", ";

											  if($rec2['drdate2']!=='0000-00-00'  )
											   {
												   echo $rec2['drdate2'].", </br>";

												   if($rec2['drdate3']!=='0000-00-00')
													{
														echo $rec2['drdate3'].", ";

													   if($rec2['drdate4']!=='0000-00-00')
														{
															 echo $rec2['drdate4'].", ";

														}
													}
											   }
									     }
									   }?></span>
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
				<p><b>Description about product : </b><?Php echo $rec2['ddesc'];  ?></p></br>
      <a  id="edit" class="clickme"    href = '../dedit.php?dname=<?Php echo $rec2['dname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &dcategory=<?Php echo $rec2['dcategory'];?>
				    &idate=<?Php echo $rec2['idate'];?>
				    &dedate=<?Php echo $rec2['dedate'];?> &drdate0=<?Php echo $rec2['drdate0'];?>
				     &drdate1=<?Php echo $rec2['drdate1'];?>
				     &drdate2=<?Php echo $rec2['drdate2'];?>
				     &drdate3=<?Php echo $rec2['drdate3'];?>
				     &drdate4=<?Php echo $rec2['drdate4'];?>
		 &ddesc=<?Php echo $rec2['ddesc'];?>'><b>edit</b></a>
				<a  style="float: right" id="edit" class="clickme"   href = '../php/ddelete.php?dname=<?Php echo $rec2['dname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &dcategory=<?Php echo $rec2['dcategory'];?>
				    &idate=<?Php echo $rec2['idate'];?>
				    &dedate=<?Php echo $rec2['dedate'];?> &drdate0=<?Php echo $rec2['drdate0'];?>
				     &drdate1=<?Php echo $rec2['drdate1'];?>
				     &drdate2=<?Php echo $rec2['drdate2'];?>
				     &drdate3=<?Php echo $rec2['drdate3'];?>
				     &drdate4=<?Php echo $rec2['drdate4'];?>
				    &ddesc=<?Php echo $rec2['ddesc'];?>'><b>delete</b></a>    
				
	</br>
	</br>
	 </br>
	 </br>
	</div>		
    </div>
	
	<?php }	 
		if($count2 < 8){
	
	for($i=0;$i<(8-$count2);$i++){
	?>
	<div class="card2">
            <header class="article-header" style="margin:0;">
                <div>
                   <div class="category-title">
                     
                        <span class="date"></span>
                    </div>
                </div>
                <h2 class="article-title">
                     empty
					 
                </h2>
				</br>
				<hr>
			</header>
	<div >
    <p><b> empty </b></p>
      </br></br></br></br></br></br> </br></br></br></br>
    </div>
    </div>
	<?php }
	  }?>
</div> 


  <div class="navbar2" style="margin-top:50px;" >
<p style="text-align: center; margin-bottom: 0pt;"> We hope all your requirements will fullfil with expiry tracker, you can contact us by using below link.</p> 

<a href="https://www.facebook.com/" class="fa fa-facebook"></a> 
<a href="https://twitter.com" class="fa fa-twitter"></a> 
<a href="https://wa.me/" class="fa fa-whatsapp"></a>
<a href="https://www.instagram.com/" class="fa fa-instagram"></a>
<a href="https://in.pinterest.com" class="fa fa-pinterest"></a>
<p style="clear: left; margin-top: 0pt;"></p> <hr>
<a href="../contact%20us.html" >Contact Us OR Feedback</a><br>
<p style="text-align: center;"> © all rights reserved by EXPIRY TRACKER</p><br>

</div>
 
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php } ?>