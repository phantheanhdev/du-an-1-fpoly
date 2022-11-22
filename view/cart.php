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
                        foreach ($_SESSION['mycart'] as $value) {

                            $hinh = "upload/" . $value[3];
                            $ttien = $value[2] * $value[4];

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
                                    <h5 id="price"><?= $value[2] ?></h5>
                                </td>
                                <td>
                                    <input onmousedown="return count_price()" width="100px" value="1" name="pr_number" type="number" min="1">
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
                                    <h5 class="total_price"> 1000</h5>
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
                                <h5 class="count_total_price">1000</h5>
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
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
</body>
<script>
    function count_price(){
        var price=document.getElementById("price");
        console.log(price.value);
    }
</script>