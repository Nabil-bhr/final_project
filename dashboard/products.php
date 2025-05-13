<?php
include("../config.php");

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $con->query("DELETE FROM products WHERE id = $id");
    header("Location: products.php");
    exit;
}

$result = $con->query("SELECT * FROM products");
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
?>
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
        <h1>Product List</h1>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price (DZD)</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <img class="product-img" src="uploads/<?= htmlspecialchars($product['img']) ?>" alt="product image" width="80">
                        </td>
                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                        <td><?= number_format($product['price'], 2) ?></td>
                        <td><?= $product['in_the_stock'] ?></td>
                        <td>
                            <a href="products.php?delete=<?= $product['id'] ?>" onclick="return confirm('Are you sure?');">
                                <button class="delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <a class="home_btn" href="../index.php">
            <i class="fas fa-home"></i>
            <P>Home</P>
        </a>
    </div>
</body>

</html>