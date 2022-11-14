<?php
include '../model/PDO.php';
include 'header.php';
include '../model/comment.php';
include '../model/bill.php';
include '../model/categori.php';
include '../model/product.php';
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
        // header('Location: admin/product/list_product.php');
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
      $result = categori_all();
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
    // case 'update_pr':
    //   if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
    //     $product_one = loadone_product($_GET['product_id']);
    //   }
    //   $result = categori_all();
    //   $list_size = loadall_size();
    //   include "./product/updatepr.php";
    //   break;
    // case 'updatepr':
    //   if (isset($_POST['capnhatpr']) && ($_POST['capnhatpr'])) {
    //     $categori_id = $_POST['categori_id'];
    //     $product_id = $_POST['product_id'];
    //     $product_name = $_POST['product_name'];
    //     $price = $_POST['price'];
    //     $img = $_FILES['img']['name'];
    //     $target_dir = "../upload/";
    //     $target_file = $target_dir . basename($_FILES['img']['name']);
    //     if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
    //       // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    //     } else {
    //       //echo "Sorry, there was an error uploading your file.";
    //     }
    //     $mo_ta = $_POST['mo_ta'];
    //     $number_of_view = $_POST['number_of_view'];

    //     update_product($product_id, $product_name, $price, $img, $mo_ta, $number_of_view, $categori_id);
    //     $thongbao = "Them thanh cong";
    //   }
    //   $result = categori_all();
    //   $list_size = loadall_size();
    //   $list_product = loadall_product("", 0);
    //   $load_product_size=load_product_size($product_id);
    //   include "./product/list_product.php";
    //   break;
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

    case 'list_account':
      include "./account/list_account.php";
      break;

    case 'delete_account':
      include "./account/list_account.php";
      break;

    case 'update_account':
      include "./account/update_account_admin.php";
      break;
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
    case 'list_bill':
      $load_all_bill = load_all_bill();
      include './bill/list_bill.php';
      break;
    case 'delete_bill':
      if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
        delete_bill($id);
        echo '<script>
        alert("successful Delete");
    </script>';
      }
      $load_all_bill = load_all_bill();
      include "./bill/list_bill.php";
      break;
    case 'update_bill':
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
      }
      include './bill/update_bill.php';
      break;
    case 'updatebill':
      if (isset($_POST['capnhat_bill'])) {
        $id = $_GET['id'];
        $status = $_POST['bill_status'];
        echo "mệt";
      }
      $load_all_bill = load_all_bill();
      include './bill/list_bill.php';
      break;
    case 'chart':
      include './statistical/chart.php';
      break;

    case 'statistical':
      include './statistical/list_statistical.php';
      break;
      // case 'logout':
      //   unset($_SESSION['username']);
      //   include 'index.php';
      //   break;
    default:
      include '../view/index.php';
      break;
  }
} else {
  include './category/list_categories.php';
}


include 'footer.php';
