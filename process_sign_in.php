<?php
session_start();
include 'db_config.php';
if(isset($_POST['user_name'])){

    if ( !isset($_POST['user_name'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }
    if ($stmt = $db->prepare('SELECT user_name, password,Type FROM user_details WHERE user_name = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['user_name']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_name, $password, $type);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if ($password==$_POST['password']) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['err_msg'] = "";
                $_SESSION['name'] = $_POST['user_name'];
                echo 'Welcome ' . $_SESSION['name'] . '!';
                $_SESSION['status'] ="all";
                if($type=="Teacher") {
                    
                    header("location: Teacher's_home");
                }
                else if($type=="Admin") {
                    
                    header("location: admin");
                }
              else{
                  header("location: Student's_home");
              }
            } else {
               
                $_SESSION['loggedin'] = false;
                $_SESSION['err_msg'] = "Incorrect username and/or password!";
              header("location: index.php");
                
            }
        } else {
            // Incorrect username
           
            $_SESSION['loggedin'] = false;
            $_SESSION['err_msg'] = "Incorrect username and/or password!";
         header("location: index.php");
        }
    
    
        $stmt->close();
    }
    



}


?>