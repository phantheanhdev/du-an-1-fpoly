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
                        <tbody>

                            <?php
                            $i = 0;
                            $total_price = 0;
                            foreach ($_SESSION['mycart'] as $value) {
                                echo '<pre>';
                                print_r($_SESSION['mycart']);
                                echo '<pre/>';
                                $total = $value[2] * $value[4];
                                $total_price = $total_price + $total;
                                $hinh = "upload/" . $value[3];

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
                                        <!-- <input onclick="return count_price()" width="100px" value="0" id="pr_number" name="pr_number" type="number" min="1"> -->
                                        <h5><?= $value[4] ?></h5>
                                    </td>
                                    <td>
                                        <select name="size_id" class="form-control">
                                            <option value="0" selected>Chọn size</option>
                                            <?php
                                            foreach ($value[5] as $size) {
                                                extract($size);
                                                echo '<option value=" ' . $size_id . '">' . $pr_size . '</option>';
                                            }

                                            ?>
                                        </select>
                                    <td>
                                        <h5><input style="border: #FFFFFF;" type="text" id="total_price" value="<?= $total ?>"></h5>
                                    </td>
                                    <td> <a onclick="return confirm('Bạn muốn xóa sản phẩm')" href="index.php?act=delete_cart&cart_id=<?= $i++ ?>">xóa</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td></td>
                                <td>
                                    <h5>Tổng cộng</h5>
                                </td>
                                <td>
                                    <h5><input style="border: #FFFFFF;font-weight: 600;" type="text" id="count_total_price" value="<?= $total_price ?>"></h5>
                                </td>
                                <td></td>
                            </tr>




                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="index.php">Continue Shopping</a>
                                        <a class="primary-btn" href="index.php?act=checkout">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <h3>No product</h3>
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

</script>