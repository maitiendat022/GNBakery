<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-image: url(../img/picsup.jpg);">
    <div class="modal modal-signin position-static d-block  py-5"  role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
              <h2 class="fw-bold mb-0">Đăng nhập Admin</h2>
            </div>
      
            <div class="modal-body p-5 pt-0">
              <?php include './error_success.php'; ?>
              <form action="process_signin.php" method = "post" class="">
                  <div class="form-floating mb-3">
                    <input name = "email" type="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                  </div>
                <div class="form-floating mb-3">
                  <input name = "password" type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Mật khẩu</label>

                </div>
                <button name = "btnSignin" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Đăng nhập</button>
                <!-- <div class="box_more_option">
                    <span class="box-checkbox">
                         <input id="rememberpass" checked="checked" type="checkbox" name="isRemember">
                         <label for="checkbox1" style="font-size:14px; width:90px;">Nhớ mật khẩu</label>
                        </span>  
                  </div>       -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
