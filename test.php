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
          
  <label for="name">Họ tên:</label>
  <input type="text" id="name" name="name"><br>

  <label for="phone">Số điện thoại:</label>
  <input type="text" id="phone" name="phone"><br>

  <label for="email">Email:</label>
  <input type="text" id="email" name="email"><br>

  <label for="address">Địa chỉ:</label><br>

  <label for="province">Tỉnh/Thành phố:</label>
  <input type="text" id="province" name="province" value="Hà Nội" readonly><br>

  <label for="district">Quận/Huyện:</label>
  <select id="district" name="district">
    <option value="">--Chọn Quận/Huyện--</option>
    <option value="Ba Đình">Ba Đình</option>
    <option value="Hoàn Kiếm">Hoàn Kiếm</option>
    <option value="Hai Bà Trưng">Hai Bà Trưng</option>
    <option value="Đống Đa">Đống Đa</option>
    <option value="Tây Hồ">Tây Hồ</option>
    <!-- Danh sách các quận/huyện khác trong nội thành Hà Nội -->
  </select><br>

  <label for="ward">Phường/Xã:</label>
  <select id="ward" name="ward">
    <option value="">--Chọn Phường/Xã--</option>
    <!-- Danh sách các phường/xã trong quận/huyện đã chọn -->
  </select><br>

  <label for="street">Đường/Phố:</label>
  <input type="text" id="street" name="street"><br>

  <button type="submit">Đặt hàng</button>
</form>
          <div class="btnup">
            <a class="btnReturn" href="./cart.php">Quay lại</a>
            <button class="btnConfirm">Xác nhận</button>
          </div>
          
        </div>
      </div>
    </form>

  </div>
  
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


<!-- Đoạn mã JavaScript để hiển thị danh sách phường/xã theo quận/huyện -->
<script>
  $(document).ready(function() {
    // Lấy danh sách các quận/huyện từ một nguồn dữ liệu nào đó
    var districts = [
      { name: "Ba Đình", wards: ["Phúc Xá", "Ngọc Hà", "Điện Biên", "Vĩnh Phúc", "Cống Vị"] },
      { name: "Hoàn Kiếm", wards: ["Tràng Tiền", "Trần Hưng Đạo", "Hàng Bài", "Phan Chu Trinh"] },
      { name: "Hai Bà Trưng", wards: ["Phố Huế", "Đống Mác", "Bạch Đằng", "Bách Khoa", "Trương Định"] },
      { name: "Đống Đa", wards: ["Cát Linh", "Văn Miếu", "Láng Hạ", "Khâm Thiên", "Thái Hà"] },
      { name: "Tây Hồ", wards: ["Quảng An", "Xuân La", "Tứ Liên", "Bưởi", "Nhật Tân"] }
      // Danh sách các quận/huyện khác
    ];

    // Lấy các trường select quận/huyện và phường/xã
    var districtSelect = $('#district');
    var wardSelect = $('#ward');

    // Khi người dùng chọn quận/huyện
    districtSelect.change(function() {
      // Xóa danh sách phường/xã cũ
      wardSelect.empty();
      // Lấy danh sách phường/xã theo quận/huyện đã chọn
      var selectedDistrict = districtSelect.val();
      var selectedWards = districts.find(function(district) {
        return district.name === selectedDistrict;
      }).wards;
      // Thêm danh sách phường/xã vào trường select phường/xã
      $.each(selectedWards, function(index, ward) {
        wardSelect.append($('<option></option>').attr('value', ward).text(ward));
      });
    });
  });
</script>



</body>

</html>