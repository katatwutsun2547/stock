<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="customer.css">
</head>
<body>

<nav>
    <div class="nav-container">
      <a href="index.html">
        <img src="./imgs/logo.png" class="logonav">
      </a>
      <h1>มิตรการเกษตร</h1>
      <div class="nav-profile">
        <div onclick="openCart()" style="cursor: pointer;" class="nav-profile-cart">
          <i class="fas fa-cart-shopping"></i>
          <div id="cartcount" class="cartcount" style="display: none;">
            
          </div>
        </div>
      </div>
    </div>
  </nav>

  <nav class="search">
  <div class="container-fluid">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>