<?php

session_start();

	include("connection.php");
	include("functions.php");

  if($_SERVER['REQUEST_METHOD']=="POST"){
    //something was posted
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];

    if(!empty($user_name) && !empty($password)  && !is_numeric($user_name)){
      //read from SQLiteDatabase
      $query = "select * from users where user_name = '$user_name'limit 1";
      $result = mysqli_query($con, $query);

      if($result){
        if($result && mysqli_num_rows($result) > 0){
          $user_data = mysqli_fetch_assoc($result);
          if($user_data['password']===$password){
            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location: index.php");
            die;
          }
        }
      }
      echo "username atau password salah";
    }else {
      echo "username atau password salah";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Contoh Website</title>
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="container">
<div class="header">
  <h1>Login</h1>
</div>
<div class="main">
  <form method="post">
    <span>
      <i class="fa fa-user"></i>
      <input type="text" placeholder="Username" name="user_name">
    </span><br>
    <span>
      <i class="fa fa-lock"></i>
      <input id="text" type="password" placeholder="password" name="password">
    </span><br>
		<span>
			<input type="text" placeholder="captcha" name="captcha_code" id="captcha_code" class="form-control" style="width:100px">
		</span>
		<span class="input-group-addon" style="padding:0">
			<img src="image.php" id="captcha_image">
		</span>
      <button id="text" type="submit">login</button><br>
      <h1>Belum mendaftar?<a href="signup.php">Sign up</a><h1><br>
  </form>
</div>
</div>
</body>
</html>

<script>
	$(document).ready(function(){
		$('#captcha_form').on('submit', function(event){
			event.preventDefault();
			if ($('#captcha_code').val() == '')
			{
				alert('Enter Captcha Code');
				$('#register'),attr('disabled', 'disabled');
				return false;
			}else {
				alert('Form has been validate with Captcha Code');
				$('#captcha_form')[0].reset();
				$('#captcha_image').attr('src', 'image.php');
			}
		});
		$('#captcha_code').on('blur', function(){
			var code = $('captcha_code').val();
			if (code == '') {
				alert('Enter captcha code');
				$('#register').attr('disabled', 'disabled');
			}else {
				$.ajax({
					url:"check_code.php",
					method:"POST",
					data:{code:code},
					success:function(data){
						if(data == 'success'){
							$('#register').attr('disabled', false);
						}else {
							$('#register').attr('disabled', 'disabled');
							alert('invalid code');
						}
					}
				});
			}
		});
	});
</script>
