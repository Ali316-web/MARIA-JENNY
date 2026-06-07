<?php
include_once 'header.php';
include_once 'connection.php';

// 1. Get filter values from URL
$search = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : '';
$cat_id = isset($_GET['cat_id']) ? (int)$_GET['cat_id'] : 0;
$subcat_id = isset($_GET['subcat_id']) ? (int)$_GET['subcat_id'] : 0;

// 2. Build Dynamic Query with Joins
$query = "SELECT p.*, sc.category_id FROM product p 
          JOIN sub_category sc ON p.subcategory_id = sc.subcat_id 
          JOIN category c ON sc.category_id = c.cat_id 
          WHERE 1=1";

if ($search != '') {
    $query .= " AND (p.product_name LIKE '%$search%' OR p.product_description LIKE '%$search%')";
}
if ($cat_id > 0) {
    $query .= " AND sc.category_id = $cat_id";
}
if ($subcat_id > 0) {
    $query .= " AND p.subcategory_id = $subcat_id";
}

$query .= " ORDER BY p.product_id DESC";
$allProducts = mysqli_query($connection, $query);
?>

<section class="bg-transparent py-4 shadow-sm">
    <h1 class="text-danger text-center">OUR PRODUCTS</h1>
    <div class="container">
        <form action="all_products.php" method="GET" id="filterForm" class="row g-2">
        <h4 class="line_x mb-4 text-dark">Search & Filter</h4>    
        <div class="col-md-4">
                
                <input type="text" name="search" class="form-control" placeholder="Search product name..." value="<?php echo $search; ?>">
            </div>
            
            <div class="col-md-3">
                <select name="cat_id" id="cat_select" class="form-select" onchange="this.form.submit()">
                    <option value="0">All Categories</option>
                    <?php
                    $cat_res = mysqli_query($connection, "SELECT * FROM category");
                    while($c = mysqli_fetch_assoc($cat_res)) {
                        $selected = ($cat_id == $c['cat_id']) ? 'selected' : '';
                        echo "<option value='{$c['cat_id']}' $selected>{$c['cat_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                
                <select name="subcat_id" id="subcat_select" class="form-select" onchange="this.form.submit()">
                    <option value="0">All Sub-Categories</option>
                    <?php
                    // Only show subcategories belonging to the selected category if one is selected
                    $sub_query = "SELECT * FROM sub_category";
                    if($cat_id > 0) $sub_query .= " WHERE category_id = $cat_id";
                    
                    $sub_res = mysqli_query($connection, $sub_query);
                    while($sc = mysqli_fetch_assoc($sub_res)) {
                        $selected = ($subcat_id == $sc['subcat_id']) ? 'selected' : '';
                        echo "<option value='{$sc['subcat_id']}' $selected>{$sc['subcat_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-danger w-100">Search</button>
            </div>
        </form>
    </div>
</section>

<section id="shop_dt" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php 
            if(mysqli_num_rows($allProducts) > 0) {
                while($product = mysqli_fetch_assoc($allProducts)) { 
            ?>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="images/<?php echo $product['product_image']; ?>" class="card-img-top" style="height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-muted small mb-1"><?php echo $product['product_quality']; ?></p>
                        <h6 class="card-title fw-bold text-truncate"><?php echo $product['product_name']; ?></h6>
                        <h5 class="text-success mb-3">$ <?php echo number_format($product['product_price']); ?></h5>
                        
                        <a href="product_detail.php?id=<?php echo $product['product_id']; ?>" class="btn btn-outline-dark w-100 mb-2 btn-sm">
                            <i class="bi-eye pe-1"></i> Overview
                        </a>

                        <form action="code.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="hidden" name="pro_price" value="<?php echo $product['product_price']; ?>">
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text">Qty</span>
                                <input type="number" name="quantity" class="form-control text-center" value="1" min="1">
                            </div>
                            <button type="submit" name="addtocart" class="btn btn-danger w-100 btn-sm">
                                <i class="bi-cart-plus pe-1"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php 
                } 
            } else {
                echo "<div class='col-12 text-center py-5'><h3>No products found for this search.</h3></div>";
            }
            ?>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>