<?php
    require("config/Database.php");
    session_start();

    // Query statement
    $query ="SELECT * FROM news";

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result
    mysqli_free_result($news);

    // Close connection
    mysqli_close($conn);
?>

<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
    <div class="container">
        <h1 class="title">News</h1>
            <div class="card-columns">
                <?php foreach($news as $new) : ?>
                    <div class="card bg-light">
                        <img class="card-img-top" src="<?php echo $new["news_image_dir"]; ?>" alt="Card image cap">
                        <h5 class="card-title"><?php echo $new["news_title"]; ?></h5>
                        <small class="card-subtitle text-muted">created on <?php echo $new["created_at"]; ?></small>
                        <p class="card-text"><?php echo substr($new["news_body"], 0, 200)." ..."; ?></p>
                        <a class="card-link" href="single_news.php?id=<?php echo $new["news_id"]; ?>"> Read more</a>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
    <?php include("inc/footer.php"); ?>