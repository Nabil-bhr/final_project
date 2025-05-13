<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BN SNEAKERS</title>
    <!-- Style Link -->
    <link rel="stylesheet" href="../style.css">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
</head>

<body>
<div class="dashboard">
        <h1>Admin Dashboard</h1>
        <div class="dash_navbar">
            <nav role="navigation">
                <ul>
                    <li>
                        <a class="create_products" href="create_Prod.php">
                            <i class="fa-solid fa-plus"></i>
                            <P>Create Products</P>
                        </a>
                    </li>
                    <li>
                        <a class="home" href="products.php">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <P>Products</P>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="dash_box dash_form-box">
            <?php
            include("../config.php");
            if (isset($_POST['submit'])) {
                $prod_name = $_POST['product_name'];
                $decription = $_POST['description'];
                $price = (float)$_POST['price'];
                $in_the_stock = (int) $_POST['in_the_stock'];

                $img_name = $_FILES['img']['name'];
                $tmp_name = $_FILES['img']['tmp_name'];

                $upload_folder = "uploads/";
                $upload_path = $upload_folder . basename($img_name);

                if (!is_dir($upload_folder)) {
                    mkdir($upload_folder, 0755, true);
                }
                if (move_uploaded_file($tmp_name, $upload_path)) {

                    $query = "INSERT INTO products (Product_Name, Description, Price, In_the_stock,Img) 
                  VALUES ('$prod_name', '$decription', $price, $in_the_stock, '$img_name')";

                    if (mysqli_query($con, $query)) {
                        echo "<div class='message'>
                      <p>The product has been added succssfully</p>
                  </div> <br>";
                    } else {
                        echo "<div class='message'>
                      <p> input error </p>
                  </div> <br> " . mysqli_error($conn);
                    }
                } else {
                    echo "<div class='message'>
                      <p> image upload failed </p>
                  </div> <br>";
                }
            } else {
            ?>
                <h2>Create New Product</h2>
                <form action="" method="POST" enctype="multipart/form-data" class="product-form">
                    <div class="field input">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" id="product_name" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" required></textarea>
                    </div>

                    <div class="field input">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" step="0.01" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="in_the_stock">Count in Stock</label>
                        <input type="number" name="in_the_stock" id="in_the_stock" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="img" class="upload-btn">upload picture
                            <i class="fa-solid fa-upload"></i>
                        </label>
                        <input type="file" name="img" id="img" autocomplete="off" required hidden>
                    </div>


                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Create Product" required>
                    </div>

                </form>

            <?php  } ?>
        </div>
        <a class="home_btn" href="../index.php">
            <i class="fas fa-home"></i>
            <P>Home</P>
        </a>
    </div>
</body>

</html>