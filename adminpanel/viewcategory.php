<?php
include_once("../connection.php");
// include_once("public.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>View</title>
</head>

<body>
    <?php
            // if(isset($_GET['index'])){
            //     include_once "index.php";
            // }

            // if(isset($_GET['addcategory'])){
            //     include_once "addcategory.php";
            // }

            // if(isset($_GET['viewcategory'])){
            //     include_once "viewcategory.php";
            // }


            // if(isset($_GET['addproduct'])){
            //     include_once "addproduct.php";
            // }


            // if(isset($_GET['viewproduct'])){
            //     include_once "viewproduct.php";
            // }
            
            ?>
    <h1 class="bg bg-transparent text-center text-danger">View Category Data</h1>
    <table class="table">
        <thead class="bg-danger">
            <tr>
                <th scope="col" class="text-center text-white">Id</th>
                <th scope="col" class="text-center text-white">Name</th>
                <th scope="col" class="text-center text-white">Image</th>
                <!-- <th scope="col">Password</th> -->
                <th scope="col" class="text-center text-white">Operations</th>
            </tr>
        </thead>
        <tbody>
            <!-- php code -->
            <?php
     $showQuery = mysqli_query($connection, "SELECT * FROM category");
     foreach($showQuery as $data){
        ?>
            <tr class="text-center">
                <th scope="row"><?php echo $data['cat_id']?></th>
                <td><?php echo $data['cat_name']?></td>
                <td><img src="../images/<?php echo $data['cat_image']?>" alt="Not Found" width="100px"></td>
                <br>
                <td>
                    <!-- delete modal button code -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete<?php echo $data['cat_id'] ?>">
                        Delete
                    </button>
                    <!-- update modal code button -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#update<?php echo $data['cat_id'] ?>">
                        Update
                    </button>

                </td>
                <td>
                </td>
            </tr>

            <!-- Delete Modal code  -->
            <div class="modal fade" id="delete<?php echo $data['cat_id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../code.php" method="post">
                            <div class="modal-body">
                                <h5>Are you sure you want to delete <?php echo $data['cat_name']?> data???</h5>
                                <input type="hidden" name="cat_id" value="<?php echo $data['cat_id'] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_category">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<!-- update modal code -->
            <div class="modal fade" id="update<?php echo $data['cat_id'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../code.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="cat_id" value="<?php echo $data['cat_id'] ?>">

                                <label>Category Name:</label>
                                <input type="text" name="updateCatName" class="form-control mb-3"
                                    value="<?php echo $data['cat_name'] ?>">

                                <label>Category Image (Leave blank to keep current):</label>
                                <input type="file" name="updateCatImage" class="form-control mb-3">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="update_category">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
     }
     ?>

        </tbody>
    </table>


    <!-- <a href="public.php?addcategory"><button type="submit" class="btn btn-primary ms-3">Back</button></a> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>