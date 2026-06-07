<?php
include_once '../connection.php';
include_once 'public.php';
include_once '../session.php'
// include_once ('../code.php');
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>form</title>
</head>

<body>

    <table class="table">
        <thead class="bg-danger">
            <tr>
                <th scope="col" class="text-center text-white">ID</th>
                <th scope="col" class="text-center text-white">Name</th>
                <th scope="col" class="text-center text-white">Email</th>
                <th scope="col" class="text-center text-white">Password</th>
                <th scope="col" class="text-center text-white">Role</th>
                <th scope="col" class="text-center text-white">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
    $showQuery = mysqli_query($connection,"SELECT * FROM register ");
    foreach($showQuery as $data){
    ?>
            <tr>
                <th scope="row" class="text-center"><?php echo $data['id']?></th>
                <td class="text-center"><?php echo $data['name']?></td>
                <td class="text-center"><?php echo $data['email']?></td>
                <td class="text-center"><?php echo $data['PASSWORD']?></td>
                <td class="text-center"><?php echo $data['role']?></td>
                <td>
                    <br>
                    <!-- delete modal button -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete<?php echo $data['id']?>">
                        Delete
                    </button>


                    <!-- update modal button -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#update<?php echo $data['id']?>">
                        Update
                    </button>


                </td>
            </tr>

            <!-- delete Modal code -->
       
         
            <div class="modal fade" id="delete<?php echo $data['id']?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../code.php" method="post">
                            <div class="modal-header bg-dark">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Delete Box</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body bg-dark">
                                <p class="text-light">Are you sure you want to delete
                                    <?php echo $data['name']?> data?</p>

                                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- update Modal code -->
            <div class="modal fade" id="update<?php echo $data['id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../code.php" method="POST">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Update Box</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="updateId" value="<?php echo $data['id']?>">

                                <label for="">Name</label>
                                <input type="text" name="updateName" class="form-control mb-3"
                                    value="<?php echo $data['name'] ?>">

                                <label for="">Email</label>
                                <input type="email" name="updateEmail" class="form-control mb-3"
                                    value="<?php echo $data['email'] ?>">

                                <label for="">Password</label>
                                <input type="text" name="updatePassword" class="form-control mb-3"
                                    value="<?php echo $data['PASSWORD'] ?>">

                                    <label for="">Role</label>
                                <input type="text" name="updaterole" class="form-control mb-3"
                                    value="<?php echo $data['role'] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="update">Save changes</button>
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

<h2 class="mt-5 text-center text-danger">Top  Selling Products</h2>
<table class="table">
    <thead class="bg-danger text-white">
        <tr><th>Product Name</th><th>Total Sold</th></tr>
    </thead>
    <tbody>
        <?php
        $topPro = mysqli_query($connection, "SELECT p.product_name, SUM(oi.quantity) as total_sold 
            FROM product p JOIN order_items oi ON p.product_id = oi.product_id 
            GROUP BY p.product_id ORDER BY total_sold DESC LIMIT 10");
        while($row = mysqli_fetch_assoc($topPro)){
            echo "<tr><td>".$row['product_name']."</td><td>".$row['total_sold']."</td></tr>";
        }
        ?>
    </tbody>
</table>


<h2 class="mt-5 text-center text-danger">Top Clients (Maximum Shopping)</h2>
<table class="table mt-3">
    <thead class="bg-danger text-white">
        <tr>
            <th>Client Name</th>
            <th>Email</th>
            <th>Total Amount Spent</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $topClients = mysqli_query($connection, "SELECT r.name, r.email, SUM(o.total_amount) AS total_spent 
            FROM register r JOIN orders o ON r.id = o.user_id 
            GROUP BY r.id ORDER BY total_spent DESC LIMIT 10");
            
        while($row = mysqli_fetch_assoc($topClients)){
            echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>$".$row['total_spent']."</td>
                  </tr>";
        }
        ?>
    </tbody>
</table>





    <!-- <a href="form.php"><button type="submit" class="btn btn-danger mt-3">back</button></a> -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>