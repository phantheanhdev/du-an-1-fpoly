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

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
  }
</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách khách hàng</h4>
        <div class="table-responsive">
          <table class="table table-bordered text-center table1">
            <thead>
              <tr>
             
                <th>Mã khách hàng</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Vai trò</th>
                <th style="width: 17%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($list_account as $value) {
                extract($value);
                $update_account = "index.php?act=update_account&user_id=";
                $delete_account = "index.php?act=delete_account&user_id=";
              ?>

                <tr>
             
                  <td><?php echo $user_id ?></td>
                  <td><?php echo $username ?></td>
                  <td><?php echo $password ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $address ?></td>
                  <td><?php echo $phone ?></td>
                  <td><img src="'.$avatar.'" alt="Avatar"></td>
                  <td><?php echo $role ?></td>
                  <td class="btn1"><a href="<?php echo $update_account . $value['user_id'] ?>"><input class="btn btn-primary btn2" type="button" value="Sửa"></a><a href="<?php echo $_account . $value['user_id'] ?>" onclick="return confirm(`Bạn muốn xóa?`)" ; id="delete"><input class="btn btn-danger btn2" type="button" value="Xóa"></a></td>
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