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
	// add 3 days to date
	$thisdays=Date('y:m:t');
	$thisnextdays=Date('y:m:01', strtotime('+1 month'));
	$nextdays=Date('y:m:t', strtotime('+1 month ' ));	
	$followingdays=Date('y:m:d', strtotime('+40 years' ));	
	$username=$_SESSION["username"];
	$pro1 = mysqli_query($con,"SELECT `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate0`, `prdate1`, `prdate2`, `prdate3`, `prdate4`,  `rdetails`, `pdesc` FROM `products` WHERE `username` =  '$username' AND `prdate0` BETWEEN '$today' AND '$thisdays' OR `prdate1` BETWEEN '$today' AND '$thisdays' OR `prdate2` BETWEEN '$today' AND '$thisdays' OR `prdate3` BETWEEN '$today' AND '$thisdays' OR `prdate4` BETWEEN '$today' AND '$thisdays'");
		
	$pro2 = mysqli_query($con,"SELECT `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate0`, `prdate1`, `prdate2`, `prdate3`, `prdate4`,  `rdetails`, `pdesc` FROM `products` WHERE `username` =  '$username' AND `prdate0` BETWEEN '$thisnextdays' AND '$nextdays' OR `prdate1` BETWEEN '$thisnextdays' AND '$nextdays' OR `prdate2` BETWEEN '$thisnextdays' AND '$nextdays' OR `prdate3` BETWEEN '$thisnextdays' AND '$nextdays' OR `prdate4` BETWEEN '$thisnextdays' AND '$nextdays'");
		
	$pro3 = mysqli_query($con,"SELECT `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate0`, `prdate1`, `prdate2`, `prdate3`, `prdate4`,  `rdetails`, `pdesc` FROM `products` WHERE `username` =  '$username' AND `prdate0` BETWEEN '$nextdays' AND '$followingdays' OR `prdate1` BETWEEN '$nextdays' AND '$followingdays' OR `prdate2` BETWEEN '$nextdays' AND '$followingdays' OR `prdate3` BETWEEN '$nextdays' AND '$followingdays' OR `prdate4` BETWEEN '$nextdays' AND '$followingdays'");
		
$doc1 = mysqli_query($con,"SELECT `dname`, `dcategory`, `idate`, `dedate`, `drdate0`,`drdate1`,`drdate2`,`drdate3`,`drdate4`, `ddesc` FROM `documents`  WHERE `username` =  '$username' AND `drdate0` BETWEEN '$today' AND '$thisdays' OR `drdate1` BETWEEN '$today' AND '$thisdays' OR `drdate2` BETWEEN '$today' AND '$thisdays' OR `drdate3` BETWEEN '$today' AND '$thisdays' OR `drdate4` BETWEEN '$today' AND '$thisdays'");
		
	$doc2 = mysqli_query($con,"SELECT `dname`, `dcategory`, `idate`, `dedate`, `drdate0`,`drdate1`,`drdate2`,`drdate3`,`drdate4`, `ddesc` FROM `documents`  WHERE `username` =  '$username' AND `drdate0` BETWEEN '$thisnextdays' AND '$nextdays' OR `drdate1` BETWEEN '$thisnextdays' AND '$nextdays' OR `drdate2` BETWEEN '$thisnextdays' AND '$nextdays' OR `drdate3` BETWEEN '$thisnextdays' AND '$nextdays' OR `drdate4` BETWEEN '$thisnextdays' AND '$nextdays'");
		
	$doc3 = mysqli_query($con,"SELECT `dname`, `dcategory`, `idate`, `dedate`, `drdate0`,`drdate1`,`drdate2`,`drdate3`,`drdate4`, `ddesc` FROM `documents`  WHERE `username` =  '$username' AND `drdate0` BETWEEN '$nextdays' AND '$followingdays' OR `drdate1` BETWEEN '$nextdays' AND '$today' OR `drdate2` BETWEEN '$followingdays' AND '$today' OR `drdate3` BETWEEN '$followingdays' AND '$today' OR `drdate4` BETWEEN '$followingdays' AND '$today'");
		
	$count1 = 0;
	$count2 = 0;
	$count3 = 0;
	$record1=array();
	$record2=array();
	$record3=array();
	$record4=array();
	$record5=array();
	$record6=array();
		
		 
		while( $row = mysqli_fetch_assoc($pro1))
		{
				$record1[]=$row;
				$count1++;
				
		}
		
		while( $row = mysqli_fetch_assoc($doc1))
		{
				$record2[]=$row;
				$count1++;
		}
		while( $row = mysqli_fetch_assoc($pro2))
		{
				$record3[]=$row;
				$count2++;
				
		}
		while( $row = mysqli_fetch_assoc($doc2))
		{
				$record4[]=$row;
				$count2++;
		}
			while( $row = mysqli_fetch_assoc($pro3))
		{
				$record5[]=$row;
				$count3++;
				
		}
			while( $row = mysqli_fetch_assoc($doc3))
		{
				$record6[]=$row;
				$count3++;
		}
		/*if(!isset($record1)){
			$record1[] =  array("pname"=>"_____","pcategory"=>"______","Quantity"=>"______","price"=>"________","pdate"=>"_______","pedate"=>"______","prdate0"=>"______","pdesc"=>"_____");
			$count1++;
		}
		
		if(!isset($record2)){
			$record2[] =  array("dname"=>"_____","dcategory"=>"______","idate"=>"______","dedate"=>"______","drdate0"=>"______","ddesc"=>"__________");
			$count1++;
		}
		
		if(!isset($record3)){
			$record3[] =  array("pname"=>"_____","pcategory"=>"______","Quantity"=>"______","price"=>"________","pdate"=>"_______","pedate"=>"______","prdate0"=>"______","pdesc"=>"_____");
			$count2++;
		}
		
		if(!isset($record4)){
			$record4[] =  array("dname"=>"_____","dcategory"=>"______","idate"=>"______","dedate"=>"______","drdate0"=>"______","ddesc"=>"_______");
			$count2++;
		}
	
		if(!isset($record5)){
			$record5[] =  array("pname"=>"_____","pcategory"=>"______","Quantity"=>"______","price"=>"________","pdate"=>"_______","pedate"=>"______","prdate0"=>"______","pdesc"=>"_____");
			$count3++;
		}
	
		if(!isset($record6)){
			$record6[] =  array("dname"=>"_____","dcategory"=>"______","idate"=>"______","dedate"=>"______","drdate0"=>"______","ddesc"=>"_______");
			$count3++;
		}*/
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
   <link rel="stylesheet" href="../css/style.css">

	</head>
<body>
<?php
include('../php/navbar.php');
?>
          
             
               <div class="container" style="margin-top: 90px; width:50%">
             <div class="signup-content">
           <header >
             <h2 class="form-title">Reminder date of current Month</h2>
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
		
	foreach($record2 as $rec2){?> 
	<div style="hight: 50px;" class="card2">
			
            <header class="article-header" style="margin:0; ">
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
    <a id="edit" class="clickme" href = '../dedit.php?dname=<?Php echo $rec2['dname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &dcategory=<?Php echo $rec2['dcategory'];?>
				    &idate=<?Php echo $rec2['idate'];?>
				    &dedate=<?Php echo $rec2['dedate'];?> &drdate0=<?Php echo $rec2['drdate0'];?>
				     &drdate1=<?Php echo $rec2['drdate1'];?>
				     &drdate2=<?Php echo $rec2['drdate2'];?>
				     &drdate3=<?Php echo $rec2['drdate3'];?>
				     &drdate4=<?Php echo $rec2['drdate4'];?>
				    &ddesc=<?Php echo $rec2['ddesc'];?>'><b>edit</b></a>
		
				<a style="float: right" id="edit" class="clickme"   href = '../php/ddelete.php?dname=<?Php echo $rec2['dname'];?>
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
	</br></div>		
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
             <h2 class="form-title">reminder date of Next Month</h2>
             <hr>
			   </br>
			 </header>
             </div>
             </div>
<div class="card-container2">
		<?php
	
	foreach($record3 as $rec3){?>
	<div class="card2">	
            <header class="article-header" style="margin:0;">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec3['prdate0']; 
							  if(!is_null($rec3['prdate1']))
									   {
										   if($rec3['prdate1']!=='0000-00-00' )
										   {
											  echo ", ". $rec3['prdate1'].", ";

											  if($rec3['prdate2']!=='0000-00-00'  )
											   {
												   echo $rec3['prdate2'].", </br>";

												   if($rec3['prdate3']!=='0000-00-00')
													{
														echo $rec3['prdate3'].", ";

													   if($rec3['prdate4']!=='0000-00-00')
														{
															 echo $rec3['prdate4'].", ";

														}
													}
											   }
									     }
									   }?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec3['pname'];  ?>
                </h2>
				<hr>
				
			</header>
			<div >
	 <p ><b> category  : </b><?Php echo $rec3['pcategory'];  ?></p>
    <p><b> Quantity  : </b><?Php echo $rec3['Quantity'];  ?></p>
    <p><b> price : </b><?Php echo $rec3['price'];  ?></p>
    <p><b> purchase Date : </b><?Php echo $rec3['pdate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec3['pedate'];  ?></p>
	<p><b>Retailer details : </b><?Php echo $rec3['rdetails'];  ?></p>
				<p><b>description about product : </b><?Php echo $rec3['pdesc'];  ?></p></br>
				
<a id="edit" class="clickme"   href = '../pedit.php?pname=<?Php echo $rec3['pname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &pcategory=<?Php echo $rec3['pcategory'];?>
				    &Quantity=<?Php echo $rec3['Quantity'];?>
				    &price=<?Php echo $rec3['price'];?>	    &prdate0=<?Php echo $rec3['prdate0'];?>
				   &prdate1=<?Php echo $rec3['prdate1'];?>
					&prdate2=<?Php echo $rec3['prdate2'];?>
					&prdate3=<?Php echo $rec3['prdate3'];?>
					&prdate4=<?Php echo $rec3['prdate4'];?>
				    &pdate=<?Php echo $rec3['pdate'];?>
				    &pedate=<?Php echo $rec3['pedate'];?>
				    &rdetails=<?Php echo $rec3['rdetails'];?>
				    &pdesc=<?Php echo $rec3['pdesc'];?>'><b>edit</b></a>
				<a  style="float: right" id="edit" class="clickme"   href = '../php/delete.php?pname=<?Php echo $rec3['pname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &pcategory=<?Php echo $rec3['pcategory'];?>
				    &Quantity=<?Php echo $rec3['Quantity'];?>
				    &price=<?Php echo $rec3['price'];?>	    &prdate0=<?Php echo $rec3['prdate0'];?>
				   &prdate1=<?Php echo $rec3['prdate1'];?>
					&prdate2=<?Php echo $rec3['prdate2'];?>
					&prdate3=<?Php echo $rec3['prdate3'];?>
					&prdate4=<?Php echo $rec3['prdate4'];?>
				    &pdate=<?Php echo $rec3['pdate'];?>
				    &pedate=<?Php echo $rec3['pedate'];?>
				    &rdetails=<?Php echo $rec3['rdetails'];?>
				    &pdesc=<?Php echo $rec3['pdesc'];?>'><b>delete</b></a>
    </div>		
        </div>
	<?php }
		
	foreach($record4 as $rec4){?>
	<div class="card2">
			
            <header class="article-header" style="margin:0;">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec4['drdate0']; 
							  if(!is_null($rec4['drdate1']))
									   {
										   if($rec4['drdate1']!=='0000-00-00' )
										   {
											  echo ", ". $rec4['drdate1'].", ";

											  if($rec4['drdate2']!=='0000-00-00'  )
											   {
												   echo $rec4['drdate2'].", </br>";

												   if($rec4['drdate3']!=='0000-00-00')
													{
														echo $rec4['drdate3'].", ";

													   if($rec4['drdate4']!=='0000-00-00')
														{
															 echo $rec4['drdate4'].", ";

														}
													}
											   }
									     }
									   }?></span>
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
				<p><b>Description about product : </b><?Php echo $rec4['ddesc'];  ?></p></br>
      <a  id="edit" class="clickme"    href = '../dedit.php?dname=<?Php echo $rec4['dname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &dcategory=<?Php echo $rec4['dcategory'];?>
				    &idate=<?Php echo $rec4['idate'];?>
				    &dedate=<?Php echo $rec4['dedate'];?> &drdate0=<?Php echo $rec4['drdate0'];?>
				     &drdate1=<?Php echo $rec4['drdate1'];?>
				     &drdate2=<?Php echo $rec4['drdate2'];?>
				     &drdate3=<?Php echo $rec4['drdate3'];?>
				     &drdate4=<?Php echo $rec4['drdate4'];?>
		 &ddesc=<?Php echo $rec4['ddesc'];?>'><b>edit</b></a>
				<a  style="float: right" id="edit" class="clickme"   href = '../php/ddelete.php?dname=<?Php echo $rec2['dname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &dcategory=<?Php echo $rec4['dcategory'];?>
				    &idate=<?Php echo $rec4['idate'];?>
				    &dedate=<?Php echo $rec4['dedate'];?> &drdate0=<?Php echo $rec4['drdate0'];?>
				     &drdate1=<?Php echo $rec4['drdate1'];?>
				     &drdate2=<?Php echo $rec4['drdate2'];?>
				     &drdate3=<?Php echo $rec4['drdate3'];?>
				     &drdate4=<?Php echo $rec4['drdate4'];?>
				    &ddesc=<?Php echo $rec4['ddesc'];?>'><b>delete</b></a>    
				
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

                <div class="container" style="margin-top: 50px; width:50%">
             <div class="signup-content">
           <header >
             <h2 class="form-title">Reminder date of  remaining Month</h2>
             <hr>
			 <br
			 </header>
             </div>
             </div>
 <div class="card-container2">
	 	<?php
	foreach($record5 as $rec5){?>
	<div class="card2">	
            <header class="article-header" style="margin:0;">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec5['prdate0'];  
							  if(!is_null($rec5['prdate1']))
									   {
										   if($rec5['prdate1']!=='0000-00-00' )
										   {
											  echo ", ". $rec5['prdate1'].", ";

											  if($rec5['prdate2']!=='0000-00-00'  )
											   {
												   echo $rec5['prdate2'].", </br>";

												   if($rec5['prdate3']!=='0000-00-00')
													{
														echo $rec5['prdate3'].", ";

													   if($rec5['prdate4']!=='0000-00-00')
														{
															 echo $rec5['prdate4'].", ";

														}
													}
											   }
									     }
									   }?></span>
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
	<p><b>Retailer details : </b><?Php echo $rec5['rdetails'];  ?></p>
				<p><b>description about product : </b><?Php echo $rec5['pdesc'];  ?></p></br>
							
<a id="edit" class="clickme"  href = '../pedit.php?pname=<?Php echo $rec5['pname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &pcategory=<?Php echo $rec5['pcategory'];?>
				    &Quantity=<?Php echo $rec5['Quantity'];?>
				    &price=<?Php echo $rec5['price'];?>	    &prdate0=<?Php echo $rec5['prdate0'];?>
				   &prdate1=<?Php echo $rec5['prdate1'];?>
					&prdate2=<?Php echo $rec5['prdate2'];?>
					&prdate3=<?Php echo $rec5['prdate3'];?>
					&prdate4=<?Php echo $rec5['prdate4'];?>
				    &pdate=<?Php echo $rec5['pdate'];?>
				    &pedate=<?Php echo $rec5['pedate'];?>
				    &rdetails=<?Php echo $rec5['rdetails'];?>
				    &pdesc=<?Php echo $rec5['pdesc'];?>'><b>edit</b></a>
				<a  style="float: right" id="edit" class="clickme"   href = '../php/delete.php?pname=<?Php echo $rec5['pname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &pcategory=<?Php echo $rec5['pcategory'];?>
				    &Quantity=<?Php echo $rec5['Quantity'];?>
				    &price=<?Php echo $rec5['price'];?>	    &prdate0=<?Php echo $rec5['prdate0'];?>
				   &prdate1=<?Php echo $rec5['prdate1'];?>
					&prdate2=<?Php echo $rec5['prdate2'];?>
					&prdate3=<?Php echo $rec5['prdate3'];?>
					&prdate4=<?Php echo $rec5['prdate4'];?>
				    &pdate=<?Php echo $rec5['pdate'];?>
				    &pedate=<?Php echo $rec5['pedate'];?>
				    &rdetails=<?Php echo $rec5['rdetails'];?>
				    &pdesc=<?Php echo $rec5['pdesc'];?>'><b>delete</b></a>
    </div>		
        </div>
	<?php }
		
	foreach($record6 as $rec6){?>
	<div class="card2">
			
            <header class="article-header" style="margin:0;">
                <div>
                    <div class="category-title">
                        Reminder Date : 
                        <span class="date"><?Php echo $rec6['drdate0']; 
							  if(!is_null($rec6['drdate1']))
									   {
										   if($rec6['drdate1']!=='0000-00-00' )
										   {
											  echo ", ". $rec6['drdate1'].", ";

											  if($rec6['drdate2']!=='0000-00-00'  )
											   {
												   echo $rec6['drdate2'].", </br>";

												   if($rec6['drdate3']!=='0000-00-00')
													{
														echo $rec6['drdate3'].", ";

													   if($rec6['drdate4']!=='0000-00-00')
														{
															 echo $rec6['drdate4'].", ";

														}
													}
											   }
									     }
									   }?></span>
                    </div>
                </div>
                <h2 class="article-title">
                    <?Php echo $rec6['dname'];  ?>
                </h2>
				<hr>
			</header>

	<div style="padding-top:0";>
    <p><b> Category  : </b><?Php echo $rec6['dcategory'];  ?></p>
    <p><b> Issue Date : </b><?Php echo $rec6['idate'];  ?></p>
    <p><b> Expiry Date : </b><?Php echo $rec6['dedate'];  ?></p>
		<p><b>Description about product : </b><?Php echo $rec6['ddesc'];  ?></p></br>
		  <a  id="edit" class="clickme"   href = '../dedit.php?dname=<?Php echo $rec6['dname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &dcategory=<?Php echo $rec6['dcategory'];?>
				    &idate=<?Php echo $rec6['idate'];?>
				    &dedate=<?Php echo $rec6['dedate'];?> &drdate0=<?Php echo $rec6['drdate0'];?>
				     &drdate1=<?Php echo $rec6['drdate1'];?>
				     &drdate2=<?Php echo $rec6['drdate2'];?>
				     &drdate3=<?Php echo $rec6['drdate3'];?>
				     &drdate4=<?Php echo $rec6['drdate4'];?>
				    &ddesc=<?Php echo $rec6['ddesc'];?>'><b>edit</b></a>
				<a  style="float: right" id="edit" class="clickme"   href = '../php/ddelete.php?dname=<?Php echo $rec2['dname'];?>
                    &username=<?php echo $_SESSION['username'];?>
				    &dcategory=<?Php echo $rec6['dcategory'];?>
				    &idate=<?Php echo $rec6['idate'];?>
				    &dedate=<?Php echo $rec6['dedate'];?> &drdate0=<?Php echo $rec6['drdate0'];?>
				     &drdate1=<?Php echo $rec6['drdate1'];?>
				     &drdate2=<?Php echo $rec6['drdate2'];?>
				     &drdate3=<?Php echo $rec6['drdate3'];?>
				     &drdate4=<?Php echo $rec6['drdate4'];?>
				    &ddesc=<?Php echo $rec6['ddesc'];?>'><b>delete</b></a>   
		
	</br>
	</br>
	</br>
	</br>
    </div>		
    </div>
	
	<?php }	 
		if($count3 < 8){
	
for($i=0;$i<(8-$count3);$i++){
	?>
	<div class="card2">
            <header class="article-header" style="margin:0;">
                <div>
                  <!--  <div class="category-title">
                        Reminder Date : 
                        <span class="date">_______</span>
                    </div>
                </div>
                <h2 class="article-title">
                    ________
                </h2>
				<hr>
			</header>

	<div style=" padding-top:0";>
    <p><b> category  : </b>______</p>
    <p><b> Quantity  : </b>___</p>
    <p><b> price : </b>_____</p>
    <p><b> purchase Date : </b>__________</p>
    <p><b> Expiry Date : </b>__________</p>
    <p><b>description about product :</b>____________________</p>
    </div>
    </div>-->
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
      </br></br></br></br> </br></br></br></br></br></br>
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
<a href="contact%20us.html" >Contact Us OR Feedback</a><br>
<p style="text-align: center;"> © all rights reserved by EXPIRY TRACKER</p><br>

</div>
 
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php }} ?>