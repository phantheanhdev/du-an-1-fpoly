<!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<div class="pd-wrap">
  <link rel="stylesheet" href="./view/assets/css/detail_product.css">
  <div class="container">

    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <nav class="d-flex align-items-center">
          <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=detail">Chi tiết sản phẩm</a>
        </nav>
      </div>
    </div>

    <div class="heading-section">
      <h2>Product Details</h2>
    </div>
    <div class="row">
      <?php
      extract($oneproduct);
      // echo '<pre>';
      // print_r($oneproduct);
      ?>
      <div class="col-md-6">
        <div id="slider" class="owl-carousel product-slider">

          <div class="item">
            <?php
            $anh = "upload/" . $img;
            echo '
             <img class="img-fluid" src="' . $anh . '" alt="">
           
            ';
            ?>
          </div>

        </div>

      </div>
      <div class="col-md-6">

        <div class="product-dtl">

          <div class="product-info">
            <div class="product-name"><?= $product_name ?></div>
            <div class="reviews-counter">
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" checked />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" checked />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" checked />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
              <span>3 Reviews</span>
            </div>
            <?php
            echo '
            <div class="product-price-discount"><span>$ ' . $price . '</span></div>
           
          </div>
          <p>' . $mo_ta . '</p>
          ';
            ?>
            <form action="index.php?act=checkout" method="post">
              <div class="row">
                <div class="col-md-6">
                  <label for="size">Size</label>
                  <select name="size_id" class="form-control">
                    <option value="0">Chọn size</option>
                    <?php
                    foreach ($list_size as $list_size) {
                      extract($list_size);
                      echo '<option value=" ' . $pr_size . '">' . $pr_size . '</option>';
                    }

                    ?>
                  </select>
                </div>
              </div>
              <div class="product-count">
                <label for="size">Quantity</label>
                <input style="border-color: #dee2e6;width: 100px;border-radius: 5px;" value="0" id="product_amount" name="product_amount" type="number" min="1">

                <br>
                <div class="checkout_btn_inner d-flex align-items-center">
                  <input type="hidden" name="product_name" value="<?= $product_name ?>">
                  <input type="hidden" name="product_price" value="<?= $price ?>">
                  <input type="hidden" name="product_img" value="<?= $anh ?>">
                  <input type="hidden" name="product_id" value="<?= $product_id ?>">
                  <?php
                  if (isset($_SESSION['username'])) {
                  ?>
                    <input type="submit" class="primary-btn btn mt-2" value="Thêm vào giỏ hàng" name="fake_bill">
                  <?php
                  } else {
                  ?>
                    <a href="index.php?act=login" class="btn primary-btn mt-2">Đăng nhập để mua hàng</a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>

      <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
          </div>
          <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="review-heading">REVIEWS</div>
            <p class="mb-20">There are no reviews yet.</p>
            <table class="table table-bordered">
              <thead>
                <th>Người bình luận</th>
                <th>Nội Dung</th>
                <th>Time</th>
              </thead>
              <tbody>
                <tr>
                  <td>Luân</td>
                  <td>Sản Phẩm đẹp</td>
                  <td>thời gian</td>
                </tr>
              </tbody>
            </table>
            <form class="review-form">

              <div class="form-group">
                <label>Your message</label>
                <textarea class="form-control" rows="10"></textarea>
              </div>
          </div>
          <div class="checkout_btn_inner d-flex align-items-center">
            <?php
            foreach ($bill as $bill) {
              extract($bill);
            }
            if ($user_id == $_SESSION['username']['user_id'] && $oneproduct['product_id'] == $bill['product_id']) {
            ?>
              <a class="btn primary-btn" href="">Submit Review</a>
            <?php
            }
            ?>

          </div>
          </form>
        </div>
      </div>
      <!-- single product slide -->
      <div class="single-product-slider">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center mt-5">
              <div class="section-title mt-5">
                <h1>Sản phẩm cùng loại</h1>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- single product -->
            <?php
            foreach ($product_cung_loai as $product_cung_loai) {
              extract($product_cung_loai);
              $linksp = "index.php?act=detail&id_hh=" . $product_id;
              $anh = "upload/" . $img;
              echo '
          <div class="col-lg-3 col-md-6">
            <div class="single-product">
              <img class="img-fluid" src="' . $anh . '" alt="">
              <div class="product-details">
                <h6>' . $product_name . '</h6>
                <div class="price">
                  <h6>' . $price . '</h6>
                </div>
              </div>
            </div>
          </div>
          ';
            }
            ?>
          </div>
        </div>
      </div>
    </div>


  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>