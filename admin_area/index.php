<?php
include("../includes/connect.php");
session_start();

if (isset($_POST['insert_pro'])) {
   
    $pro_name = $_POST['pro_name'];
    $pro_id = $_POST['pro_id'];
    $manu_name = $_POST['manu_name'];
    $pro_description = $_POST['pro_description'];
    $pro_quantity = $_POST['pro_quantity'];
    $pro_price = $_POST['pro_price'];

    $category = $_POST['category'];


    $pro_img = $_FILES['pro_img']['name'];
    $pro_img_tmp = $_FILES['pro_img']['tmp_name'];

    move_uploaded_file($pro_img_tmp, "./pro_img/$pro_img");

    $insert_query = "insert into `product_add` (pro_name,pro_id,manu_name,pro_description,category,pro_img,pro_quantity,price) values
  ('$pro_name','$pro_id','$manu_name','$pro_description','$category','$pro_img',$pro_quantity,$pro_price)";

    $sql_execute = mysqli_query($con, $insert_query);

    echo "<script>alert('Product added')</script>";
    echo "<script>window.open('./bar_code.php?pro_id=$pro_id','_self')</script>";
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

        <div class='row'>
            <div class='col-md-12 bg-secondary p-1 d-flex align-items-center p-3'>
                    <p class='text-light text-center'>Welcome </p>
              

            </div>
        </div>

        <div class='container mt-3'>
            <h1 class='text-center'>Add Product</h1>
    

            <form action='' method='post' enctype='multipart/form-data' id='FormId'>
            <!------------------------------------------------------------ Product Image ------------------------------->

            <div class='form-outline mb-4 w-50 m-auto'>
            <label for='product_image1' class='form-label'>
            Product Image
            </label>
            <input type='file' name='pro_img' id='product_image1' class='form-control' required='required'>
        </div>
    

        <!------------------------------------------------------------ Product Name ------------------------------->

             <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_title' class='form-label'>
                    Product Name
                    </label>
                    <input type='text' placeholder='Enter Product name' name='pro_name' id='product_title' class='form-control'
                        autocomplete='off' required='required'>
                </div>

                <!------------------------------------------------------------ Product ID --------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='description' class='form-label'>
                    Product ID
                    </label>
                    <input type='text' placeholder='Enter Product ID' name='pro_id' id='description' class='form-control'
                        autocomplete='off' required='required'>
                </div>

                <!------------------------------------------------------------ Manufacturer Name ---------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                        Manufacturer Name
                    </label>
                    <input type='text' placeholder='Enter Manufacturer Name' name='manu_name' id='product_Keywords'
                        class='form-control' autocomplete='off' required='required'>
                </div>


                <!------------------------------------------------------------ Description---------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                    Product Description (max 35 Words)
                    </label>
                    <input type='text' placeholder='Enter Product Description' name='pro_description' id='product_Keywords'
                        class='form-control' autocomplete='off' required='required' maxlength='206'>
                </div>

                <!------------------------------------------------------------ Quantity ---------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                    Product Quantity
                    </label>
                    <div>
                    <input type='number' placeholder='Enter Product Quantity' name='pro_quantity'
                    class='form-control' autocomplete='off' required='required'>
                    </div>
                </div>

                <!------------------------------------------------------------ Price ---------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                    <label for='product_Keywords' class='form-label'>
                    Product Price
                    </label>
                    <div>
                    <input type='number' placeholder='Enter Product Price' name='pro_price'
                    class='form-control' autocomplete='off' required='required'>
                    </div>
                </div>

                <!--------------------------------------------------------------- Category ------------------------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto'>
                <label for='Category' class='form-label'>
                Select Category
                </label>
                <select name='category' class='form-select' required='required'>
                <option value=''>Select Category</option>
                <option value='New_Stock'>New Stock</option>
                <option value='Old_Stock'>Old Stock</option>
                </select>
                </div>

                <!----------------------------------------------------------------- Button ----------------------------------------------------->
                
            <div class='button-containe'  style='display: flex; justify-content: space-between; width: 50%; margin: auto;'>

            <!------------------------------------- Save Changes ---------------------------------->
        <div class='form-outline mb-4 w-50 m-auto' >
            <input type='submit' name='insert_pro' class='btn btn-info mb-3 px-3' value='Save Changes'>
        </div>

            <!---------------------------------- Cancel ----------------------------------------->
                <div class='form-outline mb-4 w-50 m-auto' >
                <button type='button' class='btn btn-info mb-3 px-3'  onclick='cancelForm()' >Cancel</button>
                </div>

        </div>
    
        <script>
            function cancelForm() {
    
               var form = document.getElementById('FormId');
               form.reset();
            }
            
    </script>

            </form>
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