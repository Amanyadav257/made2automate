<?php
include("./includes/connect.php");

function bar()
{
    if (isset($_GET['pro_id'])) {
        global $con;

        $prod_id = $_GET['pro_id'];
        $select_query = "SELECT * FROM `product_add` WHERE pro_id = ?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "s", $prod_id);
        mysqli_stmt_execute($stmt);

        $result_query = mysqli_stmt_get_result($stmt);
        $row_product = mysqli_fetch_assoc($result_query);
        $img = $row_product['pro_img'];
        $pro_name = $row_product['pro_name'];
        $pro_description = $row_product['pro_description'];
        $manu_name = $row_product['manu_name'];
        $prod_id = $row_product['pro_id'];
        $category = $row_product['category'];
        $price = $row_product['price'];
        $pro_quantity = $row_product['pro_quantity'];


        echo "<header>
        <h1>$pro_name</h1>
    </header>
    <main>
           
        <div class='product-image'>
            <img src='./admin_area/pro_img/$img' alt='Length Counter Meter'>
        </div>
        <div class='product-description'>
            <p>$pro_description</p>
            <p>Manufacturer: $manu_name</p>
            <p>Product ID: $prod_id</p>
        </div>
        <div class='product-price-quantity'>
            <p>Price (per piece): Rs. $price</p>
            <p>Quantity: $pro_quantity pieces</p>
            <p>Category: $category</p>
        </div>
        <div class='e-commerce-listing'>
            <h3>E-Commerce Listing</h3>
            <ul>
                <li><a href='www.amazon.com'>Amazon</a></li>
                <li><a href='www.flipkart.com'>Flipkart</a></li>
                <li><a href='www.indiamart.com'>Indiamart</a></li>
                <li><a href=''>Website</a></li>
            </ul>
        </div>
    </main>";

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
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #eee;
            padding: 20px;
            text-align: center;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product-image {
            flex: 1 1 200px;
            margin: 10px;
        }

        .product-description {
            flex: 2 1 400px;
            margin: 10px;
        }

        .product-price-quantity {
            flex: 1 1 200px;
            margin: 10px;
        }

        .e-commerce-listing {
            flex: 2 1 400px;
            margin: 10px;
        }

        h3 {
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        .container-fluid h1 span {
            color: #ff004f;
        }

    </style>
</head>

<body>

    <div class='container-fluid p-0'>

        <nav class='navbar navbar-expand-lg navbar-light bg-info'>
            <div class='container-fluid'>
                <h1><span>M</span>ade2<span>A</span>utomate</h1>
                <nav class='navbar navbar-expand-lg'>
                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a href='./index.php' class='nav-link mx-5'>Home</a>

                        </li>
                    </ul>
                </nav>
            </div>
        </nav>



        <?php
        bar();
        ?>
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


