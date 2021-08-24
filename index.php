<?php
session_start();

  include("connection.php");
  include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contoh Website</title>
    <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class="navbar">
          <a href="index.php">Beranda</a>
          <a href="#">FAQ</a>
          <a href="logout.php">Log out</a>
        </div>
      </div>
      <div class="content">
        <h1>Explore The Galaxy</h1>

        <button class="btn">Eksplorasi</button>
      </div>
    </div>
  </body>
</html>
