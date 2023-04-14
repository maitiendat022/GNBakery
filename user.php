<?php
  session_start();
  if(empty($_SESSION['id'])){
    header("location:signin.php");
  }
  require 'database/connect.php';

  $id = $_SESSION['id'];
  $sql = "select * from users where id = '$id'";
  $resultUser = mysqli_query($connect,$sql);
  $eachUser = mysqli_fetch_array($resultUser);

  $sqlOrder = "select id, name_receiver, address_receiver, phone_receiver, DATE_FORMAT(created_at, '%d/%m/%Y %T') as created_at, status,id_status, total_price from orders where user_id = '$id'";
  $resultOrder = mysqli_query($connect,$sqlOrder);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width">
  <title>TÀI KHOẢN - GNBAKERY BANH NGOT HUONG VI PHAP</title>
  <link rel="shortcut icon" type="image" href="img/logo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/user.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>

<body>

<?php require './header.php'; ?>
 <section id="page-content">
   <div class="content-header">
     <h1 >Tài Khoản Của Bạn</h1>
     
   </div>

   <div class="content-grid">
     <div class="content-grid-left"style = "width:70%;">
        <h2 class="h4">Lịch Sử Giao Dịch</h2>
        <p <?php
            if(mysqli_num_rows($resultOrder)<1){
              echo 'style = "display:block;"';
            }else{
              echo 'style = "display:none;"';
            }
          ?>
          >Bạn chưa có lịch sử giao dịch nào</p>
        <table class="table table-borderless" <?php
                if(mysqli_num_rows($resultOrder)<1){
                  echo 'style = "display:none;"';
                }else{
                  echo 'style = "display:table;"';
                }
              ?>>
          <thead class="table-shopping">
            <tr >
              <th scope="col" class="order-shopping">Đơn hàng</th>
              <th scope="col" class="time-shopping">Thời gian đặt</th>
              <th scope="col" class="total-shopping">Tổng tiền</th>
              <th scope="col" class="stt-shopping">Trạng thái</th>
              <th scope="col" class="sttt-shopping" >Chi tiết</th>
              <th scope="col" class="sttt-shopping" >Quản lý</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(mysqli_num_rows($resultOrder) > 0){
                while($rowOrder = mysqli_fetch_assoc($resultOrder)){
            ?>
            <tr >
              <td  class="order-shopping">GN<?php echo $rowOrder['id'] ?>BKR</th>
              <td class="time-shopping" ><?php 
                      echo ($rowOrder['created_at']);
                    ?></td>
              <td class="total-shopping"><?= number_format($rowOrder['total_price'], 0, '.', ' ') ?>&#8363</td>
              <td class="stt-shopping" ><?php switch ($rowOrder['status']) {
                                            case 0:
                                                echo "Mới đặt";
                                                break;
                                            case 1:
                                                echo "Đã duyệt";
                                                break;
                                            case 2:
                                                echo "Đã huỷ";
                                                break;
                                            case 3:
                                                  echo "Đã giao";
                                                  break;
                                        }
                                        ?></td>
   
              <td style = "padding-left:20px;"class="sttt-shopping"><a class="detail-txt" href="order_product.php?order_id=<?php echo $rowOrder['id'] ?>&status=<?= $rowOrder['status'] ?>"><i class="fa-regular fa-eye"></i></a></td>
              <?php if($rowOrder['status']==0){?>
                <td class="sttt-shopping"><a class="detail-txt"onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')" href="update_status_oder.php?order_id=<?php echo $rowOrder['id'] ?>&status=2">Hủy đơn</a></td>
              <?php }if($rowOrder['status']==1){?>
                <td class="sttt-shopping"><a class="detail-txt"onclick="return confirm('Bạn chắc chắn xác nhận đã nhận hàng?')" href="update_status_oder.php?order_id=<?php echo $rowOrder['id'] ?>&status=3">Nhận hàng</a></td>
              <?php }if($rowOrder['status']==3){?>
                <td>Đã nhận hàng</td>
              <?php }if($rowOrder['status']==2){
                        $user_id = $rowOrder['id_status'];
                        $sql = "SELECT level FROM users WHERE id = $user_id";
                        $result = mysqli_query($connect, $sql);
                        $each = mysqli_fetch_array($result);
                        if($each['level']==0){?>
                          <td>Bạn đã hủy đơn</td>
                  <?php }else{ ?>
                          <td>Đơn hàng đã bị hủy</td>
                      <?php }
                    }?>
            </tr>
            <?php
                }
              }                   
            ?>
          </tbody>
        </table>
     </div>
     <div class="content-grid-right">
       <h4 class="h4">Thông Tin Tài Khoản</h4>
       <h3 class="h4">Họ và tên: <?= $eachUser['name'] ?? ''?></h3>
       <p>
        <br>
        Số điện thoại: <?= $eachUser['phone'] ?? '' ?>
        <br>
        Địa chỉ: <?= $eachUser['address'] ?? '' ?>

       </p>
       <p class="text-address"><a href="update.php">Sửa thông tin</a></p>
     </div>

   </div>
 </section>
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

    
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="./assets/js/notify.min.js"></script>
  <script src="js/app.js"></script>
  <script>
  $('document').ready( function() {
    $.notify("<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>", "success");
  } );
  </script>
</body>

</html>