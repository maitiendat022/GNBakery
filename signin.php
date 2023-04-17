<?php
session_start();
require './database/connect.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIGNIN-GNBAKERY</title>
  <link rel="shortcut icon" type="image" href="img/logo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/signin.css">
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>

<body>
<?php require './header.php'; ?>


  <div class="page_container">
    <div class="main_content">
      <div class="wrap_lightbox">
        <div class="box_left_signup">
          <h2>WELCOME TO GNBAKERY</h2>
          <img class="main_logo" src="./img/logo.jpg" alt="">
          <label for="">Bạn đã có tài khoản chưa ?</label>
          <a href="signup.php">
            <button button class="btnSignup" type="submit">ĐĂNG KÝ NGAY</button>
          </a>
        </div>
        <form action="process-signin.php" method="post" class="box_right_signin">
          <h2>ĐĂNG NHẬP</h2>
          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="text">
            <label for="floatingInput">Mật khẩu</label>
            <small style="color:red;">
              <?php
              if (isset($_GET['error'])) {
                echo "{$_GET['error']}";
              } else {
                echo "";
              }
              ?>
            </small>
            <span style="color:green;">
                <?php
                if (isset($_GET['success'])) {
                  echo "{$_GET['success']}";
                } else {
                  echo "";
                }
                ?>
              </span>
            
          </div>

          <!-- <div class="checkbox mb-3">
                        <label>
                          <input class="remember_text" type="checkbox" value="remember-me"> Nhớ mật khẩu
                        </label>
                      </div> -->
          <button class="btnSignin" name="btnSignin" type="submit">ĐĂNG NHẬP</button>
        </form>
      </div>
    </div>
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
                  <a href="/"><img style="width: 50%;height:50%;" src="img/logo.png"
                      alt="GN BAKERY - Bánh ngọt Pháp"></a>
                </div>

                <div class="ft-contact-address">
                  <i class="fa fa-home" aria-hidden="true"></i> 90 Nguyễn Tuân TP. Hà Nội
                </div>
                <div class="ft-contact-tel">
                  <i class="fa fa-mobile" aria-hidden="true"></i> <a style="color: white; font-weight: bolder;"
                    href="tel:0333135698">0333135698</a>
                </div>
                <div class="ft-contact-email">
                  <i class="fa fa-envelope" aria-hidden="true"></i> <a style="color: white;font-weight: bolder;"
                    href="mailto:info@gnbakery.vn">info@gnbakery.vn</a>
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
              <p>Mỗi tháng chúng tôi đều có những đợt giảm giá dịch vụ và sản phẩm nhằm tri ân khách hàng. Để có thể cập
                nhật kịp thời những đợt giảm giá này, vui lòng nhập địa chỉ email của bạn vào ô dưới đây
              <p>
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
                    <div class="owl-page active">
                      <span class="">

                      </span>
                    </div>
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



  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="./assets/js/notify.min.js"></script>
  <script>
  $('document').ready( function() {
    $.notify("<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>", "success");
  } );
  </script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="js/app.js"></script>
</body>

</html>