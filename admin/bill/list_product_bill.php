<style>
  .thaotac {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  a {
    text-decoration: none;
  }

  td {
    line-height: 40px;
  }

  .btn1 input:nth-child(1) {
    margin-right: 10px;
  }

  .btn2 {
    padding-left: 30px;
    padding-right: 30px;
  }

  .boloc {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-bottom: 15px;
  }

  .boloc2 {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .boloc select {
    height: 38px;
  }

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
  }

  .btn3 {
    background-color: red;
  }

  .btn3:hover {
    opacity: 0.7;
    background-color: red;
  }
</style>
<!-- <?php
      extract($_SESSION['user_bill']);
      echo '<pre>';
      print_r($_SESSION['user_bill']);
      ?> -->
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Danh sách đơn hàng</h2>
        <form class="boloc" action="" method="post">
          <div class="boloc2 form-group">
            <input type="text" name="kyw" id="" class="form-control" placeholder="Search..." style="width:260px" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'">
            <button type="submit" class="btn btn-primary" name="search_bill" value="Search">Tìm kiếm</button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table text-center">
            <table class="table table-bordered text-center table1">
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th></th>
                  <th style="width: 10%;">Giá</th>
                  <th>Số lượng</th>
                  <th>Size</th>
                  <th style="width: 10%;">Thành tiền</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <tr>
                    <?php
                    foreach ($list_product as $product) {
                      extract($product);
                    ?>
                      <td><?= $product_name ?></td>
                      <td><?= $img ?></td>
                      <td><input style="border: none;text-align: center;" type="text" value="<?= $price ?>"></td>
                      <td style="width: 10%;"><input class="form-control" type="number" name="amount" min="0" id=""></td>
                      <td style="width: 12%;">
                        <select class="form-select" name="" id="">
                          <option value="Chọn size">Chọn size</option>
                          <?php
                          $list_size = load_product_size($product_id);
                          foreach ($list_size as $size) {
                            extract($size);
                          ?>
                            <option value="<?= $size_id ?>"><?= $pr_size ?></option>
                          <?php
                          }
                          ?>

                        </select>
                      </td>
                      <td>10000$</td>
                      <td> <button type="submit" class="btn primary-btn"><i class="fa-solid fa-cart-plus"></i></button></td>
                  </tr>
                </form>
              <?php
                    }
              ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function count_money() {
    let amount = document.getElementsByName("amount");
  }
</script>