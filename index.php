<?php
session_start();

include("config.php");
if (!isset($_SESSION['valid'])) {
  header("Location: login.php");
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
  <header id="header">
    <?php

    $id = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

    while ($result = mysqli_fetch_assoc($query)) {
      $res_Uname = $result['Username'];
    }
    ?>

    <!-- القائمة الجانبية و زرها -->
    <div class="left">
      <input type="checkbox" id="toggle">
      <label for="toggle" class="menu-btn"><i class="fa-solid fa-bars"></i></label>

      <div class="sidebar">
        <div class="sidebarhead">
          <h2><?php echo $res_Uname ?></h2>
          <label for="toggle" class="fa-solid fa-xmark"></label>

        </div>

        <ul>
          <li>
            <a class="home" href="index.php">
              <i class="fas fa-home"></i>
              <P>Home</P>
            </a>
          </li>
          <?php
          if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            echo '<li>
            <a class="active" href="dashboard/create_prod.php">
              <i class="fa-solid fa-th-large"></i>
              <P>Dashboard</P>
            </a>
          </li>';
          }
          ?>
          <li>
            <a class="active" href="#about">
              <i class="fa-solid fa-circle-info"></i>
              <P>About</P>
            </a>
          </li>
          <li class="log-in">
            <a href="log_out.php">
              <i class="fa-solid fa-right-to-bracket"></i>
              <P>Log Out</P>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- العنوان -->
    <div class="center">
      <h1>bn sneakers</h1>
    </div>

    <!-- اللوجو -->
    <div class="right">
      <img src="./img/air-jordan.png" alt="Logo">
    </div>
  </header>
  <main>
    <section id="reception">
      <div class="content">
        <h1>Welcome To <span class="primary-text"> bn sneakers </span> store</h1>
        <p>Welcome to your ultimate destination for premium athletic footwear where innovation,
          comfort, and performance come together to elevate every step you take</p>
      </div>
    </section>

    <section id="product">
      <div class="content">
        <div class="product_grid">
          <?php
          include("config.php");

          $productsPerPage = 12;
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          if ($page < 1) $page = 1;
          $startFrom = ($page - 1) * $productsPerPage;


          $sql = "SELECT * FROM products LIMIT $startFrom, $productsPerPage";
          $result = mysqli_query($con, $sql);
          $products = [];
          while ($row = $result->fetch_assoc()) {
            $products[] = $row;
          }
          ?>
          <?php foreach ($products as $product): ?>
            <a href="single_prod_pg.php?id=<?= $product['id'] ?>" class="product-card">
              <div class="image-container">
                <img
                  src="img/<?= htmlspecialchars($product['img']) ?>"
                  alt="<?= htmlspecialchars($product['product_name']) ?>">
              </div>
              <h3><?= htmlspecialchars($product['product_name']) ?></h3>
              <p><?= htmlspecialchars($product['price']) ?> DA</p>
            </a>
          <?php endforeach; ?>
        </div>
        <div class="pagination">
          <?php
          $totalQuery = "SELECT COUNT(*) as total FROM products";
          $totalResult = mysqli_query($con, $totalQuery);
          $totalRow = mysqli_fetch_assoc($totalResult);
          $totalProducts = $totalRow['total'];
          $totalPages = ceil($totalProducts / $productsPerPage);

          echo '<div class="pagination">';
          for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
              echo "<span class='active'>$i</span>";
            } else {
              echo "<a href='?page=$i'>$i</a>";
            }
          }
          echo '</div>';
          ?>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="content">
        <div>
          <h3>ADDRESS</h3>
          <p><i class="fa-solid fa-location-dot"></i> boudouaou boumerdes </p>
          <p><i class="fa-solid fa-phone"></i> Phone: 123456789</p>
          <p><i class="fa-regular fa-envelope"></i> support@gmail.com</p>
        </div>
        <div>
          <h3>WORKING HOURS</h3>
          <p>8:00 am to 11:00 pm on Weekdays</p>
          <p>11:00 am to 1:00 Am on Weekends</p>
        </div>
        <div>
          <h3>FOLLOW US</h3>
          <a href="#" class="fb"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>
    </section>



  </main>

  <footer id="footer">
    <p>Copyright &copy; 2025 All rights reserved | made by <b> BOUHAROUR NABIL </b></p>
    <a href="#header" class="scroll_up"><i class="fa-solid fa-arrow-up"></i></a>
  </footer>
</body>

</html>