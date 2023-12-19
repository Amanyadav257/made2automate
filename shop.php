<?php
include("./includes/connect.php");

function getproduct()
{
    global $con;

    if (!isset($_GET['category'])) {

        $select_query = "select * from `product_add` order by rand() LIMIT 0,9";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['id'];
            $product_name = $row['pro_name'];
            $product_title = $row['manu_name'];
            $product_description = $row['pro_description'];
            $product_image1 = $row['pro_img'];
            $product_price = $row['price'];

            echo "<div class='col-md-4 mb-2'>
        <div class='card'>
          <img src='./admin_area/pro_img/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price: $product_price /-</p>
            <a href='./shop.php?id=$product_id' class='btn btn-info'>Add to cart</a>
          </div>
        </div>
      </div>";
        }
    }

}
function cart()
{
    if (isset($_GET['id'])) {
        global $con;

        $get_product_id = $_GET['id'];
        $select_query = "select * from `cart_details` where
      id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside Cart')</script>";
            echo "<script>window.open('order.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (id) 
        values ($get_product_id)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is add to Cart')</script>";
            echo "<script>window.open('order.php','_self')</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--------------------------------------------------------------- bootstrap css link --------------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--------------------------------------------------------------- font awesome --------------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--------------------------------------------------------------- css file ------------------------------------------------------->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* overflow-x: hidden; */
        }

        .logo {
            width: 7%;
            height: 7%;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
        .container-fluid h1 span {
            color: #ff004f;
        }
    </style>

</head>

<body>

    <nav class='navbar navbar-expand-lg navbar-light bg-info'>
        <div class='container-fluid'>
            <h1><span>M</span>ade2<span>A</span>utomate</h1>
            <nav class='navbar navbar-expand-lg'>
                <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a href='./order.php' class='nav-link mx-5'>Orders</a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>

    <div class="bg-light">
      <h3 class="text-center">Store</h3>
      <p class="text-center">Communications is the heart of Made2utomate.</p>
    </div>

    <div class="col-md-10">
        <div class="row">
            <?php
            getproduct();
            cart();
            ?>
        </div>
    </div>

    <!-- -------------------------------------------------------------------------------last child ------------------------------------->
    <div class='bg-info p-3 text-center footer'>
        <P>All rights reserved ©️ -Designed by AMAN 2023</P>
    </div>
    </div>

    <!---------------------------------------------------------------------------- bootstrap js link ----------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

</body>

</html>