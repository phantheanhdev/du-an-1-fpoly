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
          <h2 class="thongbao">
          </h2>
          <form class="row login_form pb-3" method="post" enctype="multipart/form-data" id="registrationForm">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="last_name" name="username" placeholder="Tài khoản">
              <span class="mt-3 float-left"></span>
            </div>

            <div class="col-md-12 form-group">
              <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
              <span class="mt-3 float-left"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" name="password2" placeholder="Nhập Lại Mật Khẩu">
              <span class="mt-3 float-left"></span>
            </div>

            <div class="col-md-12 form-group">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <span class="mt-3 float-left"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="phone" placeholder="Phone">
              <span class="mt-3 float-left"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" name="address" placeholder="Address">
              <span class="mt-3 float-left"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="file" class="form-control" name="avatar" placeholder="Avatar">
              <span class="mt-3 float-left"></span>
            </div>


            <div class="col-md-12 form-group">
              <div class="creat_account">
                <input type="checkbox" id="f-option2" name="selector">
                <label for="f-option2">Duy trì đăng nhập</label>
              </div>
            </div>
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
    var nodeSpan = document.getElementsByTagName("span"); //start 8
    console.log(nodeInput);
    if (nodeInput[1].value == "") {
      nodeSpan[8].innerHTML = "Không được để trống";
    } else {
      nodeSpan[8].innerHTML = "";
    }
    if (nodeInput[2].value == "") {
      nodeSpan[9].innerHTML = "Không được để trống";
    } else {
      nodeSpan[9].innerHTML = "";
    }
    if (nodeInput[3].value == "") {
      nodeSpan[10].innerHTML = "Không được để trống";
    } else if (nodeInput[2].value != nodeInput[3].value) {
      nodeSpan[10].innerHTML = "Mật khẩu không trùng khớp";
    } else {
      nodeSpan[10].innerHTML = "";
    }

    const regMail = /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,3}/gim;
    if (nodeInput[4].value == "") {
      nodeSpan[11].innerHTML = "Không được để trống";
    } else if (!regMail.test(nodeInput[4].value)) {
      nodeSpan[11].innerHTML = "Sai định dạng email !";
    } else {
      nodeSpan[11].innerHTML = "";
    }

    const regPhone = /^0([0-9]{9})*$/;
    if (nodeInput[5].value == "") {
      nodeSpan[12].innerHTML = "Không được để trống !";
    } else if (nodeInput[5].value.length != 10) {
      nodeSpan[12].innerHTML = "Nhập 10 số!";
    } else if (!regPhone.test(nodeInput[5].value)) {
      nodeSpan[12].innerHTML = "Bắt đầu bằng số 0";
    } else {
      nodeSpan[12].innerHTML = "";
    }
    if (nodeInput[6].value == "") {
      nodeSpan[13].innerHTML = "Không được để trống";
    } else {
      nodeSpan[13].innerHTML = "";
    }
    if (nodeInput[7].value == "") {
      nodeSpan[14].innerHTML = "Không được để trống";
    } else {
      nodeSpan[14].innerHTML = "";
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