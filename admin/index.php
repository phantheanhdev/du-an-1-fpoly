<?php
include '../model/PDO.php';
include 'header.php';
include '../model/comment.php';
include '../model/bill.php';
include '../model/categori.php';
include '../model/product.php';
include '../model/user.php';
include '../model/statistical.php';
//controller
if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
      //danhmuc
    case 'add_category': {
        if (isset($_POST['btn_add_categori'])) {
          extract($_POST);
          $data = [$categori_name];
          categori_add($data);
          echo '<p style="color: red">successful add</p>';
        }
        include './category/add_category.php';
        break;
      }
    case 'list_category':
      include "./category/list_categories.php";
      break;
    case 'delete_category':
      $categori_id = $_GET['categori_id'];
      categori_delete($categori_id);
      echo '<p style="color: red">successful delete</p>';
      include './category/list_categories.php';
      break;
    case 'update_category':
      $categori_id = $_GET['categori_id'];
      $categori_one = categori_one($categori_id);
      include "./category/update_category.php";
      break;
    case 'updatedm':
      if (isset($_POST['capnhat'])) {
        extract($_POST);
        $data = [
          $categori_name,
          $categori_id
        ];
        categori_update($data);
        echo '<script>
      alert("successful update");
              </script>';
      }
      include "./category/list_categories.php";
      break;
      // sản phẩm
    case 'add_product':
      if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $img = $_FILES['img']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['img']['name']);
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          //echo "Sorry, there was an error uploading your file.";
        }
        $mo_ta = $_POST['mo_ta'];
        $number_of_view = $_POST['number_of_view'];
        $categori_id = $_POST['categori_id'];
        insert_product($product_name, $price, $img, $mo_ta, $number_of_view, $categori_id);
        $thongbao = "Them thanh cong";
      }
      $result = categori_all();
      include './product/add_product.php';
      break;
    case 'list_product':
      if (isset($_POST['search_dm']) && ($_POST['search_dm'])) {
        $kyw = $_POST['kyw'];
        $categori_id = $_POST['categori_id'];
      } else {
        $kyw = '';
        $categori_id = 0;
      }
      $list_product = loadall_product($kyw, $categori_id);
      include "./product/list_product.php";
      break;
    case 'delete_pr':
      if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
        delete_product($_GET['product_id']);
      }
      $list_product = loadall_product("", 0);
      include "./product/list_product.php";
      break;
    case 'update_pr':
      if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
        $product_one = loadone_product($_GET['product_id']);
      }
      $result = categori_all();
      $load_product_size = load_product_size($_GET['product_id']);
      $list_size = loadall_size();
      include "./product/updatepr.php";
      break;
    case 'updatepr':
      if (isset($_POST['capnhatpr']) && ($_POST['capnhatpr'])) {
        $categori_id = $_POST['categori_id'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $img = $_FILES['img']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['img']['name']);
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          //echo "Sorry, there was an error uploading your file.";
        }
        $mo_ta = $_POST['mo_ta'];
        $number_of_view = $_POST['number_of_view'];
        update_product($product_id, $product_name, $price, $img, $mo_ta, $number_of_view, $categori_id);
        $thongbao = "Them thanh cong";
      }
      $result = categori_all();
      $list_size = loadall_size();
      $load_product_size = load_product_size($product_id);
      $list_product = loadall_product("", 0);
      include "./product/list_product.php";
      break;
      //account
    case 'list_account':
      $list_account = load_all_account();
      include "./account/list_account.php";
      break;

    case 'delete_account':
      if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
        delete_account($_GET['user_id']);
      }
      $list_account = load_all_account();
      include "./account/list_account.php";
      break;

    case 'update_account':
      if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
        $account = load_one_account($_GET['user_id']);
      }
      if (isset($_POST['update_account_one'])) {
        $username_update = $_POST['username'];
        $password_update = $_POST['password'];
        $email_update = $_POST['email'];
        $address_update = $_POST['address'];
        $phone_update = $_POST['phone'];
        $update_role = $_POST['role'];
        $id_update = $_POST['user_id'];
        if (!empty($_FILES['file']['name'])) {
          //file
          $upload_dir1 = "../upload/";
          $upload_file1 = $upload_dir1 . basename($_FILES['file']['name']);
          if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file1)) {
          }
        } else {
          $upload_file1 = '';
        }
        update_admin($username_update, $password_update, $upload_file1, $email_update,  $phone_update, $address_update, $update_role, $id_update);
        echo "<script>
                         window.location.href='index?act=list_account';
            </script>";
        // header("Location:index?act=list_account");
      }
      $list_account = load_all_account();
      include "./account/update_account_admin.php";
      break;
      //Bình luận
    case 'list_comment':
      $listbl = load_all_comment();
      include 'comment/list_comment.php';
      break;
    case 'delete_comment':
      if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
        delete_comment($id);
      }
      $listbl = load_all_comment();
      include 'comment/list_comment.php';
      break;
      //đơn hàng
    case 'list_bill':
      if (isset($_POST['search_bill']) && ($_POST['search_bill'])) {
        $kyw = $_POST['kyw'];
        $bill_id = $_POST['bill_id'];
      } else {
        $kyw = '';
        $bill_id = 0;
      }
      $listbill = load_all_bill($kyw, $bill_id);
      include './bill/list_bill.php';
      break;
    case 'update_bill':
      $id = $_GET['id'];
      $load_one_bill = load_one_bill($id);
      // var_dump($load_one_bill);
      include './bill/update_bill.php';
      break;
    case 'updatebill':
      if (isset($_POST['capnhat_bill'])) {
        $status = $_POST['bill_status'];
        $id = $_POST['id_bill'];
        update_bill($status, $id);
      }
      $listbill = load_all_bill();
      include './bill/list_bill.php';
      break;
    case 'delete_bill':
      if(isset($_GET['bill_id'])){
        $bill_id = $_GET['bill_id'];
        delete_bill($bill_id);  
      }
      $listbill = load_all_bill();
      include './bill/list_bill.php';
      break;
      // thống kê
    case 'chart':
      $listthongke=load_all_statistical();
      include './statistical/chart.php';
      break;
      // biểu đồ
    case 'list_statistical':
      $listthongke=load_all_statistical(); 
      include './statistical/list_statistical.php';
      break;
    case 'detail':
      echo "
      <script> alert('Chức năng đang phát triển')</script>
      ";
      $listbill = load_all_bill($kyw, $bill_id);
      include './bill/list_bill.php';
      break;
    default:
      include '../index.php';
      break;
  }
} else {
  include './category/list_categories.php';
}


include 'footer.php';
?>
