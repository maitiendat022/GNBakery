<?php 

require 'cart_function.php';
require './database/connect.php';

    
    $sql = "select * from categories";
    $categories = mysqli_query($connect, $sql);

$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
?>

  <header class="medium-header">
    <div class="site-header">
      <div class="header-left">

        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

          <div class="drawer_header">
            <a href="#"><img style="width:40%;height: 40%;
   margin-bottom: 15px;" src="img/logo.png"></a>
          </div>

          <a href="./index.php">Trang chủ</a>
          <?php foreach($categories as $category) { ?>
            <button class="dropdown-btn"><?= $category['name'] ?><i class="fa fa-caret-down"></i></button>
            <div class="dropdown-container">
              <?php  
                  $sql = "select * from category_detail where category_id = '$category[id]'";
                  $result_sub = mysqli_query($connect,$sql);
                  foreach($result_sub as $each_sub) {
              ?>
                  <a href="./index.php?category=<?= $each_sub['id'] ?>"><?= $each_sub['name'] ?></a>
              <?php } ?>
            </div>
          <?php } ?>
          <?php if(empty($_SESSION['id'])) { ?>
            <a href="./signin.php">
              <i class="bi bi-people-fill" aria-hidden="true"></i>
              Tài khoản
            </a>
          <?php } else { ?>
              <a href="./user.php?id=<?= $each['id'] ?>">
              <i class="bi bi-people-fill" aria-hidden="true"></i>
              Chào , <?= $_SESSION['name'] ?>
            </a>
            <a href="signout.php">
              <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
              Đăng Xuất
            </a>
          <?php } ?>

        </div>

        <div id="main">

          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <div class="logo">
          <h1>
            <a href="#">
              <img src="img/logo.png">
            </a>
          </h1>
        </div>

        <div class="search">
          <form action="./index.php" method="post" class="input-search" role="search">
            <input id="search" type="search" name="search" value placeholder="Tim kiem..." class="input-field" aria-label="Tim kiem ..." autocomplete="off">
            <span class="input-group-btn">
              <button type="submit" class="btn icon-fallback-text">
                <i class="bi bi-search" aria-hidden="true"></i>

              </button>

            </span>
          </form>
          <div class="sub-search">
            <ul class="sub-search-list">
              <!-- <li class="sub-search-item">
                <a href="#" class="sub-search-link">
                  <img class="sub-search-link__img" src="./assets/images/products/cake_1646466680.jpg" alt="">
                  <h5 class="sub-search-link__name">
                    TIRAMISU
                  </h5>
                  <span class="sub-search-link__price">
                    200.000đ
                  </span>
                </a>
              </li>
              <li class="sub-search-item">
                <a href="#" class="sub-search-link">
                  <img class="sub-search-link__img" src="./assets/images/products/cake_1646466680.jpg" alt="">
                  <h5 class="sub-search-link__name">
                    TIRAMISU
                  </h5>
                  <span class="sub-search-link__price">
                    200.000đ
                  </span>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>


      <div class="header-right">
        <ul class="list-item">
          <a class="item" href="tel:0333135698">
            <i class="bi bi-telephone-fill" aria-hidden="true"></i>
            <span>0333135698</span>
          </a>
          <a class="item" href="#">
            <i class="bi bi-house-fill" aria-hidden="true"></i>
            <span>
              90 Nguyễn Tuân Hà Nội
            </span>
          </a>
          <?php if(empty($_SESSION['id'])) { ?>
            <a class="item" href="./signin.php">
              <i class="bi bi-people-fill" aria-hidden="true"></i>
              Tài khoản
            </a>
          <?php } else { ?>
              <a class="item" href="user.php">
              <i class="bi bi-people-fill" aria-hidden="true"></i>
              Chào , <?= $_SESSION['name'] ?>
            </a>
            <a class="item" href="signout.php">
              <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
              Đăng Xuất
            </a>
          <?php } ?>
       
          <a class="item" href="cart.php">
            <div class="cart-total-price">
              <i class="bi bi-cart-dash-fill" aria-hidden="true"></i>
              
              <?php if(empty($_SESSION['id'])) { ?><span id="CartCount">
               
              0</span>
              <?php } else { ?>
                <span id="CartCount"><?php echo total_item($cart) ?></span>
                <?php } ?>
            </div>
          </a>
          
          <ul>

      </div>

    </div>
    <nav class="container">
      <ul id="main-menu">
        <li><a href="./index.php">TRANG CHỦ</a></li>
        <?php foreach($categories as $category) { ?>
            <li>
                <a href="#"><?= $category['name'] ?></a>
                <ul class="sub-menu">
                    <?php  
                        $sql = "select * from category_detail where category_id = '$category[id]'";
                        $result_sub = mysqli_query($connect,$sql);
                        foreach($result_sub as $each_sub) {
                    ?>
                    <li><a href="./index.php?category=<?= $each_sub['id'] ?>"><?= $each_sub['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </li>
          <?php } ?>
       
      </ul>
    </nav>
    </div>

    </div>
    </div>
  </header>