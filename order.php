<?php
include("./includes/connect.php");
session_start();

function get_all_order()
{
    global $con;

    $select_query= "SELECT * FROM product_add
        INNER JOIN cart_details ON cart_details.id = product_add.id";

    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $pro_name = $row['pro_name'];
        $pro_img = $row['pro_img'];
        $pro_id = $row['pro_id'];
        $manu_name = $row['manu_name'];
        $pro_description = $row['pro_description'];
        $pro_quantity = $row['pro_quantity'];
        $category = $row['category'];
        $price = $row['price'];

        echo "<div class='product-container'>
        <img src='./admin_area/pro_img/$pro_img' alt='Product image'>
        <div class='product-info'>
            <h2>$pro_name</h2>
            <p>$pro_description</p>
            <div class='price-customer'>
                <span class='price'>Price: $price</span>
                <span class='customer'>Customer Name: Rakesh Singh</span>
            </div>
            <div class='quantity'>$pro_quantity  pieces</div>
            <div class='buttons'>
                <a href='./shop.php'><button class='order-again'>Order Again</button></a> 
                <button class='view-details'>View Details</button>
            </div>
        </div>
    </div>";

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
    <link rel="stylesheet" href="order.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        .container-fluid h1 {
            font-size: 60px;
            margin-top: 20px;
        }

        .container-fluid h1 span {
            color: #ff004f;
        }

        @media only screen and (max-width: 975px) {
            .text-media {
                resize: vertical;
                width: 100%;
            }

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
                        <a href='./index.php' class='nav-link mx-5'>Home</a>
                       
                      
                    </li>
                </ul>
            </nav>
        </div>
    </nav>

        <?php
        get_all_order(); 
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