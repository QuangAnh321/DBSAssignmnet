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
            <form method="post" action="Register.php">
                <div class="form-row">
                    <div class="col-md-10">
                        <h3>Register</h3>
                        <?php include("info_message.php"); ?>
                            <label>Email: </label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required><br>
                       
                            <label>Password: </label>
                            <input type="password" name="password_1" class="form-control" placeholder="Enter your password" required><br>
                      
                            <label>Confirm password: </label>
                            <input type="password" name="password_2" class="form-control" placeholder="Confirm your password" required><br>
             
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username" required><br>
                        <button type="submit" name="reg_user" class="btn btn-primary">Register</button>
                        <a href="Login.php">
                            <button class="btn btn-secondary">Login</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include("inc/footer.php"); ?>
