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
  <style>
    .detail-comment {
      background: rgb(216, 214, 214);
      padding: .5rem;
      padding-left: .7rem;
      border-radius: .5rem;
      position: relative;
    }
    .detail-comment::before {
      position: absolute;
      top: 20px;
      right: auto;
      bottom: auto;
      left: -12px;
      content: "";
      width: 0;
      height: 0;
      border-left: 8px solid transparent;
      border-right: 8px solid transparent;
      border-bottom: 8px solid rgb(216, 214, 214);
      -webkit-transform: translatey(-50%) rotate(-90deg);
      transform: translatey(-50%) rotate(-90deg);

    }
  </style>
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
                  <input type="hidden" name="categori_id" value="<?= $categori_id ?>">
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
      <?php
      $product_id = $_GET['product_id'];
      $dsbl = load_all_cmt($product_id);
      $count_cmt = count($dsbl);
      // echo "<pre>";
      // print_r($dsbl);
      ?>
      <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (<?= $count_cmt ?>)</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis
            unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
          </div>
          <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="review-heading">REVIEWS</div>
            <!-- <p class="mb-20">There are no reviews yet.</p> -->
            <?php
            if (!empty($dsbl)) {
            ?>
              <!-- <table class="table table-bordered">
                <thead>
                  <th>Người bình luận</th>
                  <th>Nội Dung</th>
                  <th>Time</th>
                </thead>
                <tbody>
                  <?php
                  foreach ($dsbl as $bl) {
                    extract($bl);
                  ?>
                    <tr>
                      <td><?= $bl['username'] ?></td>
                      <td><?= $content ?></td>
                      <td><?= $date_comment ?></td>
                    </tr>
                  <?php
                  }
                  ?>

                </tbody>
              </table> -->

              <div class="group-comment d-flex flex-column mb-3" style="margin-left: 3%;">
                <?php
                foreach ($dsbl as $bl) {
                  extract($bl);
                ?>
                  <div class="item-comment mt-4">
                    <div class="avatar">
                      <img src="<?= $avatar ?>" style="width: 50px; border-radius: 50%;" alt="">
                    </div>
                    <div class="detail-comment d-flex flex-column">
                      <div class="detail d-flex flex-column">
                        <div class="username" style="color: #000000;font-weight: bold;"><?= $bl['username']  ?></div>
                        <div style="font-size: 14px;" class="time"><?= $date_comment ?></div>
                      </div>
                      <hr>
                      <div class="content"><?= $content ?></div>
                    </div>
                  </div>

                <?php
                }
                ?>
              </div>

            <?php
            } else {
            ?>
              <h5 class="text-center mt-2">No comment</h5>
            <?php
            }
            ?>

            <!-- start form comment -->
            <?php
            if (!empty($list_img_cart)) {
              foreach ($list_img_cart as $cart) {
                extract($cart);
                if ($oneproduct['product_id'] == $cart['4']) {
            ?>
                  <form class="review-form" method="POST" action="index.php?act=insert_commnet">

                    <div class="form-group">
                      <label>Your message</label>
                      <textarea class="form-control" rows="10" name="content_comment" required></textarea>
                      <input type="hidden" name="product_id" value="<?= $product_id ?>">

                    </div>
          </div>
          <div class="checkout_btn_inner d-flex align-items-center">

            <button type="submit" class="btn primary-btn" name="btn_submit_comment">Submit Review
              <!-- <a class="btn primary-btn" href="">Submit Review</a> -->
            </button>
      <?php
                  break;
                }
              }
            }
      ?>
          </div>
          </form>
        </div>
      </div>
      <?php
      if (isset($_POST['guibinhluan'])) {
        $content = $_POST['content'];
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['username']['user_id'];
        $date_comment = date('h:i:sa d/m/Y');
        insert_comment($content, $product_id, $user_id, $date_comment);
        include '../view/detail.php';
      }
      ?>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>