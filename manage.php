<?php require("config/Database.php"); ?>
<?php require("check_permission.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>



<div class="container">
    <h1 class="title">Welcome</h1>
    <div class="dashboard">
        <a href="manage_users.php">
            <button class="btn btn-primary">Manage users</button>
        </a>
        <a href="manage_product.php">
            <button class="btn btn-primary">Manage products</button>
        </a>
        <a href="manage_news.php">
            <button class="btn btn-primary">Manage news</button>
        </a>
    </div>
</div>



<?php include("inc/footer.php"); ?>