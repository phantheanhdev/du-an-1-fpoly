<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm</h4>
        <form action="index.php?act=add_product" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <!-- <label for="">Mã sản phẩm</label>
            <input disabled name="product_id" type="text" class="form-control">
          </div> -->
          <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input name="product_name" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Giá</label>
            <input name="price" type="number" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Hình sản phẩm</label>
            <input name="img" multiple="multiple" type="file" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Mô Tả</label>
            <input name="mo_ta" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">chọn size</label>
            <!-- <div class="pr_size" style="display: flex ; justify-content:space-around">
           <p>36</p> <input name="pr_size[]" type="checkbox" value="36"  >
           <p>37</p> <input name="pr_size[]" type="checkbox" value="37"  >
           <p>38</p> <input name="pr_size[]" type="checkbox" value="38"  >
           <p>39</p> <input name="pr_size[]" type="checkbox" value="39"  >
           <p>40</p> <input name="pr_size[]" type="checkbox" value="40"  >
           <p>41</p> <input name="pr_size[]" type="checkbox" value="41"  >
           <p>42</p> <input name="pr_size[]" type="checkbox" value="42"  >
           <p>43</p> <input name="pr_size[]" type="checkbox" value="43"  >
           </div> -->
           <div class="pr_size d-flex align-items-center" style="gap: 15px;">
              <?php
              // foreach ($load_product_size as $size) {
              //   extract($size);
              //   $check = [];
              //   $ok = [];
              //   for ($i = 36; $i <= 42; $i++) {
              //     if ($pr_size == $check[$i]) {
              //       echo $ok[$i] = 'checked';
              //     } else {
              //       $ok[$i] = '';
              //     }
              //   }
              ?>
              <div class="">
              <p>36 <input name="pr_size[]" type="checkbox" value="36"></p>
              </div>
              <div class="">
                <p>37 <input name="pr_size[]" type="checkbox" value="37"></p>
              </div>
              <div class="">
                <p>38 <input name="pr_size[]" type="checkbox" value="38"></p>
              </div>
              <div class="">
                <p>39 <input name="pr_size[]" type="checkbox" value="39"></p>
              </div>
              <div class="">
                <p>40 <input name="pr_size[]" type="checkbox" value="40"></p>
              </div>
              <div class="">
                <p>41 <input name="pr_size[]" type="checkbox" value="41"></p>
              </div>
              <div class="">
                <p>42 <input name="pr_size[]" type="checkbox" value="42"></p>
              </div>
              <?php
              // }

              ?>
          </div>
          <div class="form-group">
            <label for="">Danh mục</label>
            <select name="categori_id" class="form-select" id="" required>
            <option value="0">Tất cả</option>
            <?php 
            foreach($result as $result){
                extract($result);
                echo '<option value="'.$categori_id.'">'.$categori_name.'</option>';
            }
            
            ?>
             
            </select>
          </div>
          
          <div class="form-group mt-3">
            <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="index.php?act=list_product"><input class="btn btn-primary" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>