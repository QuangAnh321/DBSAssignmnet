<?php require_once("config/Database.php");
        require_once("LoginandRegister.php");
        include("inc/header.php");
        include("inc/navbar.php");
?>
    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" src="image_news/smartphone.jpg">
        </div>
        <div class="col-md-4">
            <form method="post" action="Login.php"> 
                <div class="form-row">
                    <div class="col-md-10">
                        <h3>Login</h3>
                        <?php include("info_message.php"); ?>
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email" required><br>
                            <label>Password: </label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required><br>
                        <button type="submit" name="login_user" class="btn btn-success">Sign in</button>
                        <a href="Register.php">
                            <button class="btn btn-secondary">Register</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include("inc/footer.php"); ?>
