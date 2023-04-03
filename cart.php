<?php require 'check_user_cart.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width">
  <title>GIO HANG - GNBAKERY BANH NGOT HUONG VI PHAP</title>
  <link rel="shortcut icon" type="image" href="img/logo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link rel="stylesheet" type="text/css" href="css/product.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>
  <?php require './header.php'; ?>
  <div class="hero-image">
    <div>

      <p class="hero-text">Giỏ Hàng của bạn</p><br>
     

    </div>
  </div>
  <div class="Pagecart">
    <div class="cart-content">
      <h1>Giỏ Hàng </h1>
      <!-- css cho Đạt -->
      <div class="Empty_cart"         <?php  
                        if(empty($cart)){
                          echo 'style = "display:block;"';
                        }
                        else{
                          echo 'style = "display:none;"';
                        }
                    ?>>
          <span class="cart-txt">Giỏ  hàng trống</span><br><br>
          <span  class="cart-txt">Tiếp tục đặt hàng: </span><a class="cart-txt-he" href="index.php">Tại đây</a>
      </div>
      <!--  -->
      <form  action="" method="post" novalidate="" class="cart table-wrap"
                  <?php  
                        if(empty($cart)){
                          echo 'style = "display:none;"';
                        }
                        else{
                          echo 'style = "display:block;"';
                        }
                  ?>>
        <table class="cart-table full ">
          <thead class="cart__row">

            <tr>
              <th class="item-img"></th>
              <th class="item-content-text">Thông tin chi tiết sản phẩm</th>
              <th class="item-content-price">Đơn giá</th>
              <th class="item-amount">Số lượng</th>
              <th class="item-total-price">Tổng giá</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($cart as $key => $value) : ?>
              <tr class="cart__row table__section">

                <td class="item-img" data-label="Sản phẩm">
                  <a href="./product.php?id=<?= $value['id'] ?>" class="cart__image">

                    <img src="./assets/images/products/<?php echo $value['image'] ?>">
                  </a>
                </td>
                <td class="item-content-text">
                  <a href="./product.php?id=<?= $value['id'] ?>" class="item-text">
                    <?php echo $value['name'] ?>
                  </a>

                  
                  <div class="cart__remove">
                    <small><?php echo $value['size'] ?>cm</small><br>
                    <a class="btn-text" onclick="return confirm('Bạn chắc chắn muốn xóa?')" style="color:red;" href="view_cart.php?id=<?php echo $value['id'] ?>&action=delete">
                      Xoá
                    </a>
                  </div>
                </td>
                <td class="item-content-price" data-label="Đơn giá">
                  <span class="item-price">
                    <?php echo number_format( $value['price']) ?>&#8363
                  </span>
                </td>
                <td class="item-amount" data-label="Số lượng">
                  <div class="product-quantitys">
                  <div class="buttons_added">
                    <a class="minus is-form" href="update_quantity_in_cart.php?id=<?= $key ?>&type=decre">
                        -
                    </a>
                   <a  class="input-qty"  ><?php echo  $value['quantity']  ?> </a>
                    <a class="plus is-form" href="update_quantity_in_cart.php?id=<?= $key ?>&type=incre">
                        +
                    </a>
                    </div>
                  </div>
                </td>
                <td class="item-total-price" data-label="Tổng giá">

                  <span class="item-price">
                    <?php echo number_format($value['price'] * $value['quantity']) ?>&#8363
                  </span>

                </td>
              </tr>
            <?php endforeach ?>



          </tbody>
        </table>



        <div class="row-total">
          <div class="cart-price-right">
            <p>
              <span class="cartt__subtotal-title">Tổng tiền</span>
              <span class="cartt__subtotal"><?php echo number_format(total_price($cart)) ?>&#8363</span>
            </p>

              <a class="btn-payment-text" href="./confirminfo.php">
                Đặt hàng
              </a>

          </div>
        </div>
      </form>
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


                  <li><a href="">Chính sách và quy định chung</a></li>

                  <li><a href="">Chính sách giao dịch, thanh toán</a></li>

                  <li><a href="">Chính sách đổi trả</a></li>

                  <li><a href="">Chính sách bảo mật</a></li>

                  <li><a href="">Chính sách vận chuyển</a></li>

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
                Copyrights © 2018 by <a target="_blank" href="">GN Bakery</a>.
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
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="js/app.js"></script>
  <script src="js/product.js"></script>

</body>

</html>