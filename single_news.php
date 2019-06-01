<?php
    require("config/Database.php");
    
    // Get id
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    
    // Query statement
    $query ="SELECT * FROM news where news_id =".$id;

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $news = mysqli_fetch_assoc($result);

    // Free result
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);
?>

<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
    <div class="container">
        <h3 class="title"><?php echo $news["news_title"]; ?></h3><br>
        <small class="card-subtitle text-muted">created on <?php echo $news["created_at"]; ?></small><br>
        <img style="width:300px" src="<?php echo $news["news_image_dir"]; ?>" alt="image">
        <p><?php echo $news["news_body"]; ?></p>
    </div>
<?php include("inc/footer.php"); ?>