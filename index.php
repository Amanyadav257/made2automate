<?php
include("./includes/connect.php");

function total()
{
    global $con;

    $total_price = 0;


    $select_products = "SELECT count(cart_details.id) as co,count(product_add.id) as dead,product_add.price FROM product_add
        INNER JOIN cart_details ON cart_details.id = product_add.id";

    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
        $product_price = array($row_product_price['price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }

    $select_products_details = "SELECT count(product_add.category) as ca from product_add";
    $result_produ = mysqli_query($con, $select_products_details);
    $row_product = mysqli_fetch_array($result_produ);
    $total_category = $row_product['ca'];

    $result_order = mysqli_query($con, $select_products);
    $row = mysqli_fetch_array($result_order);
    $total_order = $row['co'];
    $total_dead_stock = $row['dead'];
   

    $total_lead = $total_order + 5;
    $total_dead = $total_category - $total_dead_stock;



    echo "<header>
        <h1 style='color: #f8f5f5'>Dashboard</h1>
        <div class='stats'>
            <div>
                <span>$total_order</span>
                <p>Total Orders</p>
            </div>
            <div>
                <span>$total_category</span>
                <p>New Stocks</p>
            </div>
            <div>
                <span>$total_dead</span>
                <p>Dead Stocks</p>
            </div>
            <div>
                <span>$total_lead</span>
                <p>Total Leads</p>
            </div>
            <div>
                <span>$total_price</span>
                <p>Total Revenue</p>
            </div>
        </div>
    </header>";


}
function total_orders(){
    global $con;

    $select_products = "SELECT * FROM product_add INNER JOIN cart_details ON cart_details.id = product_add.id
     order by rand() LIMIT 0,2";

    $result_query=mysqli_query($con,$select_products);

    while ($row=mysqli_fetch_assoc($result_query)) {
        $pro_name=$row['pro_name'];
        $pro_description=$row['pro_description'];
        $pro_quantity=$row['pro_quantity'];

        echo "<h3>$pro_name</h3>
            <p>Product Description: $pro_description</p>
            <span>Quantity: $pro_quantity</span>";
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
    <link rel="stylesheet" href="a.css">

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
                        <a href='./shop.php' class='nav-link mx-5'>Shopping</a>
                        <a href='./admin_area/index.php' class='nav-link mx-5'>Add Product</a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>

    <?php
    total();
    ?>
    <main>
    <section class='orders'>
        <h2>Total Orders</h2>
        <a href='./order.php'><button>View All</button></a>
        <div class='order-item'>
           <div class='info'>   
       <?php total_orders();
       
       ?>     
            </div>
        </div>
    </section>

    <section class='leads'>
        <h2>Total Leads</h2>
        <button>View All</button>
        <div class='lead-item'>
            <div class='lead-info'>
                <h3>Rakesh Verma</h3>
                <p>Contact Details: 1234567890</p>
                <p>I need metal sensor. Is it available now? Please let me know.</p>
                <span>Quantity: 120 pieces</span>
            </div>
            <div class='actions'>
           <a href='./admin_area/index.php'><button >Add Product</button></a>
            </div>
        </div>
    </section>
</main>

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