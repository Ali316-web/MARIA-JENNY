<?php
include_once 'header.php';
include_once 'connection.php';
include_once 'session.php';

if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['userId'];
$total_price = 0;

// Get Cart Items
$cart_query = mysqli_query($connection, "SELECT add_to_cart.*, product.product_name, product.product_price 
    FROM add_to_cart 
    JOIN product ON add_to_cart.pro_id = product.product_id 
    WHERE user_id = '$user_id'");
?>

<section class="container py-5">
    <form action="code.php" method="POST">
        <div class="row">
            <div class="col-md-7">
                <h3 class="mb-4 text-danger">FINALIZE STUFF</h3>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['userName']; ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label>Address *</label>
                        <textarea name="address" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>E-mail *</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Work Phone No.</label>
                        <input type="text" name="work_phone" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Cell No. *</label>
                        <input type="text" name="cell_no" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Date Of Birth *</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label>Category (Interest)</label>
                        <select name="category" class="form-control">
                            <option value="Cosmetics">Cosmetics</option>
                            <option value="Jewelry">Jewelry</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label>Remarks (Additional Info)</label>
                        <textarea name="remarks" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card p-4">
                    <h4 class="text-dark">Your Order</h4>
                    <hr>
                    <?php while($item = mysqli_fetch_assoc($cart_query)) { 
                        $subtotal = $item['product_price'] * $item['pro_qty'];
                        $total_price += $subtotal;
                    ?>
                        <p><?php echo $item['product_name']; ?> x <?php echo $item['pro_qty']; ?> 
                        <span class="float-end">$<?php echo $subtotal; ?></span></p>
                    <?php } ?>
                    <hr>
                    <h5 class="text-dark">Total: <span class="float-end">$<?php echo $total_price; ?></span></h5>
                    <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                    <button type="submit" name="finalize_order" class="btn btn-danger w-100 mt-3">FINALIZE ORDER</button>
                </div>
            </div>
        </div>
    </form>
</section>

<?php include_once 'footer.php'; ?>