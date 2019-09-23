<?php include_once('includes/header.php') ?>

<div class="website-phrase"></div>

<div class="centerdform">
  <form class="centerdcontent" method="post" action="login.php">
    <h1 style="text-align: center">Login</H1>

    <p style="text-align: center">
      Please login via the form below
    </p>

    <h2>Login Details </h2>

    <label><strong>Username</strong></label>
    <input type="text" name="firstName" placeholder="Please enter your username" value="<?php echo $firstName; ?>" size="100">

    <label><strong>Password</strong></label>
    <input type="password" name="password" placeholder="Please enter your password" value="<?php echo $lastName; ?>" size="100">

    <div style="text-align: center"><input type="submit" value="LOGIN" ></div>
  </form>
</div>

<?php include_once('includes/footer.php')?>
