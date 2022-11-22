<!-- End Header Area -->
<style>
    .product__woman img.img-fluid{
        width: 271px;
        height: 255px;
    }
</style>

<!--back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/buttonTop.png" title='lên đầu trang' width='30px' height="30px" /></button>
<!--end back to top-->

<!-- start banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Danh mục giày nữ</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?act=woman_pr">Giày nữ</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- End category Area -->

<!-- start product Area -->

<!-- single product slide -->
<div class="single-product-slider">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1 class="mt-5">Giày Nữ</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single product -->

            <?php
            $load_all_product_woman = load_all_product_women();
            foreach ($load_all_product_woman as $value) { ?>

                <div class="col-lg-3 col-md-6">
                    <div class="product__woman single-product">
                        <img class="img-fluid" src="./upload/<?php echo $value['img'] ?>" alt="">
                        <div class="product-details">
                            <h6><?php echo $value['product_name'] ?></h6>
                            <div class="price">
                                <h6>$<?php echo $value['price'] ?></h6>
                                <!-- <h6 class="l-through">$210.00</h6> -->
                                <!-- discount -->
                            </div>
                            <div class="prd-bottom">

                                <a href="index.php?act=cart&product_id=<?php echo $value['product_id'] ?>" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Thêm vào giỏ</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Thêm vào yêu thích</p>
                                </a>
                                <a href="index.php?act=detail&product_id=<?php echo $value['product_id']?>"class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Xem thêm</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
</div>