<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Email Verification</title>
</head>
<body>
    <!-- start header div --> 
    <div>
        <h3>Email Verification</h3>
    </div>
    <!-- end header div -->   
     
    <!-- start wrap div -->   
    <div>
        <!-- start PHP code -->
        <?php

            
            // connecting to the database
            $db = mysqli_connect('localhost', 'admin', 'jasf823EL', 'useraccounts');

            /* check connection */
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }

            /* check if server is alive */
            if (mysqli_ping($db)) {
                printf("DB connection is okay");
            } else {
                printf ("Error: %s\n", mysqli_error($db));
            }
            
            /* Verify email and hash received*/
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                $email = mysqli_real_escape_string($db, $_GET['email']);
                $hash = mysqli_real_escape_string($db, $_GET['hash']);
                $search = $db->query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
                $match  = mysqli_num_rows($search);
                if($match>0){
                    // Email and hash matches found, activate the account
                    $update = $db->query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
                    echo '<div>Your account has been activated, you can now login</div>';
                }else{
                    echo '<div>The url is either invalid or you already have activated your account.</div>';
                }
            }else{
                    echo '<div>Invalid link, please use the link that has been send to your email.</div>';
            }
            
            /* close connection */
            mysqli_close($db); 
             
        ?>
        <!-- stop PHP Code -->
 
         
    </div>
    <!-- end wrap div --> 
</body>