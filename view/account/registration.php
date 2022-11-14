
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
                        <?php 
                       
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }
                        ?>
                        </h2>
          <form class="row login_form pb-3" action="index.php?act=registration" method="post"  enctype="multipart/form-data" id="registrationForm" novalidate="novalidate">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="last_name" name="username" placeholder="Tài khoản">
            </div>

            <div class="col-md-12 form-group">
              <input type="password" class="form-control" id="DOB" name="password" placeholder="Mật Khẩu">
            </div>
            <div class="col-md-12 form-group">
              <input type="password" class="form-control" id="DOB" name="password2" placeholder="Nhập Lại Mật Khẩu">
            </div>

            <div class="col-md-12 form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="email" name="phone" placeholder="Phone">
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="email" name="address" placeholder="Address">
            </div>
            <div class="col-md-12 form-group">
              
              <input type="file" class="form-control" id="DOB" name="avatar" placeholder="Avatar" >
            </div>

            
            <div class="col-md-12 form-group">
              <div class="creat_account">
                <input type="checkbox" id="f-option2" name="selector">
                <label for="f-option2">Duy trì đăng nhập</label>
              </div>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" name="registration" class="primary-btn">Đăng kí</button>
              <a href="index.php?act=login">Đã có tài khoản?/Đăng nhập</a>
            </div>
          </form>
        </div>
      </div>
    </div>


<!--================End Login Box Area =================-->


  </div>
</section>


</body>
