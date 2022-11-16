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
  .btn3{
    background-color:red;
  }
  .btn3:hover{
    opacity: 0.7;
    background-color: red;
  }
</style>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Danh sách đơn hàng</h2>
        <form class="boloc" action="index.php?act=list_bill" method="post">
          <div class="boloc2 form-group">
            <!-- <select style="width: 11rem;" class="form-select" name="id_search_bill" id="tt">
              <option value="0" selected>Tất cả</option>
              <option value="">Giày nam</option>
              <option value="">Giày nam</option>
            </select> -->
            <input type="text" name="kyw" id="" class="form-control" placeholder="Search..." style="width:260px" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'">
            <button type="submit" class="btn btn-primary" name="search_bill" value="Search">Tìm kiếm</button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table text-center">
            <table class="table table-bordered text-center table1">
              <thead>
                <tr>
                  <th>Mã đơn hàng</th>
                  <th>Khách hàng</th>
                  <th>Thông tin KH</th>
                  <th>Tổng giá trị</th>
                  <th>Ngày đặt hàng</th>
                  <th>pttt</th>
                  <th>Tình trạng đơn hàng</th>
                  <th style="width: 22%;">Thao tác</th>
                </tr>
              </thead>
              <tbody>
  <?php
  foreach($listbill as $value){
    extract($value);
    $delete_bill ="index.php?act=delete_bill&id=";
    if($status==0){
      $stt= "Đơn hàng mới";
    }elseif($status==1){
      $stt="đang xử lý";
    }elseif($status==2){
      $stt="đang giao";
    }else{
      $stt="Đã nhận hàng";
    }
    if($pttt==1){
      $ptdh="Thanh toán khi nhận";
    }elseif($pttt==2){
      $ptdh="Thanh toán online";
    }else{
      $ptdh="Thanh toán thẻ Visa";
    }
    ?>
      <tr>
                  <td>DAM-<?php echo $bill_id ?></td>
                  <td><?php echo $fullname ?></td>
                  <td><?php echo $email ?> <br><?php echo $address ?> <br><?php echo $phone ?> </td>
                  <td><?php echo $total_money ?></td>
                  <td> <?php echo $ngaydathang ?></td>
                  <td><?php echo $ptdh ?></td>
                  <td><?php echo $stt ?></td>
                  <td class="btn1"><a href="index.php?act=detail"><input type="button" class="btn btn-primary btn2" value="Detail"></a></a><a href="index.php?act=update_bill&id=<?php echo $bill_id ?>"><input type="button" class="btn btn-primary btn2" value="Update"></a></td>
                </tr>
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
