<?php 
    require_once '../check_admin_signin.php';
    $page = 'products';
    
    if(empty($_GET['id'])) {
        $_SESSION['error'] = 'Phải chọn để sửa!';
        header('location:index.php');
        exit();
    }

    $id = $_GET['id'];
    
    require_once '../../database/connect.php';
    
    $sql = "select products.*, categories.id as category_id from products
    join category_detail
    on category_detail.id = products.category_detail_id
    join categories
    on categories.id = category_detail.category_id
    where products.id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    
    $sql = "select * from categories";
    $categories = mysqli_query($connect, $sql);

    $sql = "select * from category_detail where category_id = '$each[category_id]'";
    $category_detail = mysqli_query($connect, $sql);
    
    $sql = "SELECT size,price FROM products_size WHERE product_id = $id ";
    $result = mysqli_query($connect, $sql);
    $prices = array();
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    // Thêm kích thước và giá tương ứng vào mảng hai chiều
            $prices[] = array($row['size'], $row['price']);
        }
    }

    require_once '../navbar-vertical.php';
?>
    <div class="main__form">
        <div class="main-container-text d-flex align-items-center">
            <a class="header__name text-decoration-none" href="#">
                Sửa sản phẩm
            </a>
        </div>
        <div class="container-fluid px-4">
            <?php include '../error_success.php' ?>
          
            <div class="row gx-5"style = "padding-right:500px;padding-left:50px;">
                <div class="col-12">

                     <form action="process_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $each['id'] ?>">

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Mã sản phẩm</label>
                            <input type="text" readonly value="SPGN<?= $each['id'] ?>" id="name" class="form__input form-control" autocomplete="off"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" name="name" value="<?= $each['name'] ?>" id="name" class="form__input form-control" autocomplete="off"/>
                        </div>

                        <div class="mb-4 fs-4">
                        <label class="form-label fs-4" for="image" role="button">
                            Ảnh bánh
                            <img id="product__img" class="ms-4" src="../../assets/images/products/<?= $each['image'] ?>" alt="Ảnh bánh" width="200" height="200"/>
                        </label>
                            <input type="hidden" name="image_old" value="<?= $each['image'] ?>" />
                            <input type="file" hidden name="image_new" id="image" accept=".jpg, .png" class="form__input form-control"/>
                        </div>
                        <div class="mb-4 fs-4">
                            
                            <label class="form-label">Loại bánh</label>
                            <select class="form__select form-select" id="category">
                                <?php foreach ($categories as $category) { ?>
                                    <option 
                                        <?php if($each['category_id'] == $category['id']) { ?>
                                            selected 
                                        <?php    } ?>
                                        value="<?= $category['name'] ?>"
                                    >
                                        <?= $category['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                                         
                            <select class="form__select form-select mt-4" name="category" id="category_detail">
                                <?php foreach ($category_detail as $category_child) { ?>
                                    <option 
                                        <?php if($each['category_detail_id'] == $category_child['id']) { ?>
                                            selected
                                        <?php    } ?>
                                        value="<?= $category_child['id'] ?>"
                                        class="category_detail"
                                    >
                                        <?= $category_child['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4 fs-4" id = "sizes" >
                            <label class="form-label" for="image">Kích thước(cm) / Giá(vnđ)</label>
                            <a class="form-label"   type="button" id= "themdiv" style= "color:#FF1493;padding:3px;">Thêm</a>
                            <div id = "container">
                                <?php
                                $stt = 0; 
                                foreach($prices as $price) {
                                $size = $price[0];
                                $price = $price[1];
                                ?>
                                <div style = "display:flex;padding:5px;">
                                    <input type="number" name="size[]" class="form__input form-control" value="<?php echo "$size"?>" style = "width:60px;"/><Span style="padding:10px;">cm/</Span>
                                    <input type="number" name="price[]" class="form__input form-control" value="<?php echo"$price" ?>" style = "width:180px;"/> <Span style="padding:10px;">đ</Span>
                                    
                                </div>
                                <?php }?>
                            </div>
                            <a id="delete-btn" class="form-label"   type="button" id= "themdiv" style= "color:#FF1493;padding:3px;">Xóa</a>
                        </div>
                        <div class="mb-4 fs-4">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" rows="6" class="form__input form-control"><?= $each['description'] ?></textarea>
                        </div>

                        <button type="submit" class="form__btn btn mt-4 mb-4">Sửa</button>
                        <a style = "border: 1px solid #FF1493;text-decoration:none;border-radius: 5px;padding:8px;font-size:1.5rem;" href="index.php">Trở lại</a>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
   
</div>
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#category').change(function() {
            let category_id = $(this).val();
            $.ajax({
                url: './get_category_detail.php',
                type: 'POST',
                dataType: 'json',
                data: {category_id}
            })

            .done(function(res) {
                const arrId = Object.keys(res);
                const arrName = Object.values(res);

                $(".category_detail").remove();
                $('#category_detail').append('<option value="" selected disabled hidden>Chọn</option>');
                for (let i = 0; i < arrId.length; i++) {
                    $('#category_detail').append(`
                        <option class="category_detail" value="${arrId[i]}">${arrName[i]}</option>
                    `);
                }
            })
         
        });
        $('#image').change(function(e) {
            $('#product__img').attr('src', URL.createObjectURL(e.target.files[0]));
        });

        $('.btn-menu').click(function() {
            $('.navbar-vertical-mobile').toggle("fast");
            $('.header__navbar-overlay').toggle("fast");
        });
    });
</script>
<script>
// Lấy đối tượng button "Thêm div"
// Lấy đối tượng button "Thêm div"
var btnAdd = document.getElementById("themdiv");

// Lấy đối tượng container
var container = document.getElementById("container");
var deleteBtn = document.getElementById('delete-btn');

// Tạo một mảng để lưu trữ các div đã có
var divs = Array.from(container.children);

// Đặt biến index ban đầu là độ dài của mảng divs (số lượng div đã có)
var index = divs.length; 

// Thêm sự kiện click cho button
btnAdd.addEventListener("click", function() {
  // Tạo một div mới
  var div = document.createElement("div");
  div.classList.add("item");
  div.style = "display:flex;padding:5px;";

  // Thêm các input và button vào div mới
  var inputSize = document.createElement("input");
  inputSize.type = "text";
  inputSize.name = "size[]" ;
  inputSize.setAttribute('class','form__input form-control');
  inputSize.setAttribute('style','width:60px;');
  div.appendChild(inputSize);

  var spansize = document.createElement("span");
  spansize.innerText = "cm/";
  spansize.setAttribute('style','padding:10px;');
  div.appendChild(spansize);

  var inputPrice = document.createElement("input");
  inputPrice.type = "text";
  inputPrice.name = "price[]" ;
  inputPrice.setAttribute('class','form__input form-control');
  inputPrice.setAttribute('style','width:180px;');
  div.appendChild(inputPrice);

  var spanprice = document.createElement("span");
  spanprice.innerText = "đ";
  spanprice.setAttribute('style','padding:10px;');
  div.appendChild(spanprice);
  // Thêm div mới vào container dưới các div đã có sẵn
  container.insertBefore(div, container.children[index]);

  // Thêm div mới vào mảng divs
  divs.splice(index, 0, div);

  // Tăng biến index lên 1 để đánh dấu tên input và button của div mới
  index++;
  deleteBtn.style.display = "block";
});
deleteBtn.addEventListener('click', function() {
  if (divs.length > 1) {
    const lastDiv = divs.pop();
    container.removeChild(lastDiv);
    index--;
    
  }if(divs.length == 1){
    deleteBtn.style.display = "none";
    
    }
});
if(divs.length == 1){
    deleteBtn.style.display = "none";   
}else{
    deleteBtn.style.display = "block";
}

</script>

</html>