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

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
  }


  .table1 thead tr th:nth-child(6) td {
    width: 200px;
    word-break: break-all;
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
</style>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Danh sách sản phẩm</h2>
        <form class="boloc" action="index.php?act=list_product" method="post">
          <div class="boloc2 form-group">
          <input type="text" name="kyw" style="height:2rem;border:1px solid black;border-radius:5px"placeholder="tìm kiếm" >
            <select style="width: 11rem;" class="form-select" name="categori_id" id="tt">
            <option value="0" selected>Tất cả</option>
              <?php 
             
            foreach($result as $result){
                extract($result);
               
                if($categori_id==$product_id) $s="selected"; else $s="";
                 echo '<option value=" '.$categori_id.'"'.$s.'>'.$categori_name.'</option>';
            }
            ?>
            </select>
            <button type="submit" class="btn btn-primary" name="search_dm" value="Search">Tìm kiếm</button>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>
                <th style="width: 9%;">#</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Image</th>
                <th>Mô tả</th>
                <th>Lượt xem</th>
                
                <th style="width: 22%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
            <?php
             foreach($list_product as $list_product){
                extract($list_product);
                $update_pr="index.php?act=update_pr&product_id=".$product_id;
                $delete_pr="index.php?act=delete_pr&product_id=".$product_id;
                $hinh="../upload/".$img;
                if(is_file($hinh)){
                   $anh="<img src='".$hinh." 'width='350px' height='100px'>";
                }else{
                    $anh="không có hình";
                }

           echo' <tr >
                          <td><input type="checkbox" name="" id=""></td>
                          <td>' . $product_id . '</td>
                          <td>' . $product_name . '</td>
                          <td>' . $price . '</td>
                          <td>' . $anh . '</td>
                          <td>' . $mo_ta . '</td>
                          <td>' . $number_of_view . '</td>
                          
                          <td class="btn1"><a href="' . $update_pr . '"><input class="btn btn-primary btn2" type="button" value="Sửa"></a><a href="' . $delete_pr . '" onclick="return confirm(`Bạn muốn xóa?`)"; id="delete"><input class="btn btn-danger btn2" type="button" value="Xóa"></a></td>
                        </tr>';
              }
              ?>
                 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="thaotac">
  <div class="">
    <a href="index.php?act=add_product"><input class="btn btn-primary" type="button" value="Thêm sản phẩm"></a>
  </div>
</div>