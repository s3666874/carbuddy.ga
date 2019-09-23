<?php
session_start();

// initializing variables 
$firstName = "";
$lastName = "";
$email = "";
$errors = array();


// connecting to the database
$host = 'localhost';
$user = "root";
$password = "password23";
    
$db = mysqli_connect($host, $user, $password, 'car_buddy');


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* check if server is alive */
if (mysqli_ping($db)) {
} else {
    printf ("Error: %s\n", mysqli_error($db));
}

// Registering users
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // retrieving input values from the form
    // all name are stored in lower case
    // all spaces (including tabs and line ends) are removed from names and email. 
    $firstName = mysqli_real_escape_string($db, strtolower(preg_replace('/\s+/', '', $_POST['firstName']))); 
    $lastName = mysqli_real_escape_string($db, strtolower(preg_replace('/\s+/', '', $_POST['lastName']))); 
    $email = mysqli_real_escape_string($db, preg_replace('/\s+/', '', $_POST['email']));
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    $hash = md5 (rand(0,1000)); // Generate a random 32 character hash
    
    // Form validation: all input fields are required
    if(empty($firstName)){
        array_push($errors, "First name not entered");
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        array_push($errors, "Special symbols in names are not allows");
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
        array_push($errors, "Special symbols in names are not allows");
    }   
    if(empty($lastName)){
        array_push($errors, "Last name not entered");
    }
    if(empty($email)){
        array_push($errors, "Email not entered");
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Email not valid");
        }
    }
    
    if($password1 != $password2){
        array_push($errors, "The two passwords are not the same");
    }
    if(strlen($password1)>50){
        array_push($errors, "Password is too long");
    }
    if(strlen($firstName) >100 OR strlen($lastName)>100){
        array_push($errors, "First name or last name is too long");
    }
    if(strlen($email)>100){
        array_push($errors, "Email is too long");
    }
    
    //Checking whehter the email address has been registered
    $email_check_query = "SELECT * FROM Users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($db, $email_check_query);
    $email_exists_check = mysqli_fetch_assoc($result);
    if($email_exists_check){
        array_push($errors, "Email already registered");
    }
    
    //If no error, register users
    if(count($errors) == 0){
        $password = md5($password1);
        $query = $db->query("INSERT INTO Users (firstName, lastName, email, password, hash) VALUES('$firstName', '$lastName', '$email', '$password', '$hash')");           
        if($query){
        }else{
            echo 'Database query error';
        }
        header("Location: ./reg_success_landing.php");
        echo "User reigserted successful";
        // Return Success - Valid Email    
    }
  
    
}

   /* close connection */
    mysqli_close($db); 
?>
        
        
