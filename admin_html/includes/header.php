<?php
  session_start();

  if (!isset($_SESSION["admin_loggedin"])) {
    header("location: login.php");
  }
?>

<!doctype html>
<html>
<head>
  <title>Car Buddy Admin</title>
  <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
  <div id="top_banner">
    <h1>CarBuddy Admin</h1>
    <p>Welcome <?php echo $_SESSION["adminFirstname"] ?> <?php echo $_SESSION["adminLastname"] ?></p>
  </div>
  <div id="sidebar">
    <ul id="admin_side_menu">
      <li><a href="users/list.php">Users</a></li>
      <li>User Types</li>
      <li>Cars</li>
    </ul>
  </div>
  <div id="main_body">
