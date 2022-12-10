<style>
  .details_item ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .list li {
    margin-bottom: 18px;
  }

  .list li a {
    text-decoration: none;
    color: black;
    font-size: 1rem;
  }

  .list li a span {
    font-weight: bold;
  }

  .title_confirmation {
    color: green;
  }

  .order_d_inner {
    border-radius: .5rem;
    background: #e5ecee;
    padding: 0.5rem;
    padding-top: 1rem;
  }

  .your_order {
    margin-top: 1rem;
    border-radius: .5rem;
    background: #e5ecee;
    padding: 1rem;
  }
</style>
<div class="card">
  <div class="card-body">
    <h4 class="title_confirmation text-center m-4">Thank you. Your order has been received.</h4>
    <hr>
    <div class="row order_d_inner">
      <div class="col-lg-4">
        <div class="details_item">
          <?php
          // extract($bill);
          // echo '<pre>';
          // print_r($_SESSION['admin_cart']);
          // if ($pttt == 0) {
          //   $pttt = 'Thanh toán khi nhận hàng';
          // } else {
          //   $pttt = 'Thanh toán bằng Paypal';
          // }           
          ?>
          <h4>Order Info</h4>
          <ul class="list">
            <hr>
            <li><a href="#"><span>Code </span>: DAM-111 </a></li>
            <li><a href="#"><span>Date</span> : 11/22/2022</a></li>
            <li><a href="#"><span>Total</span> : 222 $</a></li>
            <li><a href="#"><span>Payment method</span> : paypal</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="details_item">
          <!-- <?php
                extract($_SESSION['user_bill']);
                ?> -->
          <h4>Shipping Detail</h4>
          <ul class="list">
            <hr>
            <li><a href="#"><span>Username</span> : <?= $_SESSION['user_bill'][0] ?></a></li>
            <li><a href="#"><span>Phone</span> : <?= $_SESSION['user_bill'][2] ?> </a></li>
            <li><a href="#"><span>Address</span> : <?= $_SESSION['user_bill'][1] ?> </a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row your_order">
      <h4>Your Order</h4>
      <table class="table table-bordered">
        <thead>
          <th>Sản phẩm</th>
          <th></th>
          <th>Giá</th>
          <th>Số lượng</th>
          <th>thành tiền</th>
        </thead>
      </table>
    </div>
  </div>
</div>