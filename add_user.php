<?php
    require("config/Database.php");
    require("check_permission.php");
    session_start();

    // initializing variables
  $username = "";
  $email    = "";
  $errors = 0;
  $pattern = '/[^a-zA-Z0-9]/';

  // Register
  if (isset($_POST['reg_user'])) {
   
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if ($password_1 != $password_2) {
      $errors++;
      $_SESSION['message'] = "The two passwords do not match";
    }
    if (preg_match($pattern, $username)) {
      $_SESSION['message'] = "Only letters and number are allowed";
      $errors++;
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
            VALUES('$username', ' $email', '$password', '1')";
      mysqli_query($conn, $query);
      $_SESSION['message'] = "Register successfully";
      header('location: manage_users.php');
      die();
    }
  }

?>

<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
<div class="container">
    <h2 class="title">Add User (Admin)</h2>
    <?php include("info_message.php"); ?>
        <form action="add_user.php" method="post">
            <label>Email: </label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required><br>
        
            <label>Password: </label>
            <input type="password" name="password_1" class="form-control" placeholder="Enter your password" required><br>
        
            <label>Confirm password: </label>
            <input type="password" name="password_2" class="form-control" placeholder="Confirm your password" required><br>

            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your username" required><br>
        <button type="submit" name="reg_user" class="btn btn-primary">Register</button>
        </form>
    </div>