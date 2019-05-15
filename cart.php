<?php
session_start();
require_once('config/Database.php');
include('inc/header.php');
?>

<?php include("inc/navbar.php") ?>
<div class="container">
	<h1 class="title">Cart<h1>
	<?php
    //info message
    if (isset($_SESSION['message'])) {
        ?>
        <div class="alert alert-info text-center" id="cartAlert">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>
			<form method="post" action="update_cart.php">

				<table class="table" id="cartTable">
					<thead>
						<th></th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Subtotal</th>
					</thead>
					<tbody>
						<?php
						//initialize total
						$total = 0;
						if (!empty($_SESSION['cart'])) {
							//create array of initail qty which is 1
							$index = 0;
							if (!isset($_SESSION['qty_array'])) {
								$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
							}
							$sql = "SELECT * FROM products WHERE product_id IN (" . implode(',', $_SESSION['cart']) . ")";
							$query = mysqli_query($conn, $sql);
							while ($row = $query->fetch_assoc()) {
								?>
								<tr>
									<td>
										<a href="delete_item.php?id=<?php echo $row['product_id']; ?>&index=<?php echo $index; ?>">
												<i class="fas fa-trash" ></i>
										</a>	
									</td>
									<td><?php echo $row['product_name']; ?></td>
									<td><?php echo number_format($row['product_price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="number" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>" min="1" max="4" onkeypress="return false;"></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index] * $row['product_price'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index] * $row['product_price']; ?>
								</tr>
								
								<?php
								$index++;
								// var_dump($_SESSION['qty_array']);
							}
						} else {
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
						<?php
					}

					?>
						<tr>
							<td colspan="4" align="right"><b>Total</b></td>
							<td><b><?php echo number_format($total, 2); ?></b></td>
						</tr>
					</tbody>
				</table>
				<div id="cartButton">
					<a href="index.php" class="btn btn-light">Back</a>
					<button type="submit" class="btn btn-success" name="save">Update price</button>
					<a href="clear_cart.php" class="btn btn-danger">Clear Cart</a>
					<a href="checkout.php" class="btn btn-primary">Checkout</a>
				</div>
			</form>
</div>
</div>
</div>
<?php include('inc/footer.php'); ?>