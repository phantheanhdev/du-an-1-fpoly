<!-- End Header Area -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <h1>Đăng kí</h1>
        <nav class="d-flex align-items-center">
          <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=register">Đăng kí</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
  <div class="container">
    <div class="row justify-content-around">
      <div class="col-lg-6">
        <div class="login_form_inner">
          <h3>ĐĂNG KÍ</h3>
          <h2 class="thongbao"></h2>
          <form class="row login_form pb-3" method="post" enctype="multipart/form-data" id="registrationForm">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="username" placeholder="Tài khoản">
              <span class="mt-3 float-left" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
              <span class="mt-3 float-left" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" name="password2" placeholder="Nhập Lại Mật Khẩu">
              <span class="mt-3 float-left" name="register"></span>
            </div>

            <div class="col-md-12 form-group">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <span class="mt-3 float-left" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="phone" placeholder="Phone">
              <span class="mt-3 float-left" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="address" placeholder="Address">
              <span class="mt-3 float-left" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="file" class="form-control" name="avatar" placeholder="Avatar">
              <span class="mt-3 float-left" name="register"></span>
            </div>
            <div class="col-md-12 form-group">
              <div class="creat_account">
                <input type="checkbox" id="f-option2" name="selector">
                <label for="f-option2">Duy trì đăng nhập</label>
              </div>
            </div>
            <?php
            foreach ($list_user as $user) {
            ?>
              <input type="hidden" name="check_username" value="<?= $user['username'] ?>">
              <input type="hidden" name="check_email" value="<?= $user['email'] ?>">
            <?php
            }
            ?>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" name="registration" class="primary-btn" onclick="return checkForm2()">Đăng kí</button>
              <a href="index.php?act=login">Đã có tài khoản?/Đăng nhập</a>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!--================End Login Box Area =================-->


  </div>
</section>
<style>
  span {
    color: red;
  }
</style>

</body>
<script>
  function checkForm2() {
    var nodeInput = document.getElementsByTagName("input"); //start 1
    // var nodeSpan = document.getElementsByTagName("span"); //start 9
    var username = document.getElementsByName("check_username");
    var nodeSpan = document.getElementsByName("register");
    var email = document.getElementsByName("check_email");
    for (var i = 0; i < username.length; i++) {
      if (username[i].value == nodeInput[1].value) {
        console.log(username[i].value);
        let checkName = 'Tài khoản đã tồn tại';
        alert(checkName);
        console.log(checkName);     
      } else if (email[i].value == nodeInput[4].value) {
        console.log(email[i].value);
        let checkName = 'Email đã tồn tại';
        alert(checkName);
        break;
      } else {
        checkName = ''
      }
    };



    if (nodeInput[1].value == "") {
      nodeSpan[0].innerHTML = "Không được để trống user";
    } else {
      nodeSpan[0].innerHTML = "";
    }
    if (nodeInput[2].value == "") {
      nodeSpan[1].innerHTML = "Không được để trống";
    } else {
      nodeSpan[1].innerHTML = "";
    }
    if (nodeInput[3].value == "") {
      nodeSpan[2].innerHTML = "Không được để trống";
    } else if (nodeInput[2].value != nodeInput[3].value) {
      nodeSpan[2].innerHTML = "Mật khẩu không trùng khớp";
    } else {
      nodeSpan[2].innerHTML = "";
    }

    const regMail = /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,3}/gim;
    if (nodeInput[4].value == "") {
      nodeSpan[3].innerHTML = "Không được để trống";
    } else if (!regMail.test(nodeInput[4].value)) {
      nodeSpan[3].innerHTML = "Sai định dạng email !";
    } else {
      nodeSpan[3].innerHTML = "";
    }

    const regPhone = /^0([0-9]{9})*$/;
    if (nodeInput[5].value == "") {
      nodeSpan[4].innerHTML = "Không được để trống !";
    } else if (nodeInput[5].value.length != 10) {
      nodeSpan[4].innerHTML = "Nhập 10 số!";
    } else if (!regPhone.test(nodeInput[5].value)) {
      nodeSpan[4].innerHTML = "Bắt đầu bằng số 0";
    } else {
      nodeSpan[4].innerHTML = "";
    }
    if (nodeInput[6].value == "") {
      nodeSpan[5].innerHTML = "Không được để trống";
    } else {
      nodeSpan[5].innerHTML = "";
    }
    if (nodeInput[7].value == "") {
      nodeSpan[6].innerHTML = "Không được để trống";
    } else {
      nodeSpan[6].innerHTML = "";
    }
    // action="index.php?act=registration"
    if (nodeInput[1].value != '' && nodeInput[2].value != '' && nodeInput[3].value != '' && nodeInput[4].value != '' && nodeInput[5].value != '' && nodeInput[6].value != '' && nodeInput[7].value != '') {
      // thêm action sau khi validate form
      document.getElementById("registrationForm").setAttribute("action", "index.php?act=registration");
      return true;
    } else {
      document.getElementById("registrationForm").setAttribute("action", "");
      return false;
    }
  }
</script>