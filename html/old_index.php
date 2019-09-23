<?php include_once "includes/header.php"; ?>

<h1 style="text-align: center;">Welcome to Car Buddy</h1>

<?php
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT UserID, FirstName, LastName, Age FROM Users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["UserID"]. " - First Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
    }
  } else {
    echo "0 results";
  }
?>

<h1>Below are the current settings for PHP</h1>
<br/>
<?php phpinfo(); ?>


<?php include_once "includes/footer.php"; ?>
