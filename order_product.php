<?php 
require './database/connect.php';
session_start();
if(empty($_SESSION['id'])){
  header("location:signin.php");
}
$status = $_GET['status'];
$idCus = $_SESSION['id'];
$idOrder = $_GET['order_id'];
$sqlTtin = "SELECT id, name_receiver, address_receiver, phone_receiver, DATE_FORMAT(created_at, '%d/%m/%Y %T') as created_at, DATE_FORMAT(time_status, '%d/%m/%Y %T') as time_status, status, total_price FROM orders WHERE id = $idOrder and user_id = $idCus";
$resultTtin = mysqli_query($connect,$sqlTtin);
$rowTtin = mysqli_fetch_assoc($resultTtin);

$sqlBanh = "SELECT * FROM products,order_product WHERE order_id = $idOrder and order_product.product_id = products.id";
$resultBanh = mysqli_query($connect,$sqlBanh);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width">
  <title>DON HANG - GNBAKERY BANH NGOT HUONG VI PHAP</title>
  <link rel="shortcut icon" type="image" href="img/logo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/order.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
<?php require './header.php'; ?>
        <div class="order-product">
        <h2>Thông tin đơn hàng</h2>
            <div class="order-product-content">
               
                 <div class="order-left">
                    <h1>Mã đơn hàng: GN<?php echo $rowTtin['id']  ?>BKR</h1>
                    <p class="mt-3">Tên người nhận: <?php echo $rowTtin['name_receiver']  ?></p>
                    <p>Thời gian đặt hàng: <?php echo $rowTtin['created_at']  ?></p>
                    <p>Số điện thoại: <?php echo $rowTtin['phone_receiver']  ?></p>
                    <p>Địa chỉ giao hàng: <?php echo $rowTtin['address_receiver']  ?></p>
                    <h1>Thông tin sản phẩm:</h1>
                 </div>
                  <div class="order-right">
                    <p class="order-text" >Trạng thái: <?php 
                                            $time_status = $rowTtin['time_status'];
                                          switch ($status) {
                                            case 0:
                                                echo "Đơn hàng chưa được duyệt";
                                                break;
                                            case 1:
                                                echo "Người gửi đang giao hàng";
                                                break;
                                            case 2:
                                                echo "Đơn hàng đã bị huỷ";
                                                break;
                                            case 3:
                                                echo "Bạn đã nhận hàng lúc $time_status";
                                                  break;
                                        }
                                        ?> </p> 
                 </div>
             </div>

             <table class="cart-table full ">
          <thead class="cart__row">

            <tr class="spaceUnder">
              <th class="item-img" >Ảnh </th>
              <th class="item-content-text">Chi tiết sản phẩm</th>
              <th class="item-content-price">Đơn giá</th>
              <th class="item-amount">Số lượng</th>
              <th class="item-total-price">Thành tiền</th>
            </tr>
          </thead>
          <tbody>

            <?php 
              if(mysqli_num_rows($resultBanh) > 0){
                while($rowBanh = mysqli_fetch_assoc($resultBanh)){
            ?>
              <tr class="spaceUnder">

                <td class="item-img" data-label="Sản phẩm">
                  <a href="./product.php?id=<?= $rowBanh['id'] ?>&id_order=<?=$idOrder?>&id_user=<?=$idCus?>&status_order=<?=$status?>" class="cart__image">
                    <img src="./assets/images/products/<?php echo $rowBanh['image'] ?>">
                  </a>
                </td>
                <td class="item-contentt-text">
                 <a class="item-txt"> <?php echo $rowBanh['name'] ?></a>
                <br>
                  <div class="cart__remove">
                    <small>Kích thước: <?php echo $rowBanh['size'] ?> cm</small><br>
                  </div>
                </td>
                <td class="item-contentt-price" data-label="Đơn giá">
                  <span class="item-price">
                  <?= number_format($rowBanh['price'], 0, '.', ' ') ?>&#8363
                  </span>
                </td>
                <td class="item-amountt" data-label="Số lượng">
                  <div class="product-quantitys">     
                    <?php echo  $rowBanh['quantity'] ?>   
                  </div>
                </td>
                <td class="item-totall-price" data-label="Tổng giá">

                  <span  class="item-price">
                    <?php echo number_format($rowBanh['price'] * $rowBanh['quantity']) ?>&#8363
                  </span>

                </td>
              </tr>
            <?php
                }
              }                   
            ?>



          </tbody>
        </table>   

                <div class="row-total">
					<div class="cart-price-right">
						<p>
							<span class="cart__subtotal-title">Tổng tiền:</span>
							<span class="cart__subtotal"><?= number_format($rowTtin['total_price'], 0, '.', ' ') ?>&#8363</span>
						</p>
			
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

                  <form accept-charset="UTF-8" action="/account/contact" class="contact-form" method="post"
                    name="myForm" onsubmit="validateForm()">
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
              <div id="owl-home-main-banners-slider-ft" class="owl-carousel owl-theme"
                style="opacity: 1; display: block;">

                <div class="owl-wrapper-outer">
                  <div class="owl-wrapper"
                    style="width: 424px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
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
<script src="js/app.js"></script>
  <script src="js/product.js"></script>
</body>
</html>