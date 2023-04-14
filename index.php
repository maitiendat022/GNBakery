<?php

  session_start();
  require './database/connect.php';

  $where = 1;
  if(isset($_GET['category'])) {
    $category = $_GET['category'];
    $where = "category_detail_id = '$category'";
  }

  $search = '';
  if(isset($_POST['search'])) {
      $search = htmlspecialchars($_POST['search'], ENT_QUOTES);
      $where = "products.name like '%$search%'";
  }
  $sql = "SELECT size FROM your_table_name WHERE product_id LIMIT 1";

  $sql = "SELECT products.*, category_detail.name as category_name, products_size.price, products_size.size
  FROM products
  INNER JOIN (
    SELECT product_id, MIN(price) as price
    FROM products_size
    GROUP BY product_id
  ) as min_price ON products.id = min_price.product_id
  INNER JOIN products_size ON products.id = products_size.product_id AND min_price.price = products_size.price
  INNER JOIN category_detail ON category_detail.id = products.category_detail_id
  WHERE $where and products.status = 1
  ORDER BY category_detail.id ASC, products.id DESC";

  $result = mysqli_query($connect, $sql);
  
  if(mysqli_num_rows($result) == 0) {
    $error = 'Không có sản phẩm nào';
  }
  else {
    $category_name = mysqli_fetch_array($result)['category_name'];
  }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width">
  <title>GNBAKERY - BANH NGOT HUONG VI PHAP</title>
  <link rel="shortcut icon" type="image" href="img/logo.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/slick-style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>

<body>
  <?php require './header.php'; ?>
  <!-- image slider start -->
  <div class="slideshow-container">

    <div class="mySlides">
      <div class="numbertext"></div>
      <img src="img/banner1.jpg" style="width:100%">

    </div>

    <div class="mySlides">
      <div class="numbertext"></div>
      <img src="img/banner2.jpg" style="width:100%">

    </div>

    <div class="mySlides">
      <div class="numbertext"></div>
      <img src="img/banner3.jpg" style="width:100%">

    </div>

    <div class="mySlides">
      <div class="numbertext"></div>
      <img src="img/banner4.jpg" style="width:100%">

    </div>

  </div>
  <br>

  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>

  <!-- product -->
  <div id="intro">
    <div class="headline">
      <h3><?= $category_name ?? $error ?></h3>

    </div>
    <ul class="products">
      <?php foreach($result as $each) { ?>
        <li>
          <div class="product-item">
            <div class="product-top">
              <a href="./product.php?id=<?= $each['id'] ?>" class="product-thumb">
                <img  src="./assets/images/products/<?= $each['image'] ?>" alt="">

              </a>
            </div>
            <div class="product-info">
              <a href="./product.php?id=<?= $each['id'] ?>" class="product-cat"><?= $each['name'] ?></a>
              <p class="product-name">GN<?= $each['id'] ?></p>
              <div class="product-price-action">
                <p class="product-price"><?= number_format($each['price'], 0, '.', ',') ?></p>
                <div class="product-action">
              <form action="view_cart.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $each['id'] ?>" >
                <input type="hidden" name="size-btn" id="save-size" value="<?=$each['size']?>" >
                <button   type="submit" name="addcart" class="btn-action"><i class="bi bi-cart-fill"></i></button>
              </form>
                </div>
              </div>
            </div>
          </div>
        </li>
      <?php } ?>
      <!-- <li>
        <div class="product-item">
          <div class="product-top">
            <a href="product.html" class="product-thumb">
              <img src="img/pic2.jpg" alt="">

    <div class="btn-contentmore">
      <a href="" class="btn-more">Xem Them</a>
    </div> -->
  </div>

  <!-- new/notice -->
  <!-- <div id="Home-notice">
    <div class="latest-wrap">
      <div class="title-notice">
        <h3>TIN TỨC</h3>
        <h2>NỔI BẬT NHẤT TRONG TUẦN</h2>
      </div>
      <div id="notice-collection">
        <div class="row">

          <div class="card">
            <img src="img/new1.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                THÔNG BÁO LỊCH NGHỈ TẾT NGUYÊN ĐÁN 2022
              </h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                THÔNG BÁO LỊCH NGHỈ TẾT NGUYÊN ĐÁN 2022 Thân gửi Quý Khách
                Hàng! GN Bakery xin thông báo lịch nghỉ tết nguyên đán Nhâm
                Dần 2022 các cơ sở như sau: Thời gian nghỉ: - Shop ...
              </p>
            </div>
          </div>


          <div class="card">
            <img src="img/new2.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                TỔNG HỢP NHỮNG CHIẾC BÁNH BẠN NHẤT ĐỊNH...
              </h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                Ngoài việc nổi bật về những chiếc bánh kem tươi, bơ hay
                mousse, thì tại #Anh_Hòa những chiếc bánh nhỏ xinh kia cũng
                đã đánh gục, níu chân biết bao nhiêu thực khánh bởi:Đa dạng
                n...
              </p>
            </div>
          </div>


          <div class="card">
            <img src="img/new4.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                CÁCH CHỌN QUÀ TẾT Ý NGHĨA CHO GIA ĐÌNH
              </h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                heo phong tục của người Việt Nam ta, cứ mỗi độ Xuân về thì
                quà Tết là thứ không thể thiếu. Tuy nhiên, để lựa chọn và
                mua được những món hộp quà Tết ý nghĩa quả thật không dễ
                dàn...
              </p>
            </div>
          </div>


          <div class="card">
            <img src="img/new3.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Quà Tết Sang - Cho Năm Mới Vẹn...</h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                Tết đến, Xuân sang ai cũng mong muốn tìm cho mình một món
                quà tết không chỉ sang trọng mà còn thật ý nghĩa, bởi quà
                Tết thể hiện sự biết ơn và trân trọng đến ông bà, cha mẹ và
                n...
              </p>
            </div>
          </div>



          <div class="card">
            <img src="img/new5.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                MERRY CHRISTMAS 2021 Bánh Kem Ngon...
              </h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                Tháng 12 đến ai ai cũng nghĩ đến ngày lễ Giáng Sinh , ông
                già noel, cây thông hay những hộp quà nhỏ xinh.Ngoài ý nghĩa
                theo đạo Thiên Chúa, Noel là một ngày lễ gia đình, một
                ngà...
              </p>
            </div>
          </div>

          <div class="card">
            <img src="img/new6.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                TRI ÂN NGÀY NHÀ GIÁO VIỆT NAM 20/11
              </h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                TRI ÂN NGÀY NHÀ GIÁO VIỆT NAM 20/11, Tháng 11 - tháng tri ân
                ngày Nhà giáo Việt Nam 20/11 - đây không chỉ là ngày để các
                bạn bày tỏ lòng biết ơn công lao dạy dỗ của thầy cô mà đ...
              </p>
            </div>
          </div>



          <div class="card">
            <img src="img/new7.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                𝑻𝒉𝒂𝒚 𝒍𝒐̛̀𝒊 𝒎𝒖𝒐̂́𝒏 𝒏𝒐́𝒊 - 𝑻𝒓𝒊 𝒂̂𝒏 𝒏𝒖̛̉𝒂 𝒌𝒊𝒂 𝒕𝒉𝒆̂́ 𝒈𝒊𝒐̛́𝒊 💟 𝑴𝒖̛̀𝒏𝒈
                𝒏𝒈𝒂̀𝒚 𝒑𝒉𝒖̣
                𝒏𝒖̛̃ 𝑽𝒊𝒆̣̂𝒕 𝑵𝒂𝒎 𝟮𝟬/𝟭𝟬 💟
              </h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                Ngày 20/10 là ngày dành riêng cho các chị em phụ nữ Việt
                Nam. Chọn một món quà tinh tế cho bà, mẹ, vợ hay bạn gái,…
                vào ngày này sẽ khiến họ cảm thấy hạnh phúc và vui mừng vì
                sự...
              </p>
            </div>
          </div>


          <div class="card">
            <img src="img/new8.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Ý Nghĩa Tết Trung Thu Ở Việt Nam</h5>
              <div class="article">
                <div class="article-messeage">
                  <p><i class="bi bi-chat-dots"></i>0 bình luận</p>
                </div>
                <div class="acticle-author">
                  <p><i class="bi bi-person"></i>Phan Thị Nga</p>
                </div>
              </div>
              <p class="card-text">
                Sự tích Tết Trung ThuTết Trung Thu thường diễn ra theo âm
                lịch là ngày rằm tháng 8 hằng năm. Tục vui Tết Trung-Thu đã
                có từ thời Đường Minh Hoàng bên Trung-Hoa, vào đầu thế kỷ
                t...
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <section class="about-introduce clearfix">
    <div class="title-text">
      <h3>VỀ CHÚNG TÔI</h3>
      <h2>chào mừng bạn đến GN Bakery</h2>
    </div>
    <div class="introduce-content">
      <div class="image">
        <img class="title-img" src="img/me.png" style="width: 100%; height: 100%;" alt="ABOUT US">
      </div>
      <div class="detail">
        <p class="info-text">
          Các sản phẩm GNBakery được làm từ các nguyên liệu nhập khẩu của các nước có truyền thống làm bánh như:
          Newzeland, Mỹ, Pháp, Bỉ. Với hương vị thơm ngon đặc trưng của các loại kem, bơ, sữa, phô mai, hạt hạnh nhân,
          chocolate... dưới bàn tay khéo léo của những người thợ làm bánh giàu kinh nghiệm.


          Quy mô xưởng sản xuất rộng hơn 2000m2 với các thiết bị tiên tiến hiện đại theo tiêu chuẩn ISO 2018, toàn bộ
          nhà máy được sơn phủ bởi sơn EPOXY đặc biệt. Anh Hòa Bakery luôn mang đến cho khách hàng những sản phẩm chất
          lượng nhất, đảm bảo tuyệt đối về an toàn vệ sinh thực phẩm.
        </p>
      </div>

 

    </div>
  </section>

  <!--footer-->
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
                  <i class="fa fa-home" aria-hidden="true"></i> 10 xx TP. Hà Nội
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
 

  <script src="js/app.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="./assets/js/notify.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $('document').ready( function() {
    $("#search").autocomplete({
      source: "search.php"
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $("<li class='sub-search-item'>")
        .append(`<a href='./product.php?id=${item.value}' class='sub-search-link'>
                  <img class='sub-search-link__img' src='./assets/images/products/${item.image}' alt=''>
                  <h5 class='sub-search-link__name'>
                    ${item.label}
                  </h5>
                  <span class='sub-search-link__price'>
                  ${item.price}&#8363
                  </span>
                </a>`
                )
        .appendTo(ul);
    };

    $.notify("<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>", "success");
  } );
  </script>


</body>

</html>
