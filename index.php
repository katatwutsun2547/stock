<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
<body>

<nav>
    <div class="nav-container">
      <a href="index.html">
        <img src="./imgs/logo.png" class="logonav">
      </a>
      <h1>มิตรการเกษตร</h1>
      <div class="nav-profile">
        <p class="nav-profile-name">ตะกร้า</p>
        <div onclick="openCart()" style="cursor: pointer;" class="nav-profile-cart">
          <i class="fas fa-cart-shopping"></i>
          <div id="cartcount" class="cartcount" style="display: none;">
            
          </div>
        </div>
      </div>
    </div>
  </nav>

  
  <div class="container">
    <div class="sidebar">
      <input onkeyup="searchsomething(this)" id="txt_search" type="text" class="sidebar-search" placeholder="ค้นหา ...">

      <a onclick="searchproduct('all')" class="sidebar-items">
        หน้าหลัก
      </a>
      <a onclick="searchproduct('protect')" class="sidebar-items">
        กลุ่มป้องกันโรคพืช
      </a>
      <a onclick="searchproduct('chemical')" class="sidebar-items">
       กลุ่มปุ๋ยเคมีทางใบ
      </a>
      <a onclick="searchproduct('aminoacid')" class="sidebar-items">
       กลุ่มอะมิโนแอซิด
      </a>
      <a onclick="searchproduct('dispose')" class="sidebar-items">
      กลุ่มกำจัดศัตรูพืช
      </a>
      <a onclick="searchproduct('soilchemistry')" class="sidebar-items">
      กลุ่มปุ๋ยเคมีทางดิน
      </a>
      <a onclick="searchproduct('waterconditioning')" class="sidebar-items">
      กลุ่มปรับสภาพน้ำ
      </a>
    </div>
    <div id="productlist" class="product">
    </div>
  </div>
  
  <div id="modalDesc" class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
      <h2>รายละเอียด</h2>
      <br>
      <div class="modaldesc-content">
        <img id="mdd-img" class="modaldesc-img" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
        <div class="modaldesc-detail">
          <p id="mdd-name" style="font-size: 1.5vw;">Product name</p>.
          <p id="mdd-price" style="font-size: 1.2vw;">500 THB</p>
          <br>
          <p id="mdd-desc" style="color: #adadad;"></p>
          <br>
          <div class="btn-control">
            <button onclick="closeModal()" class="btn">
              ปิด
            </button>
            <button onclick="addtocart()" class="btn btn-buy">
              เพิ่มในรายการ
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modalCart" class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
      <h2>ตะกร้า</h2>
      <br>
      <div id="mycart" class="cartlist">

      </div>
      <div class="btn-control">
        <button onclick="closeModal()" class="btn">
          ปิด
        </button>
        <input type="submit" name="print" id="modalCart" value="พิมใบเสร็จ" class="btn btn-buy" / onclick="window.print() ;">
        <button class="btn btn-buy">
       
        </button>
        <a href="pay.php"></a>
  
      </div>
    </div>
  </div>
      </div>
    </div>
    <div id="modalCart" class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
      <h2>My cart</h2>
      <br>
      <div id="mycart" class="cartlist">

      </div>
      
          <div class="cartlist-right">
            <p class="btnc">-</p>
            <p style="margin: 0 20px;">1</p>
            <p class="btnc">+</p>
          </div>
        </div>

      </div>
    
    </div>
  </div>
</body>
    <div class="homecontent">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <p>ยินดีต้อนรับเข้าสู่เว็บไซต์ร้านมิตรการเกษตร</p>


        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>

    </div>
  </div>
</nav>
</body>
</html>