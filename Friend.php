
<?php 
require('connection.php');
session_start();
if(!isset($_SESSION['user']))
         {
            echo '<script>
        
        location.href="indexl.php";
    </script>';
         }
        else{
$id = $_SESSION['id'];
$user =$_SESSION['user'];

        }
          ?> 

<!DOCTYPE html>
<html>
<head>
	<title>Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="style.css"></link>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  
</head>
<body  style="background-color: #03fcce; margin:0;height:100%;" >

	<div  class="header">

		<div class="row"  >
			<div class="col-md-1"></div>
				<div class="col-md-7">
					<h3 style="text-transform: uppercase;color: white"><a href="Profile.php" style="text-decoration: none"><?php
					echo $user;
					?></a></h3>			
				</div>
		
				<div class="col-md-4">
					<div class="row">
						 <div class="col-md-6">		
							  <button type="button" style="width: 100%;" onclick="location.href='friend.php'" class="btn btn-primary">Friend Request</button>
						</div>
						<div class="col-md-6">	
							  <button type="button" style="width: 100%;"  onclick="location.href='logout.php'" class="btn btn-primary">Logout</button>
						  </div>
					</div>
			</div>
			
		</div>
	</div>
<div class="mid">		

<div class="row">
		<div class="col-md-4">
			
			<h4>Friend Requests</h4>
			<br>
			<div class="row">
				
			<?php 

		    				$result = mysqli_query($conn,"SELECT * FROM `relationship` WHERE (`user_two_id` = '$id')  AND `status` = '0' AND `action_user` != '$id' LIMIT 20");

		    				if($row=mysqli_num_rows($result)>0){
		    				
		    				while($rows = mysqli_fetch_array($result)){
		    				$id2=$rows['action_user'];
		    				
		    				$row = mysqli_fetch_array((mysqli_query($conn,"SELECT `UserName` FROM `users` WHERE `id`='$id2'")));
				    				$name1=$row['UserName'];

				    							    	 echo "
			<div class='col-md-6'>

		    		<h3 style='text-transform:capitalize;'>$name1</h3>
		    		</div>
		    		<div class='col-md-6'>
		    		
		    		<button title='Add' ><a href='update.php?A=".$id2."'>ADD</a></button>
		    		<button title='remove' ><a href='update.php?D=".$id2."'>Remove</a></button>
		    	
		    		</div>
		    		";
		    	}
		    
		}
	
		?>
		</div>
	</div>
		<div class="col-md-4">
			<h4>Friends</h4>
			<br>
		<?php 
		    				$result = mysqli_query($conn,"SELECT * FROM `relationship` WHERE (`user_one_id` = '$id' OR `user_two_id` = '$id') AND `status` = '1' LIMIT 20");
		    				while($rows = mysqli_fetch_array($result)){
		    					$id2=$rows['user_one_id'];
		    					$id3=$rows['user_two_id'];
		    					$row = mysqli_fetch_array(mysqli_query($conn,"SELECT `UserName` FROM `users` WHERE (`id`='$id2' or 'id'= $id3) AND `id`!='$id'"));

		    		   echo "
		    		  <div class='col-md-12'>
		    		<h3 style='text-transform:capitalize;'>".$row['UserName']."</h3>
		    		</div>
		    		
		    		";
		    	}
		    	?>
		</div>
		<div class="col-md-4">
			
			<h4>All Users</h4>
			<br>
			<div class="row">

			<?php 
		    				$id = $_SESSION['id'];

		    	$result = mysqli_query($conn,"SELECT * FROM `users`	Where `UserName`!='$user'  LIMIT 20 ");
		    	while($rows = mysqli_fetch_array($result)){
		    		$id2=$rows['id'];
		    		$result1 = mysqli_query($conn,"SELECT * FROM `relationship`
  WHERE (`user_one_id` = '$id' AND `user_two_id` = '$id2') or (`user_one_id` = '$id2' AND `user_two_id` = '$id')  LIMIT 20 ") ;
		    		if(mysqli_num_rows($result1)==0){
		    		$name=$rows['UserName'];
		    	
		    		
		    		 echo "
		    		  <div class='col-md-6'>

		    		<h3 style='text-transform:capitalize;'>".$name."</h3>
		    		</div>
		    		<div class='col-md-6'>
		    		
		    		<button title='Add' ><a href='update.php?d=".$id2."'>ADD</a></button>
		    		
		    		</div>
		    		";
		    	}
		    }

		    
		    		
		    ?>
		    	<script>
function myFunction2() {
  
  
 
    <?php echo 'window.location.href = "update.php?d='.$name.'";'; ?>
  }</script>
 
		    	</div>

			
			
			
		</div>
		
</div>
</div>


</body>
</html>
