<?php
include_once 'header.php';
include_once 'connection.php';

// 1. Get IDs and Sanitize
$cat_id = isset($_GET['cat_id']) ? mysqli_real_escape_string($connection, $_GET['cat_id']) : null;
$subcat_id = isset($_GET['subcat_id']) ? mysqli_real_escape_string($connection, $_GET['subcat_id']) : null;
$product_id = isset($_GET['pro_id']) ? mysqli_real_escape_string($connection, $_GET['pro_id']) : null;

// 2. Build Query
if($product_id) {
    $query = "SELECT * FROM product WHERE product_id = '$product_id'";
} elseif($subcat_id) {
    $query = "SELECT * FROM product WHERE subcategory_id = '$subcat_id'";
} elseif($cat_id) {
    $query = "SELECT p.* FROM product p 
              JOIN sub_category sc ON p.subcategory_id = sc.subcat_id 
              WHERE sc.category_id = '$cat_id'";
} else {
    $query = "SELECT * FROM product LIMIT 12"; 
}

$fetchProducts = mysqli_query($connection, $query);
?>

<section id="shop_dt" class="py-5">
    <div class="container-xl my-3">
        <div class="row"> 
            
            <?php while($product = mysqli_fetch_assoc($fetchProducts)) { ?>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <form action="code.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        
                        <div class="product-img mb-3">
                            <img src="images/<?php echo $product['product_image']; ?>" 
                                 class="img-fluid w-100" 
                                 style="height: 250px; object-fit: cover;">
                        </div>

                        <div class="shop_dt_right">
                            <h4  class="fw-bold" name="pro_price"><?php echo $product['product_name']; ?></h4>
                            
                            <div class="price-section my-2">
                                <span class="text-success fs-4 fw-bold">$<?php echo $product['product_price']; ?></span>
                                <small class="text-decoration-line-through text-muted ms-2">$3000</small>
                            </div>

                            <p class="text-muted small mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                <?php echo $product['product_description']; ?>
                            </p>

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <input type="number" name="quantity" min="1" value="1" class="form-control form-control-sm" style="width:70px;">
                                <button type="submit" name="addtocart" class="btn btn-danger btn-sm w-100 rounded-0">
                                    ADD TO CART    
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="badge bg-dark">In Stock</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>

        </div> </div>
</section>

<?php include_once 'footer.php'; ?>