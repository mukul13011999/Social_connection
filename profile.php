
<?php 
session_start();	
require('connection.php');
echo $_SESSION['user'];
if(!isset($_SESSION['user']))
         {
            echo '<script>
        
        location.href="index.php";
    </script>';
         }
         $user = $_SESSION['user'];
         $id=$_SESSION['id'];
          ?> 
<?php
if(isset($_POST['post1'])){
         	$update =$_POST['upt'];
         	
         
            $res = mysqli_query($conn,"INSERT INTO `updates`(`update`, `postBy`,`DateTime`) VALUES('$update','$user',now())");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="style.css"></link>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

  
</head>
<body  style="background-color: #03fcce; margin:0;height:100%;" >

	<div  class="header">

		<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-7">
					<h3 style="text-transform: uppercase;color: white"><a href="Profile.php" style="text-decoration: none"><?php
					echo $_SESSION['user'];
					?></a></h3>			
				</div>
		
				<div class="col-md-4">
					<div class="row">
						 <div class="col-md-6">		
							  <button type="button" style="width: 100%;" onclick="location.href='friend.php'" class="btn btn-primary">Friend Request </button>&amp;&amp;&amp;
						</div>
						<div class="col-md-6">	
							  <button type="button" style="width: 100%;"  onclick="location.href='logout.php'" class="btn btn-primary"> Logout</button>
						  </div>
					</div>
			</div>
			
		</div>
	</div>

<div class="mid">

	<div class="row">
			<br>
	<br>
	<br>
	<br>
	    <div class="col-md-7">
	    	<div class="section">
	    		<h4>updates</h4>
		    	<div class="main" style="height: 10%;">
		    		<?php 
		    		$result = mysqli_query($conn,"SELECT * FROM `relationship` WHERE (`user_one_id` = '$id' OR `user_two_id` = '$id') AND `status` = '1' LIMIT 20");
		    		if(mysqli_num_rows($result)>0){
		    				while($rows = mysqli_fetch_array($result)){
		    					$id2=$rows['user_one_id'];
		    					$id3=$rows['user_two_id'];
		    					$row = mysqli_fetch_array(mysqli_query($conn,"SELECT `UserName` FROM `users` WHERE (`id`='$id2' or 'id'= $id3) AND `id`!='$id'"));
		    					$usern=$row['UserName'];
		    					$row1 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `updates` where `postBy`='$usern' or `postBy`='$user'"));

		    					
		    		
		    				
		    				

		    						    		   echo "
		    		<h5>".$row1['postBy']."</h5>
		    		<p>".$row1['update']."</p>


		    		";}
		    	}
		    	
		    	else{
		    		$result5=mysqli_query($conn,"SELECT * FROM `updates` where `postBy`='$user'");
		    		while($row1 = mysqli_fetch_array($result5)){

		    						    		   echo "
		    		<h5>".$row1['postBy']."</h5>
		    		<p>".$row1['update']."</p>


		    		";
		    		}

		    	}
		    	?>
		    	</div>

	    		
	    	</div>	
	      
	    </div>
	    <div class="col-md-5" >
	    	<div style="position: fixed;">
	    		<h4>Post a new update</h4>
	    		<div>
	    			<form method="Post" action="Profile.php">
	    			<textarea maxlength="200"  name="upt" rows="6" cols="60" required></textarea>

	    		</div>
	    		<div class="row">
	    			<div class="col-md-8"></div>
	    			<div class="col-md-2">
	    			<button type="submit" name="post1" class="btn btn-primary"  style="width:100px;">Post</button>
	    			<div class="col-md-2">
	    			</div>
	    		</form>	
	    		</div>
	    	</div>
	  
		</div>
	</div>
</div>
<div class="footer">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"><h1>.........</h1></div>
		<div class="col-md-4"></div>
	</div>
</div>

</body>
</html>
