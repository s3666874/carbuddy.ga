<?php

  session_start();
  include_once('includes/db_connect.php');

  $email = $entered_password = "";
  $email_err = $error_message = $password_err = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["email"]))) {
      $email_err = "Please enter email.";
    } else {
      $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
      $password_err = "Please enter your password.";
    } else {
      $entered_password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
      // Prepare a select statement
      $sql = "SELECT UserID, email, password, FirstName, LastName FROM Users WHERE email = ?";

      if ($stmt = mysqli_prepare($db, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {

          // Store result
          mysqli_stmt_store_result($stmt);

          // Check if username exists, if yes then verify password
          if (mysqli_stmt_num_rows($stmt) == 1) {

            // Bind result variables
            mysqli_stmt_bind_result($stmt, $userid, $email, $password, $firstname, $lastname);

            if (mysqli_stmt_fetch($stmt)) {
              if ($password == md5($entered_password)) {

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["userid"] = $userid;
                $_SESSION["email"] = $email;
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;

                // Redirect user to welcome page
                header("location: index.php");

              } else {
                // Display an error message if password is not valid
                $password_err = "The password you entered was not valid.";
              }
            }
          } else {
            // Display an error message if email doesn't exist
            $email_err = "No account found with that email.";
          }

        } else {
          $error_message = "Oops! Something went wrong. Please try again later.";
        }
      }

      // Free result
      mysqli_stmt_free_result($stmt);

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  include_once('includes/header.php');
?>


<div class="website-phrase"></div>

<div class="centerdform">
  <form class="centerdcontent" method="post" action="login.php">
    <h1 style="text-align: center">Login</H1>

    <p style="text-align: center">
      Please login via the form below:
    </p>

    <p style="color: red;">
      <?php
        if (!empty($error_message)) {
          echo $error_message;
        }

        if (!empty($email_err)) {
          echo $email_err;
        }

        if (!empty($password_err)) {
          echo $password_err;
        }
      ?>
    </p>

    <h2>Login Details </h2>

    <label><strong>Email</strong></label>
    <input type="text" name="email" placeholder="Please enter your email" value="<?php echo $email; ?>" size="100">

    <label><strong>Password</strong></label>
    <input type="password" name="password" placeholder="Please enter your password" value="<?php echo $entered_password; ?>" size="100">

    <div style="text-align: center"><input type="submit" value="LOGIN" ></div>
  </form>
</div>

<?php include_once('includes/footer.php')?>
