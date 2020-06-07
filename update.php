
<?php 
require('connection.php');
session_start();
if(!isset($_SESSION['user']))
         {
            echo '<script>
        
        location.href="index.php";
    </script>';
         }
        else{
$id = $_SESSION['id'];
$user =$_SESSION['user'];

        }
          ?> 
          <?php 


if(@$_GET['d']) {
$d=@$_GET['d'];
echo $d;
$r2 = mysqli_query($conn,"INSERT INTO `relationship`(`user_one_id`, `user_two_id`, `status`, `action_user`) VALUES ('$id','$d','0','$id')") or die('Error');

header("location:Friend.php");
}
if(@$_GET['A']) {
$d=@$_GET['A'];
echo $d;
$r2 = mysqli_query($conn,"UPDATE `relationship` SET `status` = '1', `action_user` = '$d' WHERE `user_one_id` = '$d' AND `user_two_id` = '$id'") or die('Error');

header("location:Friend.php");
}
if(@$_GET['D']) {
$d=@$_GET['D'];

$r2 = mysqli_query($conn,"UPDATE `relationship` SET `status` = '2', `action_user` = '$d' WHERE `user_one_id` = '$d' AND `user_two_id` = '$id'") or die('Error');

header("location:Friend.php");
}
?>