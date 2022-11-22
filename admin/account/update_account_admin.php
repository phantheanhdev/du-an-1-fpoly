<style>
  .role {
    margin-left: 1rem;
  }
</style>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật tài khoản</h4>
        <form action="index.php?act=update_account" method="post" enctype="multipart/form-data">
          <?php
          extract($update_user);
          ?>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $update_user['username'] ?> ">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value=" <?php echo $update_user['email'] ?> ">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $update_user['password'] ?> ">
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value=" <?php echo $update_user['address'] ?> ">
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="phone" class="form-control" name="phone" value=" <?php echo $update_user['phone'] ?> ">
          </div>
          <div class="form-group">
            <label for="">Avatar</label>
            <img style="width: 120px;" src="<?php echo $avatar ?>" class="form-control" alt="ảnh">

            <input class="form-control mt-2" type="file" name="file" id="" multiple="multiple">
          </div>
          <div class="form-group">
            <label for="">Vài trò</label> <br>
            <select name="role" id="" class="form-select">
              <option value="<?= $role ?>" selected><?php echo  $role==0? 'Admin':'Khách hàng' ?></option>
              <option value="0">Khách hàng</option>
              <option value="1">Admin</option>
            </select>
          </div>
          <input type="hidden" name="account_id" value=" <?= $user_id ?> ">
          <button type="submit" class="mt-3 btn btn-primary" name="update_account_one">Cập nhật</button>
          <input type="reset" class="mt-3 btn btn-primary" value="Nhập lại">
        </form>
      </div>
    </div>
  </div>