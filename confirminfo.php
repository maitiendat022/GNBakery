<?php
session_start();
if (empty($_SESSION['id'])) {
  header('location:./signin.php');
  exit();
}

$id = $_SESSION['id'];
require './database/connect.php';
$sql = "select * from users where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONFIRM-GNBAKERY</title>
  <link rel="shortcut icon" type="image" href="img/logo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/confirminfo.css">
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>
  <?php require './header.php'; ?>
  <div class="hero-image">
    <div>
      <p class="hero-text"></p>
    </div>
  </div>
  <div class="main-container-header">
    <div class="confirm-container">
      <div class="confirm-box">
        <div class="confirm-text">
          <p>Thông tin người nhận</p>
        </div>
        <hr>
      </div>
    </div>
    <form class="form-page" action="./process_checkout.php" method="post">
      <div class="page_container">
        <div class="main_content">
          <div class="form_name">
            <label for="">Họ và tên</label>
            <input type="text" name="name_receiver" class="form-control" value="<?= $each['name'] ?>" required>
          </div>
          <div class="form_address">
            <label for="">Địa chỉ</label>
            <input type="" name="address_receiver" class="form-control" value="<?= $each['address'] ?>" required>
          </div>
          <div class="form_phone">
            <label for="">Số điện thoại</label>
            <input type="" name="phone_receiver" class="form-control" value="<?= $each['phone'] ?>" required>
          </div>
          <div class="btnup">
            <a class="btnReturn" href="./cart.php">Quay lại</a>
            <button class="btnConfirm">Xác nhận</button>
          </div>
        </div>
      </div>
    </form>

  </div>
  <footer>
    <div class="footer-top">
      <div class="footer-top-overlay"></div>
      <div class="wrapper">
        <div class="inner">
          <div class="grid-item">
            <div class="contact-item ">
              <div class="ft-contact">

                <div class="ft-contact-logo ">
                  <a href="/"><img style="width: 50%;height:50%;" src="img/logo.png" alt="GN BAKERY - Bánh ngọt Pháp"></a>
                </div>

                <div class="ft-contact-address">
                  <i class="fa fa-home" aria-hidden="true"></i> 90 Nguyễn Tuân TP. Hà Nội
                </div>
                <div class="ft-contact-tel">
                  <i class="fa fa-mobile" aria-hidden="true"></i> <a style="color: white; font-weight: bolder;" href="tel:0333135698">0333135698</a>
                </div>
                <div class="ft-contact-email">
                  <i class="fa fa-envelope" aria-hidden="true"></i> <a style="color: white;font-weight: bolder;" href="mailto:info@gnbakery.vn">info@gnbakery.vn</a>
                </div>
              </div>
            </div>

            <div class="menu ">
              <div class="ft-menu">
                <h4>Chính sách</h4>
                <ul class="list">


                  <li><a style="text-decoration: none;" href="">Chính sách và quy định chung</a></li>

                  <li><a style="text-decoration: none;" href="">Chính sách giao dịch, thanh toán</a></li>

                  <li><a style="text-decoration: none;" href="">Chính sách đổi trả</a></li>

                  <li><a style="text-decoration: none;" href="">Chính sách bảo mật</a></li>

                  <li><a style="text-decoration: none;" href="">Chính sách vận chuyển</a></li>

                </ul>
              </div>
            </div>

            <div class="subscribe ">
              <div class="ft-subscribe-wrapper">
                <h4>GN Bakery</h4>
                <div class="ft-subscribe">
                  <p>Tên đơn vị: Công ty Cổ phần Bánh ngọt GN
                    Số giấy chứng nhận đăng ký kinh doanh: 0104802706
                    Ngày cấp: 21/07/2010
                    Nơi cấp: Sở Kế hoạch và Đầu tư Tp. Hà Nội

                  </p>

                  <form accept-charset="UTF-8" action="/account/contact" class="contact-form" method="post" name="myForm" onsubmit="validateForm()">
                    <input name="form_type" type="hidden" value="customer">
                    <input name="utf8" type="hidden" value="✓">



                    <div class="input-group-intro">

                      <input type="hidden" name="contact[tags]" value="newsletter">

                    </div>

                  </form>



                </div>
              </div>

            </div>

            <div class="connect">
              <h4>Mỗi tháng chúng tôi đều có những đợt giảm giá dịch vụ và sản phẩm nhằm tri ân khách hàng. Để có thể cập nhật kịp thời những đợt giảm giá này, vui lòng nhập địa chỉ email của bạn vào ô dưới đây</h4>
              <div id="owl-home-main-banners-slider-ft" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                  <div class="owl-wrapper" style="width: 424px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
                    <div class="owl-item" style="width: 212px;">
                      <div class="item">

                      </div>
                    </div>
                  </div>
                </div>
                <div class="owl-controls clickable" style="display: none;">
                  <div class="owl-pagination">
                    <div class="owl-page active"><span class=""></span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="wrapper">
        <div class="inner">
          <div class="grid">
            <div class="grid__item ">
              <div class="ft-copyright-menu text-right">
                <ul class="no-bullets">
                </ul>
              </div>
            </div>
            <div class="grid__item ">
              <div class="ft-copyright">
                Copyrights © 2018 by <a style="text-decoration:none;" target="_blank" href="">GN Bakery</a>.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </footer>
  <div id="hotline">
    <a href="tel:0333135698" id="yBtn">
      <i class="bi bi-telephone-fill"></i>
    </a>
    <div class="text-quotes">
      <a href="tel:0333135698">0333135698</a>
    </div>

  </div>
  <div id="backtop">
    <i class="bi bi-chevron-compact-up"></i>
  </div>

  <script src="js/app.js"></script>
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>

</html>