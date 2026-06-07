<?php
include_once 'connection.php';
include_once 'session.php';
//class work
//register form
if(isset($_POST["registerform"])){
    $username = $_POST["userName"];
    $useremail = $_POST["userEmail"];
    $password = $_POST["PASSWORD"];

    $insert_query = mysqli_query($connection,"INSERT 
    INTO register (name, email ,PASSWORD) VALUES ('$username',
    '$useremail', '$password')");

    if($insert_query){
        // echo "<script>
        // alert('Registration Successfully')
        // location.assign('login.php')
        // </script>";
         $_SESSION['success'] = "Registration Successful";
        header('Location: login.php');
    }
    else { 
        echo "<script>
        alert('Registration Failed')
        location.assign('login.php')
        </script>";
    }
}
//login form
// --- Find the Login Section in code.php and replace with this ---

if(isset($_POST["loginform"])){
    $email = $_POST["email"];
    $passd = $_POST["PASSWORD"];

    $selectquery = mysqli_query($connection,"SELECT * FROM register 
    WHERE email='$email' AND PASSWORD='$passd' ");
  
     if(mysqli_num_rows($selectquery)> 0){
        $data = mysqli_fetch_array($selectquery);

        if($data["role"]== 'admin'){
            // echo "Welcome Admin";
            $_SESSION['adminId']=$data['id'];
            $_SESSION['adminName']=$data['name'];
            header('location:adminpanel/public.php?index');
            // echo "<script>
            // location.assign('adminpanel/public.php?index')</script>";
}
elseif($data["role"]== 'user'){
    // echo "Welcome User";
            $_SESSION['userId']=$data['id'];
            $_SESSION['userName']=$data['name'];
            header('location:index.php');
}
}
else{
    echo "<script>
    alert('login failed')
    location.assign('login.php')
    </script>";
}
}
   
//dashboard record delete code 

if(isset($_POST["delete"])){
    $id = $_POST["id"];
  

    //delete query

    $delete_query = mysqli_query($connection,"DELETE FROM
    register WHERE id = '$id'");

    if($delete_query){
        echo "
        <script>
        alert('Data Deleted Successfully');
         location.assign('adminpanel/public.php?index');
         </script>";
    }
    else {
        echo "<script>
        alert('Data Deletion Failed');
         location.assign('adminpanel/public.php?index');
         </script>";
    }
}

//dashboard record update code
if(isset($_POST["update"])){
    $updateId = $_POST["id"];
    $updateName = $_POST["updateName"];
    $updateEmail = $_POST["updateEmail"];
    $updatePassword = $_POST["updatePassword"];
    $updatePassword = $_POST["updaterole"];

    $update_query = mysqli_query($connection,"UPDATE register SET
    name='$updateName', email='$updateEmail', password='$updatePassword' 
    role='$updaterole' WHERE
    id = '$updateId'");

    if($update_query){
        echo "<script>
        alert('Data Update Successfully');
         location.assign('adminpanel/public.php?index');
         </script>";
    } 
    else {
        echo "
        <script>
        alert('Data Update Failed');
         location.assign('adminpanel/public.php?index');
         </script>";
    }
}

//add category code
if(isset($_POST["addcategory"])){
    
    //collect form data
    $catname = $_POST['cat_name'];
    
    //file upload code
    $file_name = $_FILES["catimage"]["name"];
    $file_size = $_FILES["catimage"]["size"];
    $file_tmp = $_FILES["catimage"]["tmp_name"];
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

     $destination = "images/".$file_name;

    if(move_uploaded_file($file_tmp, $destination)){
        // echo "file uploaded successfully";

        //insert query
        $insert_query = mysqli_query($connection,"INSERT INTO category
        (cat_name, cat_image) VALUE ('$catname','$file_name')");
     
        if($insert_query){
             echo "<script>alert('Data inserted successful'); 
        location.assign('adminpanel/public.php?addcategory');
        </script>";
    } else {
        echo "<script>alert('Data insertion failed');
         location.assign('adminpanel/public.php?addcategory');
         </script>";
    }
     } else {
        echo "File upload failed.";
    }
}

//add sub category code
if(isset($_POST["addsub_category"])){
    
    //collect form data
    $sub_catname = $_POST['subcat_name'];
    $choosecat = $_POST['choosecat'];
    
    //file upload code
    $file_name = $_FILES["subcat_image"]["name"];
    $file_size = $_FILES["subcat_image"]["size"];
    $file_tmp = $_FILES["subcat_image"]["tmp_name"];
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

     $destination = "image/".$file_name;

    if(move_uploaded_file($file_tmp, $destination)){
        // echo "file uploaded successfully";

        //insert query
        $insert_query = mysqli_query($connection,"INSERT INTO sub_category
        (subcat_name, subcat_image,category_id ) VALUE ('$sub_catname','$file_name','$choosecat')");
     
        if($insert_query){
             echo "<script>alert('Data inserted successful'); 
        location.assign('adminpanel/public.php?subaddcategory');
        </script>";
    } else {
        echo "<script>alert('Data insertion failed');
         location.assign('adminpanel/public.php?subaddcategory');
         </script>";
    }
     } else {
        echo "File upload failed.";
    }
}

//add product code

if(isset($_POST["addproduct"])){
    //collect form data
    $proname = $_POST["proname"];
    $proprice = $_POST["proprice"];
    $product_description = $_POST["productdescription"];
    $proquality = $_POST["proquality"];
    $proqty = $_POST["proqty"];
    $choosecat = $_POST['choosecat'];

    //file upload code
    $file_name = $_FILES["proimage"]["name"];
    $file_size = $_FILES["proimage"]["size"];
    $file_tmp = $_FILES["proimage"]["tmp_name"];
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

     $destination = "images/".$file_name;
     if(move_uploaded_file($file_tmp, $destination)){

        $insert_query =  mysqli_query($connection, "INSERT INTO product
    (product_name, product_price, product_description, product_quality, product_quantity,
    subcategory_id,product_image) VALUES ('$proname','$proprice','$product_description','$proquality',
    '$proqty','$choosecat','$file_name') ");
        
        if($insert_query){
            echo "<script>alert('Data inserted successful'); 
        location.assign('adminpanel/public.php?addproduct');
        </script>";
        }
        else {
            echo "<script>alert('Data insertion failed');
         location.assign('adminpanel/public.php?addproduct');
         </script>";
        }

     }
     else {
        echo "File upload failed.";
     }
}
    
// category record delete code
// category record delete code in code.php
if(isset($_POST["delete_category"])){
    $id = $_POST["cat_id"];
  
    $delete_query = mysqli_query($connection, "DELETE FROM category WHERE cat_id = '$id'");

    if($delete_query){
        echo "<script>
        alert('Category Deleted Successfully');
        location.assign('adminpanel/public.php?viewcategory');
        </script>";
    } else {
        echo "<script>alert('Deletion Failed');</script>";
    }
}


// category record update code
if(isset($_POST["update_category"])){
    $cat_id = $_POST["cat_id"];
    $cat_name = $_POST["updateCatName"];
    
    // Check if a new file is uploaded
    if($_FILES['updateCatImage']['name'] != ""){
        $file_name = $_FILES["updateCatImage"]["name"];
        $file_tmp = $_FILES["updateCatImage"]["tmp_name"];
        move_uploaded_file($file_tmp, "images/".$file_name);
        
        $update_query = mysqli_query($connection, "UPDATE category SET 
            cat_name='$cat_name', cat_image='$file_name' WHERE cat_id='$cat_id'");
    } else {
        // Update only name if no new image
        $update_query = mysqli_query($connection, "UPDATE category SET 
            cat_name='$cat_name' WHERE cat_id='$cat_id'");
    }

    if($update_query){
        echo "<script>alert('Updated Successfully'); location.assign('adminpanel/public.php?viewcategory');</script>";
    }
}

?>
<?php
// add to cart



// add to cart
if(isset($_POST['addtocart'])) {
    
    // 1. SECURITY CHECK: Check if user is logged in
    if(!isset($_SESSION['userId'])){
        echo "<script>
        
        location.assign('login.php');
        </script>";
        exit(); // Stop the script here so it doesn't try to access the database
    }

    $user_id = $_SESSION['userId']; // Now safe to access
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['pro_price'];

    // 2. Check if product already exists in this user's cart
    $check_query = "SELECT * FROM add_to_cart WHERE user_id = '$user_id' AND pro_id = '$product_id'";
    $result = mysqli_query($connection, $check_query);

    if(mysqli_num_rows($result) > 0) {
        // 3. DATA UPDATE: Increment quantity
        $query = "UPDATE add_to_cart SET pro_qty = pro_qty + $quantity WHERE user_id = '$user_id' AND pro_id = '$product_id'";
    } else {
        // 4. DATA ENTER: New record in database
        $query = "INSERT INTO add_to_cart (user_id, pro_id, pro_qty, pro_price) VALUES ('$user_id', '$product_id', '$quantity', '$price')";
    }

    if(mysqli_query($connection, $query)) {
        header("Location: cart.php?status=success");
    }
}

// Remove item logic (Keep this outside the addtocart block or as it was)
if(isset($_GET['remove_id'])) {
    $cart_id = $_GET['remove_id'];
    $delete_query = "DELETE FROM add_to_cart WHERE cart_id = '$cart_id'";
    mysqli_query($connection, $delete_query);
    header("Location: cart.php");
}

// remove item
// Inside code.php
if(isset($_POST['remove_item'])) {
    // Get the user ID from the session
    $user_id = $_SESSION['userId'];

    // CHANGE: Delete all items for this user instead of just the specific pro_id
    $query = "DELETE FROM `add_to_cart` WHERE `user_id` = '$user_id'";
    
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        $_SESSION['status'] = "Cart cleared successfully";
        header("Location: cart.php");
    } else {
        $_SESSION['status'] = "Something went wrong!";
        header("Location: cart.php");
    }
}
// place order code 
if(isset($_POST['place_order'])){
    $user_id = $_SESSION['userId'];
    $total = $_POST['total_price'];

    // 1. Insert into Orders table
    $order_query = mysqli_query($connection, "INSERT INTO orders (user_id, total_amount) VALUES ('$user_id', '$total')");
    $order_id = mysqli_insert_id($connection);

    // 2. Move items from cart to order_items
    $cart_items = mysqli_query($connection, "SELECT * FROM add_to_cart WHERE user_id = '$user_id'");
    while($row = mysqli_fetch_assoc($cart_items)){
        $p_id = $row['pro_id'];
        $qty = $row['pro_qty'];
        mysqli_query($connection, "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$p_id', '$qty')");
    }

    // 3. Clear the cart
    mysqli_query($connection, "DELETE FROM add_to_cart WHERE user_id = '$user_id'");
    header('location:index.php');
}

// finalize the order 
if(isset($_POST['finalize_order'])){
    $user_id = $_SESSION['userId'];
    $total = $_POST['total_price'];
    
    // Collect specific documentation fields
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $work_phone = $_POST['work_phone'];
    $cell_no = $_POST['cell_no'];
    $dob = $_POST['dob'];
    $category = $_POST['category'];
    $remarks = $_POST['remarks'];

    // 1. Insert into Orders table
    $order_query = mysqli_query($connection, "INSERT INTO orders (user_id, total_amount) VALUES ('$user_id', '$total')");
    $order_id = mysqli_insert_id($connection);

    // 2. Insert into Checkout table (Requirement: record complete information regarding client)
    $checkout_insert = "INSERT INTO checkout (user_id, name, address, email, work_phone, cell_no, dob, category, remarks, order_id) 
                        VALUES ('$user_id', '$name', '$address', '$email', '$work_phone', '$cell_no', '$dob', '$category', '$remarks', '$order_id')";
    mysqli_query($connection, $checkout_insert);

    // 3. Move items from cart to order_items
    $cart_items = mysqli_query($connection, "SELECT * FROM add_to_cart WHERE user_id = '$user_id'");
    while($row = mysqli_fetch_assoc($cart_items)){
        $p_id = $row['pro_id'];
        $qty = $row['pro_qty'];
        $price = $row['pro_price']; 
        mysqli_query($connection, "INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) 
                                   VALUES ('$order_id', '$p_id', '$qty', '$price')");
    }

    // 4. Clear the cart
    mysqli_query($connection, "DELETE FROM add_to_cart WHERE user_id = '$user_id'");
    
    echo "<script>alert('Order Finalized!'); location.assign('index.php');</script>";
}

// product record delete code
if(isset($_POST["deleteProduct"])){
    $id = $_POST["product_id"];
  
    // Delete query for product
    $delete_query = mysqli_query($connection, "DELETE FROM product WHERE product_id = '$id'");

    if($delete_query){
        echo "<script>
        alert('Product Deleted Successfully');
        location.assign('adminpanel/public.php?viewproduct');
        </script>";
    } else {
        echo "<script>
        alert('Product Deletion Failed');
        location.assign('adminpanel/public.php?viewproduct');
        </script>";
    }
}

// product record update code
if(isset($_POST["updateProduct"])){
    $product_id = $_POST["product_id"];
    $updateName = $_POST["updateName"];
    $updatePrice = $_POST["updatePrice"];
    $updateDesc = $_POST["updateDesc"];
    $updateQty = $_POST["updateQty"];

    // Update query
    $update_query = mysqli_query($connection, "UPDATE product SET 
        product_name='$updateName', 
        product_price='$updatePrice', 
        product_description='$updateDesc', 
        product_quantity='$updateQty' 
        WHERE product_id = '$product_id'");

    if($update_query){
        echo "<script>
        alert('Product Updated Successfully');
        location.assign('adminpanel/public.php?viewproduct');
        </script>";
    } else {
        echo "<script>
        alert('Product Update Failed');
        location.assign('adminpanel/public.php?viewproduct');
        </script>";
    }
}   

?>