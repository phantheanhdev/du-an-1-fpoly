<!-- End Header Area -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.php">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="returning_customer">
            <div class="billing_details">
                <div class="row">
                    <?php
                    extract($_SESSION['username']);
                    ?>
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="user" name="username" placeholder="<?= $username ?>" disabled>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone">
                                <span class="placeholder" data-placeholder="<?= $phone ?>" disabled></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email">
                                <span class="placeholder" data-placeholder="<?= $email ?>" disabled></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="user" name="address" placeholder="<?= $address ?>" disabled>
                            </div>
                        </form>
                        <section class="cart_area">
                            <h3>Your Order</h3>
                            <?php
                            if (!empty($_SESSION['fake_cart'])) {
                            ?>
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sản phẩm</th>
                                            <th></th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_price = 0;
                                        foreach ($_SESSION['fake_cart'] as $value) {
                                            // echo '<pre>';
                                            // print_r($value);
                                            $total = $value[2] * $value[4];
                                            $total_price = $total_price + $total;
                                        ?>
                                            <tr>
                                                <td><?= $value[1] ?></td>
                                                <td><img width="70px" src="<?= $value[3] ?>" alt="anh"></td>
                                                <td><?= $value[2] ?></td>
                                                <td><?= $value[4] ?></td>
                                                <td><?= $value[5] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    </form>
                                </table>
                            <?php
                            } else {
                            ?>
                                <h5 class="text-center">Chưa có sản phẩm nào</h5>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <form action="index.php?act=confirmation" method="POST">
                            <div class="order_box">
                                <h2>Your Order</h2>

                                <ul class="list">
                                    <li><a>Product <span>Total</span></a></li>
                                    <?php
                                    $total_price = 0;
                                    foreach ($_SESSION['fake_cart'] as $value) {
                                        // extract($value);
                                        // echo '<pre>';
                                        // print_r($value);
                                        // echo 'hello';
                                        $total = $value[2] * $value[4];
                                        $total_price = $total_price + $total;
                                    ?>
                                        <li><a><?= $value[1] ?> <span class="middle">x <?= $value[4] ?></span> <span class="last">$ <?= $total ?></span></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>

                                <ul class="list list_2">
                                    <li><a>Subtotal <span>$ <?= $total_price ?></span></a></li>
                                    <li><a>Shipping <span>Flat rate: $50.00</span></a></li>
                                    <li><a>Total <span>$ <?= $total_price + 50 ?></span></a></li>
                                </ul>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" checked id="f-option5" name="pttt" value="0">
                                        <label for="f-option5">Check payments</label>
                                        <div class="check"></div>
                                    </div>
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                        Store Postcode.</p>
                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="pttt" value="1">
                                        <label for="f-option6">Paypal </label>
                                        <img src="img/product/card.jpg" alt="">
                                        <div class="check"></div>
                                    </div>
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.</p>
                                </div>
                                <div class="d-flex flex-column form-group">
                                    <a href="index.php"><input class="btn primary-btn form-control" value="Shopping"></a>
                                    <a href=""><input class="btn primary-btn form-control mt-2" type="submit" name="order_bill" value="Đồng ý đặt hàng"></a>
                                    <a href="index.php?act=delete_checkout" onclick="return confirm('Xóa giỏ hàng')"><input class="btn btn-close-white form-control mt-2" value="Xóa giỏ hàng"></a>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</section>
<!--================End Checkout Area =================-->

<!-- start footer Area -->

<!-- End footer Area -->



</body>