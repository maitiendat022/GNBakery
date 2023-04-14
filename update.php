<?php
  session_start();
  if(empty($_SESSION['id'])){
    header("location:signin.php");
  }
  
  $id = $_SESSION['id'];
  require './database/connect.php';
  $sql = "SELECT * FROM users WHERE (id = '$id')" ;
  $result = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="img/logo.png">
    <title>UPDATE-GNBAKERY</title>
    <link rel="stylesheet" href="css/update.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link
	rel="stylesheet"
	type="text/css"
	href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
  />
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>
<body>
<?php require './header.php'; ?>
    <form action="process-update.php" method = "post">
        <div class="page_container">
                <div class="main_content">
                        
                            <h2 style ="margin-bottom:20px;">Thông tin</h2>
                            
                            <input type="text" name="id" style="display:none;" value = "<?php echo $row['id']?>">
                            <title>Form đổi mật khẩu</title>
                            <button  style="margin-left: auto;padding:5px;border:1px solid #adb5bd;" type ="button"onclick="showPasswordForm()">Đổi mật khẩu</button><br>
                            
                            <div class="form_name">
                                <label for="">Email</label>
                                <input type="text" name = "email" class="form-control" placeholder = "Nhập họ tên" value ="<?php echo $row['email'] ?>" readonly>
                              </div>
                            <div class="form_name">
                                <label for="">Họ và tên</label>
                                <input type="text" name = "name" class="form-control" placeholder = "Nhập họ tên" value ="<?php echo $row['name']?>" required>
                              </div>
                            <div class="form_address">
                                <label for="">Địa chỉ</label>
                                <input type="" name = "address" class="form-control" placeholder="Thêm địa chỉ" value = "<?php echo$row['address'] ?? ''?>">
                              </div>
                            <div class="form_phone">
                                  <label for="">Số điện thoại</label>
                                <input type="" name = "phone" class="form-control" placeholder="Thêm số điện thoại" value = "<?php echo$row['phone'] ?? ''?>">
                              </div>                                                                                   
                            <div class="btnup">
                                <button class="btnUpdate" name="btnUpdate" type="submit">Cập nhật</button>
                                <a class="btnUpdatet" style="color:#FF1493; text-decoration:none; padding-left: 35px; padding-top: 7px;" href="user.php">Quay lại</a>
                            </div>
                </div>
        </div>
    </form>
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
                  <i class="fa fa-mobile" aria-hidden="true"></i> <a style=" text-decoration: none; color: white; font-weight: bolder;"
                    href="tel:0333135698">0333135698</a>
                </div>
                <div class="ft-contact-email">
                  <i class="fa fa-envelope" aria-hidden="true"></i> <a style="text-decoration: none; color: white;font-weight: bolder;"
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
                Copyrights © 2018 by <a style="text-decoration:none;" target="_blank" href="">GN Bakery</a>.
              </div>
            </div>
          </div>
        </div>
      </div></div>

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
  <script>
    $('document').ready( function() {
      $.notify("<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>", "success");
    } );
  </script>
  <script src="js/app.js"></script>
  <script>
		function showPasswordForm() {
			document.getElementById("overlay").style.display = "block";
			document.getElementById("password-form").style.display = "block";
		}

		function hidePasswordForm() {
			document.getElementById("overlay").style.display = "none";
			document.getElementById("password-form").style.display = "none";
		}
	</script>
</body>
	<div id="overlay" class="overlay" <?php if(isset( $_GET['error'])){
                                              echo 'style = "display: block;"';
                                          }else{
                                            echo 'style = "display: none;"';
                                          }?>onclick="hidePasswordForm()"></div>
	<div <?php if(isset( $_GET['error'])){
                                              echo 'style = "display: block;"';
                                          }else{
                                            echo 'style = "display: none;"';
                                          }
                                          ?>id="password-form" class="form-container">
		<div>
      <h3 style="margin-bottom:50px;margin-left:115px;color:#FF1493;">Đổi mật khẩu</h3> 
      <span style="padding:10px;color:red;font-size:35px;" class="close-button" onclick="hidePasswordForm()">&times;</span>
    </div>
		<form action="change_password.php" method="post">
      <small style = "color:red;"><?php echo $_GET['error'] ?? ''?></small>
			<div style="display: flex; align-items: center;margin-top:20px">
        <label for="old-password">Mật khẩu cũ:</label>
			  <input style="margin-left: auto;" type="password" id="old-password" name="old-password">
      </div>
      <div  style="display: flex;align-items: center; margin-top:20px">
			  <label for="new-password">Mật khẩu mới:</label>
			  <input style="margin-left: auto;" type="password" id="new-password" name="new-password"><br>
      </div>
			<div  style="display: flex;align-items: center;margin-top:20px;margin-bottom:20px;">
        <label style="margin-right: 10px;" for="confirm-password">Xác nhận mật khẩu mới:</label>
			  <input style="margin-left: auto;" type="password" id="confirm-password" name="confirm-password"><br>
      </div>
			<div style="display: flex;">
        <button style="margin-left: auto;padding:8px;" type="submit" >Xác nhận</button>
      </div>
		</form>
	</div>
</html>