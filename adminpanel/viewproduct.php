

<?php
include_once("../connection.php");
include_once("../code.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>View Products</title>
</head>
<body>
    <h1 class="bg text-center bg-transparent text-danger mt-4">View Product Data</h1>
    <div class="container-fluid">
        <table class="table table-bordered mt-4">
            <thead class="bg-danger text-white">
                <tr class="text-center">
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Quality</th> 
                    <th>Quantity</th> 
                    <th>Subcategory</th> 
                    <th>Image</th> 
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $showQuery = mysqli_query($connection, "SELECT * FROM product");
                foreach($showQuery as $data){
                ?>
                <tr class="text-center align-middle">
                    <td><?php echo $data['product_id']?></td>
                    <td><?php echo $data['product_name']?></td>
                    <td><?php echo $data['product_price']?></td>
                    <td><?php echo $data['product_description']?></td>
                    <td><?php echo $data['product_quality']?></td>
                    <td><?php echo $data['product_quantity']?></td>
                    <td><?php echo $data['subcategory_id']?></td>
                    <td>
                        <img src="../images/<?php echo $data['product_image']?>" alt="Image" width="80px" class="rounded">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#update<?php echo $data['product_id'] ?>">Update</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $data['product_id'] ?>">Delete</button>
                    </td>
                </tr>

                <div class="modal fade" id="delete<?php echo $data['product_id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../code.php" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete <strong><?php echo $data['product_name']?></strong>?</p>
                                    <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger" name="deleteProduct">Delete Forever</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="update<?php echo $data['product_id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../code.php" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">

                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="updateName" class="form-control mb-2" value="<?php echo $data['product_name'] ?>">

                                    <label class="form-label">Price</label>
                                    <input type="number" name="updatePrice" class="form-control mb-2" value="<?php echo $data['product_price'] ?>">

                                    <label class="form-label">Description</label>
                                    <textarea name="updateDesc" class="form-control mb-2"><?php echo $data['product_description'] ?></textarea>
                                    
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="updateQty" class="form-control mb-2" value="<?php echo $data['product_quantity'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="updateProduct">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>