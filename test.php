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
          <div class="form_phone">
            <label for="">Quận/Huyện:</label>
            <select class="form-control" id="district" name="district" required>
              <option value="">-- Chọn quận/huyện --</option>
              <option value="Ba Đình">Ba Đình</option>
              <option value="Hoàn Kiếm">Hoàn Kiếm</option>
              <option value="Cầu Giấy">Cầu Giấy</option>
            </select>
          </div>
          <div class="form_phone">
            <label for="">Phường/Xã:</label>
            <select class="form-control" id="ward" name="ward" required>
              <option value="">-- Chọn phường/xã --</option>
            <!-- Danh sách các phường/xã thuộc các quận/huyện đã chọn sẽ được thêm bằng JavaScript -->
            </select>
          </div>
          <div class="form_phone">
            <label for="street">Đường:</label>
            <input class="form-control" id="street" name="street" type="text" required>
          </div>

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
  <script>
  const wardData = {
    'Ba Đình': [
      { name: 'Ngọc Hà', value: 'ngochaba' },
      { name: 'Điện Biên', value: 'dienbien' },
      { name: 'Kim Mã', value: 'kimma' },
      <!-- Danh sách các phường/xã thuộc Ba Đình -->
    ],
    'Hoàn Kiếm': [
      { name: 'Phúc Tân', value: 'phuctan' },
      { name: 'Hàng Mã', value: 'hangma' },
      { name: 'Hàng Buồm', value: 'hangbuom' },
      <!-- Danh sách các phường/xã thuộc Hoàn Kiếm -->
    ],
    'Cầu Giấy': [
      { name: 'Nghĩa Đô', value: 'nghiado' },
      { name: 'Quan Hoa', value: 'quanhoa' },
      { name: 'Dịch Vọng', value: 'dichvong' },
      <!-- Danh sách các phường/xã thuộc Cầu Giấy -->
    ]
    <!-- Thêm danh sách các phường/xã của các quận/huyện khác của Hà Nội nếu cần -->
  };

  const districtSelect = document.getElementById('district');
  const wardSelect = document.getElementById('ward');
  const streetInput = document.getElementById('street');

  districtSelect.addEventListener('change', () => {
    const selectedDistrict = districtSelect.value;
    wardSelect.innerHTML = '<option value="">-- Chọn phường/xã --</option>';
    if (selectedDistrict) {
      const wards = wardData[selectedDistrict];
      wards.forEach((ward) => {
        const option = document.createElement('option');
        option.value = ward.value;
        option.textContent = ward.name;
        wardSelect.appendChild(option);
      });
      wardSelect.disabled = false;
    } else {
      wardSelect.disabled = true;
    }
    streetInput.value = '';
  });
</script>




</body>

</html>