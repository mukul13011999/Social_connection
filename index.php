
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css"></link>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body style="background-color: #03fcce;">


<div class="mid" style="padding-top: 70px;">
  <div class="row">
    <div class="col-md-4">
      
    </div>
    <div class="col-md-4">
      <h3 style="text-align: center;">Login</h3>
  <form action="validate.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
<div style="text-align: center;" >
  <button type="submit"  class="btn btn-primary">LogIn</button>
  <button type="button"  onclick="location.href='signp.php'" class="btn btn-primary">SignUp</button>
</div>

</form>
</div>
<div class="col-md-4"></div>
</div>
</div>

<div class="footer">
  
</div>

</body>

</html>
