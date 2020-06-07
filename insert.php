<?php
require('connection.php');

if($_POST['pass']==$_POST['cpass']){
    
    if (isset($_POST['username']) && isset($_POST['pass'])){
        $username = $_POST['username'];
     
        $password = $_POST['pass'];
       
        $slquery = "SELECT * FROM `users` WHERE UserName='$username'";
       
        $selectresult = mysqli_query($conn,$slquery);
        if(mysqli_num_rows($selectresult)>0)
        {
            echo '<script>
        alert("User Name Already Exist");
        location.href="signup.php";
    </script>';
        }
        $query = "INSERT INTO `users`(`UserName`, `Pass`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn,$query);
        if($result){
            
            echo '<script>
            alert("succesfully created");
location.href="index.php";
    </script>';
        }
       }

    }
else{
    echo '<script>
alert("password does not match");
location.href="signup.php";
    </script>';
}
?>