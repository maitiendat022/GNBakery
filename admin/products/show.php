<?php 
    require_once '../check_admin_signin.php';
    include '../navbar-vertical.php'; 

    $id = $_GET['id'];
    
    require_once '../../database/connect.php';
    $sql = "select * from products where products.id = '$id' ";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    $sql = "SELECT size, price
    FROM products_size
    WHERE product_id = $id
    ORDER BY size ASC, price ASC
    LIMIT 1";
    $resultprice = mysqli_query($connect, $sql);
    $eachprice = mysqli_fetch_array($resultprice);

    $sql = "SELECT size FROM products_size WHERE product_id = $id ORDER BY size ASC ";
    $result = mysqli_query($connect, $sql);
    $sizes = array();
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    // Thêm kích thước và giá tương ứng vào mảng hai chiều
            $sizes[] = array($row['size']);
        }
    }
?>


<div class="main__container">

    <div class="product">
        <div class="product-content">
            <div class="product-content-left">
            <img class="image-img" style="width:100%;" src="../../assets/images/products/<?= $each['image'] ?>" data-zoom-image="../../assets/images/products/<?= $each['image'] ?>" />
            <img class="image-img-mobile" src="../../assets/images/products/<?= $each['image'] ?>"/>
            </div>

            <div class="product-content-right">
                <div class="product-content-right-name">
                    <h1><?= $each['name'] ?></h1>
                    <p>Mã sản phẩm: <?= $each['id'] ?></p>
                </div>
                <hr>
                
                <div>
                    <div class="product-price">
                        <p class="line-price">
                            <span class="">Giá: </span>
                            <span class="price" id="price"><?=$eachprice['price']?> </span>&#8363
                    </div>
                    <span style ="font-size:1.6rem;display:none;"id="size-text">Kích thước: </span> 
                    <div>
                       
                        <?php       
                        foreach($sizes as $size) {
                            $sizesp = $size[0];
                            ?>
                        <button type="button" class="size-btn" data-size="<?php echo $sizesp?>" data-id = "<?=$each['id']?>"><?php echo $sizesp?> cm</button>
                        <?php }?>
                    </div>
                </div>
                
                <div class="product-actions">
                    <a href="form_update.php?id=<?= $id ?>&admin_id=<?= $each['user_id'] ?>" id="AddToCart" class="btnAddtocart">Sửa</a>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="delete.php?id=<?= $each['id'] ?>" id="buy-now" class="btnBuynow">
                    Xóa
                </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-tab">
        <div class="tab" >
            <button class="tablinks" >Mô tả chung</button>
        </div>
        <div class="content-product-tab">
            <?= nl2br($each['description']) ?>
        </div>
    </div>
    <div class = "ratings-1">
    <h3>Đánh giá sản phẩm</h3>
    <hr>
    <div id="Content" class="tabs_rating-1">
    <?php
      $product_id = $each['id']; // ID của sản phẩm cần hiển thị đánh giá
      $sql = "SELECT ratings.star, ratings.created_at, ratings.comment, users.name FROM ratings INNER JOIN users ON ratings.user_id = users.id WHERE ratings.product_id = '$product_id'";
      $result = $connect->query($sql);
      if(mysqli_num_rows($result)<1){
        echo '<span>Sản phẩm hiện tại chưa có đánh giá</span>';
      }
    ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="tab-rating-1">
            <span class="user-1"><?php echo $row['name']; ?></span>
            <div >
              <span class="star-rating-1">
            <?php
              $star = $row['star'];
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $star) {
                    echo '<i class="fas fa-star"></i>'; 
                } else {
                    echo '<i class="far fa-star"></i>'; 
                }
              }
            ?>
              </span>
              <span class="created_at-1"><?php echo $row['created_at']; ?></span>
              <span class="comment-1"><?php echo $row['comment']; ?></span>
            </div>
        </div>
        <hr>
    <?php endwhile; ?>
    </div>
    
  </div>
    

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script>
  $(".image-img").ezPlus({
    zoomWindowFadeIn: 500,
    zoomWindowFadeOut: 500,
    lensFadeIn: 500,
    lensFadeOut: 500,
    zoomWindowWidth: 400,
    zoomWindowHeight: 400
  });
 
    $('.btn-menu').click(function() {
        $('.navbar-vertical-mobile').toggle("fast");
        $('.header__navbar-overlay').toggle("fast");
    });

</script>
<script>
    const sizeButtons = document.querySelectorAll(".size-btn");
    const sizeText = document.getElementById("size-text");
    const priceSpan = document.getElementById("price");
    
    sizeButtons[0].style.backgroundColor = "var(--navbar-color)";
    const countsizeButtons = sizeButtons.length;
    if(countsizeButtons === 1){
        sizeButtons[0].style.display = "none";
        
    }else{
        sizeText.style.display = "block";
    }

    const updatePrice = (size,id) => {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `get_price.php?size=${size}&id=${id}`, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            const [price, size] = response.split("|");
            priceSpan.innerHTML = price ;
        }
    };
        xhr.send("size=" + size);
    };

    sizeButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        const selectedSize = event.target.dataset.size;
        const selectedId = event.target.dataset.id;
        sizeButtons.forEach((button) => {
        button.style.backgroundColor = "";
        // Xóa màu nền của tất cả các thẻ kích thước
    });
        event.target.style.backgroundColor = "var(--navbar-color)"; // Thay đổi màu nền của thẻ kích thước được chọn
       

        updatePrice(selectedSize, selectedId);
    });
  });
  
</script>

</body>

</html>