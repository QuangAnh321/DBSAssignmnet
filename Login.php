<?php require_once("config/Database.php");
        require_once("LoginandRegister.php");
        include("inc/header.php");
        include("inc/navbar.php");
?>
    <div class="container">
        <form method="post" action="Login.php">
            <h1 class="title">Login</h1>
            <?php include("info_message.php"); ?>
            <div class="form-group">
                <label>Email: </label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email" required><br>
            </div>
            <div class="form-group">
                <label>Password: </label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required><br>
            </div>
            <button type="submit" name="login_user" class="btn btn-primary">Sign in</button>
            <a href="Register.php">
                <button class="btn btn-secondary">Register</button>
            </a>
        </form>
    </div>
    <?php include("inc/footer.php"); ?>
