<?php
    require("config/Database.php");
    require("check_permission.php");
    session_start();

    // initializing variables
  $username = "";
  $email    = "";
  $errors = 0;
  $pattern = '/[^a-zA-Z0-9]/';

  // Get user

    $userID = mysqli_real_escape_string($conn, $_GET["id"]);
    $userQuery ="SELECT * FROM users where user_id =".$userID;
    $userResult = mysqli_query($conn, $userQuery);
    $userInfo = mysqli_fetch_assoc($userResult);
    $userRole = $userInfo["user_role"];

  // Register
  if (isset($_POST['edit_user'])) {
   
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (preg_match($pattern, $username)) {
      $_SESSION['message'] = "Only letters and number are allowed";
      $errors++;
    }

    
    $user_check_query = "SELECT * FROM users WHERE user_name='$username' OR user_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    // if ($user) { // if user exists
    //   if ($user['user_name'] === $username) {
    //     $errors++;
    //     $_SESSION['message'] = "Username already exists";
    //   }

    //   if ($user['user_email'] === $email) {
    //     $errors++;
    //     $_SESSION['message'] = "email already exists";
    //   }
    // }

    // Finally, register user if there are no errors in the form
    if ($errors == 0) {
      $query = "UPDATE users SET user_name = '$username', user_email = '$email', user_role = '$userRole' WHERE user_id=".$userID;
      mysqli_query($conn, $query);
      $_SESSION['message'] = "Update user successfully";
      header('location: manage_users.php');
      die();
    }
  }

?>

<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
<div class="container">
    <h2 class="title">Edit User (Admin)</h2>
    <?php include("info_message.php"); ?>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
            <label>Email: </label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required value="<?php echo $userInfo["user_email"]; ?>"><br>
        
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your username" required value="<?php echo $userInfo["user_name"]; ?>"><br>
        <button type="submit" name="edit_user" class="btn btn-primary">Edit user</button>
        </form>
    </div>