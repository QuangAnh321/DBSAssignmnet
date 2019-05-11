<?php require_once("config/Database.php");
        require_once("LoginandRegister.php");
        include("inc/header.php");
        include("inc/navbar.php");
?>
    <div class="container">
        <form method="post" action="Register.php">
            <h1 class="title">Register</h1>
            <?php include("info_message.php"); ?>
            <div class="form-group">
                <label>Email: </label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required><br>
            </div>
            <div class="form-group">
                <label>Password: </label>
                <input type="password" name="password_1" class="form-control" placeholder="Enter your password" required><br>
            </div>
            <div class="form-group">
                <label>Confirm password: </label>
                <input type="password" name="password_2" class="form-control" placeholder="Confirm your password" required><br>
            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required><br>
            </div>
            <button type="submit" name="reg_user" class="btn btn-primary">Register</button>
            <a href="Login.php">
                <button class="btn btn-secondary">Login</button>
            </a>
        </form>
    </div>
    <?php include("inc/footer.php"); ?>
