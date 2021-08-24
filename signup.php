<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con,$query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Masukkan informasi yang valid!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Contoh Website</title>
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
<div class="container">
<div class="header">
  <h1>Signup</h1>
</div>
<div class="main">
  <form method="post" id="captcha_code">
    <span>
      <i class="fa fa-user"></i>
      <input id="text" type="text" placeholder="Username" name="user_name">
    </span><br>
    <span>
      <i class="fa fa-lock"></i>
      <input id="text" type="password" placeholder="password" name="password">
    </span><br>
      <button type="submit" name="register">Sign up</button><br>
      <h1>Klik untuk log in <a href="login.php">Log in</a><h1><br>
  </form>
</div>
</div>
</body>
</html>
