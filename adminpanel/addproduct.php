e<?php
include_once("../connection.php");
// include_once("../code.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Add Product</title>
  </head>
  <body>
    
    <h1 class="text-center bg-transparent text-danger">Add Product Page</h1>
    <div class="container mt-5">
        <div class="row">
            <form action="../code.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="proname" class="form-control"
                    placeholder="Add Product Name">
                </div>
                <br>
                   <div>
                    <input type="text" name="proprice" class="form-control"
                    placeholder="Add Product Price">
                </div>
                <br>
                   <div>
                    <input type="text" name="productdescription" class="form-control"
                    placeholder="Add Product Discription">
                </div>
                <br>
                   <div>
                    <input type="text" name="proquality" class="form-control"
                    placeholder="Add Product Quality">
                </div>
                <br>
                   <div>
                    <input type="text" name="proqty" class="form-control"
                    placeholder="Add Product Quantity">
                </div>
                <br>
               <select class="form-select" aria-label="Default select example" name="choosecat">
  <option selected name="choosecat">Choose Category</option>
  <?php
  $fetchcat = mysqli_query($connection,"select * from sub_category");
  foreach($fetchcat as $datacat){
    ?>
    <option value="<?php echo $datacat['subcat_id']?>"><?php echo $datacat['subcat_name']?></option>
    <?php
  }
  ?>
</select>
<br>
                 <div>
                    <input type="text" onclick="this.type='file'" name="proimage" class="form-control"
                    placeholder="Add Product Image">
                </div>
                <br>
                <button type="submit" name="addproduct" class="btn btn-danger text-white">
                    +Add Product
                </button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>