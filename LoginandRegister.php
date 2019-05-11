<?php

  require("config/Database.php");

  session_start();  

  // initializing variables
  $username = "";
  $email    = "";
  $errors = 0; 

  // Register
  if (isset($_POST['reg_user'])) {
   
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    // Verified in client, this is no longer needed
    // if (empty($username)) { array_push($errors, "Username is required"); }
    // if (empty($email)) { array_push($errors, "Email is required"); }
    // if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      $errors++;
      $_SESSION['message'] = "The two passwords do not match";
    }
    if (!preg_match('/^[a-z\d]{2,64}$/i', $username) || !preg_match('/^[a-z\d]{2,64}$/i', $email) ) {
      $errors++;
      $_SESSION['message'] = "Only letters and numbers are allowed for username and email";
    }

    
    $user_check_query = "SELECT * FROM users WHERE user_name='$username' OR user_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['user_name'] === $username) {
        $errors++;
        $_SESSION['message'] = "Username already exists";
      }

      if ($user['user_email'] === $email) {
        $errors++;
        $_SESSION['message'] = "email already exists";
      }
    }

    // Finally, register user if there are no errors in the form
    if ($errors == 0) {
      $password = md5($password_1);//encrypt the password before saving to the database
      $query = "INSERT INTO users (user_name, user_email, user_password, user_role) 
            VALUES('$username', ' $email', '$password', '2')";
      mysqli_query($conn, $query);
      $_SESSION['username'] = $username;
      $_SESSION['message'] = "Register successfully";
      header('location: index.php');
    }
  }
  // End register

  // Login
  if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Verified in client, this is no longer needed
    // if (empty($email)) {
    //   array_push($errors, "Email is required");
    //   $_SESSION['message'] = "Email is required";
    // }
    // if (empty($password)) {
    //   array_push($errors, "Password is required");
    //   $_SESSION['message'] = "Password is required";
    // }

      $password = md5($password);
      $query = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
      $results = mysqli_query($conn, $query);
      $user = mysqli_fetch_assoc($results);
      if (mysqli_num_rows($results) == 1) {
        $username = $user["user_name"];
        $_SESSION['username'] = $username;
        $_SESSION['message'] = "You are now logged in";
        header('location: index.php');
        die();
      }else {
        array_push($errors, "Wrong username/password combination");
        $_SESSION['message'] = "Wrong username/password combination";
      }

  }
  // End login
?>