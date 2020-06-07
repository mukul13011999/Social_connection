<?php
session_start();
require('connection.php');
if (isset($_POST['username']) && isset($_POST['pass'])){

	$username = $_POST['username'];
    $password = $_POST['pass'];
    $slquery = "SELECT * FROM `users` WHERE UserName='$username' and Pass='$password'";
        
        $selectresult = mysqli_query($conn,$slquery);
        if(mysqli_num_rows($selectresult)>0)
        {
        	$rows = mysqli_fetch_array($selectresult);
        	$_SESSION['user'] = $rows['UserName'];
            $_SESSION['id']=$rows['id'];
        	echo '<script>
        location.href="profile.php";
    </script>';
}
else{

	echo '<script>
        alert("username or password does not match");
        location.href="index.php";
    </script>';
}


}

?>