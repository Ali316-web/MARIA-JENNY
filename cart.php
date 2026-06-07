<?php

include_once 'header.php';
include_once 'connection.php';
include_once 'session.php';

?>
<section id="cart" class="py-5">
  <form class="bg0 p-t-75 p-b-85" action="code.php" method="post">
    <div class="container-xl my-3">
        <div class="row cart_1">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Product Details</th> <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th> </tr>
                        </thead>
                        <tbody>
<?php
if(isset($_SESSION['userId'])){
    $shoppingcart = mysqli_query($connection, "SELECT product.*, add_to_cart.* FROM product 
        INNER JOIN add_to_cart ON add_to_cart.pro_id = product.product_id 
        WHERE add_to_cart.user_id = '".$_SESSION['userId']."'");

    $_SESSION['grandtotal'] = 0;

    while($datashop = mysqli_fetch_assoc($shoppingcart)){ 
        $total = $datashop['pro_price'] * $datashop['pro_qty'];
        $_SESSION['grandtotal'] += $total;
?>
    <tr>
        <td class="text-start">
            <div class="d-flex align-items-center">
                <img src="image/<?php echo $datashop['product_image']; ?>" alt="" style="width: 80px; height: 80px; object-fit: cover; margin-right: 15px;" class="rounded border">
                <span class="fw-bold"><?php echo $datashop['product_name']; ?></span>
            </div>
        </td>
        <td>$ <?php echo number_format($datashop['pro_price'], 2); ?></td>
        <td><?php echo $datashop['pro_qty']; ?></td>
        <td class="fw-bold">$ <?php echo number_format($total, 2); ?></td>
        <td>
            <button type="submit" name="remove_item" value="<?php echo $datashop['pro_id']; ?>" class="btn btn-sm btn-outline-danger">Remove</button>
        </td>
    </tr>
<?php
    } 
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row cart_2 mt-4 justify-content-end">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm">
                    <h3 class="h5 mb-3">Cart Totals</h3>
                    <div class="d-flex justify-content-between mb-3 border-bottom pb-2">
                        <span>Subtotal</span>
                        <span class="fw-bold">$ <?php echo number_format($_SESSION['grandtotal'] ?? 0, 2); ?></span>
                    </div>
                    <a href="checkout.php" class="btn btn-danger w-100 rounded-0">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
  </form>
</section>
<?php
include_once 'footer.php'

?>
