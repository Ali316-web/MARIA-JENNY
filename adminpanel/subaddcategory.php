<?php
include_once("../connection.php");

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
</head>

<body>
    <h1 class="text-center bg-transparent text-danger">Add Sub Category</h1>
    <div class="container mt-5">
        <div class="row">
            <form action="../code.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="subcat_name" class="form-control" placeholder="Add Category Name" required>
                </div>
                <br>
                <select class="form-select" aria-label="Default select example" name="choosecat">
  <option selected name="choosecat">Choose Sub Category</option>
  <?php
  $fetchcat = mysqli_query($connection,"select * from category");
  foreach($fetchcat as $datacat){
    ?>
    <option value="<?php echo $datacat['cat_id']?>"><?php echo $datacat['cat_name']?></option>
    <?php
  }
  ?>
</select>
<br>
                <div>
                    <input type="file" name="subcat_image" class="form-control" required>
                </div>
                <br>
                <button type="submit" name="addsub_category" class="btn btn-danger text-white">
                    +Add Sub Category
                </button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>