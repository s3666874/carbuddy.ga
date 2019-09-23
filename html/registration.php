<?php include_once('header.php') ?>

<body>

<?php include_once('bigNav.php') ?>

<?php include_once('mobileNav.php') ?>
<?php include('registration_server.php') ?>

    <div class="website-phrase">

    </div>
 
    <div class="centerdform">
    <form class="centerdcontent" method="post" action="registration.php">
          <h1 style="text-align: center">Create your account</H1>
      <p style="text-align: center">
        Fist create your account by providing the details below.<br>
        This lets you log into our system to see when cars are available<br>
        You'll need to finish your membership application and be activated before you can book
      </p>
      <?php include('errors.php'); ?>
      <h2>Personal Details </h2>
      <label><strong>First Name</strong></label>
      <input type="text" name="firstName" placeholder="Please enter your First Name" value="<?php echo $firstName; ?>" size="100">  
      <label><strong>last Name</strong></label>
      <input type="text" name="lastName" placeholder="Please enter your Last Name" value="<?php echo $lastName; ?>" size="100">  
      <h2>Account Details</h2>
      <label><strong>Email Address</strong></label>
      <input type="text" name="email" placeholder="Please enter your Email Address" value="<?php echo $email; ?>" size="100">  
      <label><strong>Password</strong></label>
      <input type="password" name="password1" placeholder="Create an account password" size="100">  
      <label><strong>Confirm Password</strong></label>
      <input type="password" name="password2" placeholder="Enter account password again" size="100">  
      <div style="text-align: center"><input type="submit" value="REGISTER" ></div>

    </form>
    </div>
<?php include_once('footer.php')?>

</body>
</html>

