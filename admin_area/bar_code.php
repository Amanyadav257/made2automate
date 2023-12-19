<?php
include("../includes/connect.php");

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


    echo "<div class='container'>
    <div class='header'>
      <h1>Successfully Added Product</h1>
    </div>
    <div class='main'>
      <div class='product-info'>
      
      <img src='./pro_img/$img' alt='Featured Image'>

        <div class='product-name'>
        <h3>$pro_name</h3>
        <p>$pro_description</p>
        <div style='display: flex;justify-content: space-between;'>
        
        <div><h4>Manufacturer: <span style='color: blue'>$manu_name</span></h5></div>
        
        <div><h5> Product ID: <span style='color: blue'>$prod_id</span></h5></div>  
        </div>

       <div >
         <div><h5>Price (per piece): <span style='color: blue'>Rs. $price</span></h5></h5></div>
        
        <div><h5>Quantity: <span style='color: blue'>$pro_quantity pieces</span></h5></div>
        <div><h5>Category: <span style='color: blue'>$category</span></h5></div>
  
        </div>
        </div>      
      </div>

      <div class='barcode'>
    
      <img alt='testing' src='https://www.webarcode.com/barcode/image.php?code=" . $row_product['pro_id'] . "&type=C128B&xres=1&height=50&width=154&font=3&output=png&style=197' />
      
      </div>
      <div class='buttons'>
        <a href='https://www.webarcode.com/barcode/image.php?code=" . $row_product['pro_id'] . "&type=C128B&xres=1&height=50&width=154&font=3&output=png&style=197'><button class='button'>Print Barcode</button></a>
        <button class='button' onclick='downloadImage('https://www.webarcode.com/barcode/image.php?code=" . $row_product['pro_id'] . "&type=C128B&xres=1&height=50&width=154&font=3&output=png&style=197')' >Save to device</button>
        <button class='button'>Edit Details</button>
        <a href='../listing.php?pro_id=$prod_id'><button class='button'>Save Changes</button></a> 
      </div>
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
  <link rel="stylesheet" href="style.css">

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

  <div class='container-fluid p-0'>

    <nav class='navbar navbar-expand-lg navbar-light bg-info'>
      <div class='container-fluid'>
        <h1><span>M</span>ade2<span>A</span>utomate</h1>
        <nav class='navbar navbar-expand-lg'>
          <ul class='navbar-nav'>
            <li class='nav-item'>
              <a href='../index.php' class='nav-link mx-5'>Home</a>

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
  <script>
    function downloadImage(url) {
      // Create a temporary link element
      var link = document.createElement('a');
      link.href = url;
      link.download = 'image.png'; // Specify the desired file name

      // Append the link to the body
      document.body.appendChild(link);

      // Trigger a click on the link to initiate the download
      link.click();

      // Remove the link from the DOM
      document.body.removeChild(link);
    }
  </script>
</body>

</html>