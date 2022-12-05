<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm khách hàng</h4>
                  <form class="forms-sample" action="index.php?act=add_bill" method="post">
                    <div class="form-group">
                        <label for="">Tên Khách Hàng</label>
                        <input type="text" name="fullname_bill" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="">
                    </div>

                    <div class="form-group mt-3">
                        <input class="btn btn-primary" type="submit" name="add_bill_1" value="Thêm Mới">
                        <a href="index.php?act=list_product_bill"><input class="btn btn-primary" type="button" value="Mua hàng"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>