<?php
session_start();
require("config/Database.php");
// Query statement
$query = "SELECT * FROM products";

// Get result
$result = mysqli_query($conn, $query);

// Fetch data
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result
mysqli_free_result($products);

// Close connection
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
    <h1 class="title">All Products</h1>
    <div class="container">
    <?php include("info_message.php"); ?>
        <div class="card-columns">
            <?php foreach ($products as $product) : ?>
                <div class="card bg-light text-center">
                    <a href="single_product.php?id=<?php echo $product["product_id"]; ?>">
                        <img class="card-img-top" src="<?php echo $product["image_dir"]; ?>" alt="Card image cap">
                    </a>
                    <h5 class="card-title"><?php echo $product["product_name"]; ?></h5>
                    <h6 class="card-title"><?php echo number_format($product["product_price"], 2) ." đ"; ?></h6>
                    <a href="add_cart.php?id=<?php echo $product["product_id"]; ?>">
                        <button type="submit" name="addtocart" class="btn btn-primary">Add to cart</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
    <?php include("inc/footer.php"); ?>