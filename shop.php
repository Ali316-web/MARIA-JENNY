<?php
include_once 'header.php';
include_once 'connection.php'
?>

<?php
// Get search and filter values from URL
$search = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : '';
$filter_cat = isset($_GET['category']) ? mysqli_real_escape_string($connection, $_GET['category']) : '';

// 1. Dynamic SQL Query
// We join product with sub_category and category to search across names and categories
$query = "SELECT p.*, sc.subcat_name, c.cat_name 
          FROM product p
          JOIN sub_category sc ON p.subcategory_id = sc.subcat_id
          JOIN category c ON sc.category_id = c.cat_id 
          WHERE 1=1";

if ($search != '') {
    $query .= " AND (p.product_name LIKE '%$search%' OR sc.subcat_name LIKE '%$search%' OR c.cat_name LIKE '%$search%')";
}

if ($filter_cat != '') {
    $query .= " AND c.cat_name = '$filter_cat'";
}

$allProducts = mysqli_query($connection, $query);
?>
<section id="shop" class="py-5">
<div class="container-xl my-3">
    <div class="shop_1_left1 p-4 shadow mt-5">
        <h4 class="line_x mb-4 text-dark">Search & Filter</h4>

        <form action="shop.php" method="GET">
            <div class="row">
                <div class="col-md-5 mb-3">
                    <input type="text" name="search" class="form-control p-2" 
                           placeholder="Search for rings, necklace, etc..." 
                           value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-5 mb-3">
                    <select name="category" class="form-select p-2">
                        <option value="">All Materials (jewllery, cosmetics, etc.)</option>
                        <?php
                        $cats = mysqli_query($connection, "SELECT * FROM category");
                        while($c = mysqli_fetch_assoc($cats)){
                            $selected = ($filter_cat == $c['cat_name']) ? 'selected' : '';
                            echo "<option value='".$c['cat_name']."' $selected>".$c['cat_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger w-100 p-2" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<br>

<div class="container-xl">
    <div class="shop_1_inner row row-cols-1 row-cols-md-3 gy-5 gx-5">
        <?php 
        if(mysqli_num_rows($allProducts) > 0) {
            while($product = mysqli_fetch_assoc($allProducts)) { 
        ?>
            <div class="col">
                <div class="shop_1_inner_left">
                    <div class="shop_1_inner_left1 position-relative image_box">
                        <a href="sub_category.php?id=<?php echo $product['product_id']; ?>">
                            <img src="images/<?php echo $product['product_image']; ?>" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="shop_1_left3 px-3">
                        <h6 class="text-muted mt-3"><?php echo $product['cat_name']; ?> | <?php echo $product['subcat_name']; ?></h6>
                        <b class="fs-5 d-block mb-2 mt-1">
                            <a href="#"><?php echo $product['product_name']; ?></a>
                        </b>
                        <b class="d-block col_secondry fs-5">$<?php echo $product['product_price']; ?></b>
                    </div>
                </div>
            </div>
        <?php 
            }
        } else {
            echo "<div class='col-12 text-center'><h3>No products found.</h3></div>";
        }
        ?>
    </div>
</div>
</section>

<?php
include_once 'footer.php'
?>