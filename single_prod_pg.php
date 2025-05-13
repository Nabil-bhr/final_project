<?php
include("config.php");
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 0) {
    die("product not fond");
}

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BN SNEAKERS</title>
    <!-- Style Link -->
    <link rel="stylesheet" href="./style.css">
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
    <div class="product-page">
        <div class="product-container">
            <div class="product-image">
                <img src="img/<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
            </div>
            <div class="product-details">
                <div class="product-name"><?= htmlspecialchars($product['product_name']) ?></div>
                <div class="price"><?= htmlspecialchars($product['price']) ?> DA</div>

                <div class="select-size" style="margin-top: 15px;">
                    <select>
                        <option selected disabled>Select Size</option>
                        <option>48</option>
                        <option>39</option>
                        <option>40</option>
                        <option>41</option>
                        <option>42</option>
                        <option>42</option>
                    </select>
                </div>

                <div class="action-row">
                    <div class="quantity">
                        <input type="number" value="1" min="1">
                    </div>
                    <div class="add-to-cart">
                        <button>Add to Cart</button>
                    </div>
                </div>

                <div class="product-description">
                    <h3>Product Details</h3>
                    <?= nl2br(htmlspecialchars($product['description'])) ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>