<!-- End Header Area -->

<!-- back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/buttonTop.png" title='lên đầu trang' width='20px' height="20px" /></button>
<!--end back to top-->
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?act=cart">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <?php
                if (!empty($_SESSION['mycart'])) {
                ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Size</th>
                                <th scope="col">Tổng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <form action="index.php?act=checkout" method="post" novalidate>
                            <tbody>
                                <?php
                                $i = 0;
                                $total_price = 0;
                                foreach ($_SESSION['mycart'] as $value) {
                                    // echo '<pre>';
                                    // print_r($_SESSION['mycart']);
                                    // echo '<pre/>';

                                ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="upload/<?= $value[3] ?>" width="100px">
                                                </div>
                                                <div class="media-body">
                                                    <p><?= $value[1] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 id="price" data-price="<?= $value[2] ?>"><?= $value[2] ?></h5>
                                        </td>
                                        <td>
                                            <input onclick="return count_price()" width="100px" value="0" id="product_amount" name="product_amount" type="number" min="1">
                                            <!-- <h5><?= $value[4] ?></h5> -->
                                        </td>
                                        <td>
                                            <select name="size_id" class="form-control">
                                                <option value="0" selected>Chọn size</option>
                                                <?php
                                                foreach ($value[5] as $size) {
                                                    extract($size);
                                                    echo '<option value=" ' . $pr_size . '">' . $pr_size . '</option>';
                                                }

                                                ?>
                                            </select>
                                        <td>
                                            <h5><input style="border: #FFFFFF;" type="text" name="total_price" id="total_price" value="0"></h5>
                                        </td>
                                        <td> <a onclick="return confirm('Bạn muốn xóa sản phẩm')" href="index.php?act=delete_cart&cart_id=<?= $i++ ?>">xóa</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr class="out_button_area">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" style="margin-right: 10px;" href="index.php">Shopping</a>
                                            <input type="hidden" name="product_name" value="<?= $value[1] ?>">
                                            <input type="hidden" name="product_price" value="<?= $value[2] ?>">
                                            <input type="hidden" name="product_img" value="<?= $value[3] ?>">
                                            <input type="hidden" name="product_id" value="<?= $value[0] ?>">
                                            <!-- <button class="btn primary-btn" type="submit" name="fake_bill">Proceed to checkout</button> -->
                                            <?php
                                            if (isset($_SESSION['username'])) {
                                            ?>
                                                <input type="submit" class="primary-btn btn" value="Proceed to checkout" name="fake_bill">
                                            <?php
                                            } else {
                                            ?>
                                                <a href="index.php?act=login" class="btn primary-btn">Đăng nhập để tiếp tục mua hàng</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                <?php
                } else {
                ?>
                    <h3 class="text-center">No product</h3>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
</body>
<script>
    function count_price() {
        let price = document.getElementById("price").getAttribute("data-price");
        let amount = document.getElementById("product_amount");
        let total_price = document.getElementById("total_price");
        let total = price * amount.value;
        total_price.value = total;
    }
</script>