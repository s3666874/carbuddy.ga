<div id="navBar">
  <ul>
    <img src="/images/Logo.png" alt="car_buddy_logo" width="140px" height="80px">
    <li><a class="active" href="index.php"><strong>Home</strong></a></li>

    <li><a href="#booking"><strong>Booking</strong></a></li>
    <li><a href="#findcars"><strong>Find Cars</strong></a></li>
    <li><a href="#about"><strong>About Us</strong></a></li>

    <?php
      $temp= $_SERVER['PHP_SELF'];

      	if ($temp != "/registration.php"){
      		$button = "window.location.href='registration.php';";
      		echo'<button onclick='.$button.'><strong>Sign Up</strong></button>';
      };
    ?>

    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
      <button onclick="window.location.href = 'logout.php'"><strong>Logout</strong></button>
    <?php } else { ?>
      <button onclick="window.location.href = 'login.php'"><strong>Login</strong></button>
    <?php } ?>
  </ul>
</div>
