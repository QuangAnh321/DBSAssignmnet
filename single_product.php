<?php require("config/Database.php"); ?>
<?php
    session_start();
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $query = "SELECT * FROM products where product_id=".$id;
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($product);
    mysqli_close($conn);
    //initialize cart if not set or is unset
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    //unset quantity
    unset($_SESSION['qty_array']);
?>
<?php include("inc/header.php"); ?>
<?php include("inc/navbar.php"); ?>
<div class="container">
    <h1><?php echo $product["product_name"]; ?></h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid" src="<?php echo $product["image_dir"]; ?>" alt="Card image cap">
        </div>
        <div class="col-md-4">
            <h3>Specification</h3>
            <ul style="list-style: none;">
                <li><i class="fas fa-microchip" style="color:blue"></i> Processor: <?php echo $product["product_processor"]; ?></li>
                <hr>
                <li><i class="fas fa-cube" style="color:blue"></i> Dimension (W x H x T, mm): <?php echo $product["product_dimension"]; ?></li>
                <hr>
                <li><i class="fas fa-mobile-alt" style="color:blue"></i> Screen: <?php echo $product["product_screen"]; ?></li>
                <hr>
                <li><i class="fas fa-camera" style="color:blue"></i> Camera: <?php echo $product["product_camera"]; ?></li>
                <hr>
                <li style="color:red"><h3><?php echo number_format($product["product_price"], 2) ." đ"; ?></h3></li>
            </ul>
            <a href="add_cart.php?id=<?php echo $product["product_id"]; ?>">
                 <button type="submit" name="addtocart" class="btn btn-primary">Add to cart</button>
            </a>
        </div>
        <div class="col-md-4">
            <h3>Additional info</h3>
            <li><i class="fas fa-box" style="color:blue"></i> What's in the box : <?php echo $product["product_inthebox"]; ?></li>
            <li><i class="fas fa-wrench" style="color:blue"></i> Warranty: <?php echo $product["product_warranty"]; ?> months</li>
        </div>
    </div>
</div>
     


<?php include("inc/footer.php"); ?>