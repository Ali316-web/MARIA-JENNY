<?php
include_once 'header.php';
include_once 'connection.php';

$product = null;

// Get Product ID from URL
if(isset($_GET['id'])) {
    $pro_id = mysqli_real_escape_string($connection, $_GET['id']);
    $query = "SELECT * FROM product WHERE product_id = '$pro_id'";
    $result = mysqli_query($connection, $query);
    $product = mysqli_fetch_assoc($result);
}

// FIX: Redirect ONLY if product NOT found
if(!$product) {
    header("Location: index.php");
    exit();
}
?>

<section class="py-5">
    <div class="container my-5">
        <div class="row gx-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <img src="images/<?php echo $product['product_image']; ?>" class="img-fluid rounded" alt="<?php echo $product['product_name']; ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mt-4 mt-md-0">
                    <h1 class="display-5 fw-bold text-dark"><?php echo $product['product_name']; ?></h1>
                    
                    <div class="d-flex align-items-center my-3">
                        <span class="fs-2 fw-bold text-success">$ <?php echo number_format($product['product_price']); ?></span>
                        <span class="ms-3 badge bg-transparent px-3 py-2 text-dark">In Stock</span>
                    </div>

                    <hr>

                    <h5 class="fw-bold">Description:</h5>
                    <p class="text-muted lead">
                        <?php echo $product['product_description']; ?>
                    </p>

                    <div class="mt-4 p-4 bg-light border rounded">
                        <form action="code.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="hidden" name="pro_price" value="<?php echo $product['product_price']; ?>">
                            
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <label class="form-label fw-bold">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" value="1" min="1">
                                </div>
                                <div class="col-9 pt-4">
                                    <button type="submit" name="addtocart" class="btn btn-danger btn-lg w-100 rounded-0">
                                        <i class="bi-cart-plus me-2"></i> ADD TO CART
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mt-4">
                        <small class="text-uppercase text-muted fw-bold">Quality Guaranteed:</small>
                        <p class="small"><?php echo $product['product_quality']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>