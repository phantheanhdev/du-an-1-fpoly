<?php
session_start();
ob_start();
include 'model/PDO.php';
include './view/header.php';
include './model/user.php';
include './model/comment.php';
include './model/product.php';
include './model/bill.php';
// unset($_SESSION['mycart']);
// unset($_SESSION['fake_cart']);
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
$product_new = loadall_product_home();
$product_new2 = loadall_product_home2();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'contact';
            include './view/contact.php';
            break;
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $checkuser = checkuser($username, $password);
                if (is_array($checkuser)) {
                    $_SESSION['username'] = $checkuser;
                    header('Location:index.php');
                } else {
                    $thongbao = "tài khoản không tồn tại.";
                }
            }
            include './view/account/login.php';
            break;
        case 'logout':
            session_unset();
            header('Location: index.php');
            break;
        case 'edit_user':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $user_id = $_POST['user_id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $avatar = $_FILES['avatar']['name'];
                $target_dir = "../upload/";
                if (!empty($_FILES['avatar']['name'])) {
                    $target_file = $target_dir . basename($_FILES['avatar']['name']);
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                    }
                } else {
                    $target_file = '';
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                update_user($user_id, $username, $password, $target_file, $address, $phone, $email);
                $_SESSION['username'] = checkuser($username, $password);
                header('Location: index.php');
                $thongbao = "Cập Nhật Thành Công";
            }
            include "./view/account/edit_user.php";
            break;

        case 'registration':
            $list_user = load_all_account();
            if (isset($_POST['registration']) && ($_POST['registration'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $address = $_POST['address'];
                $avatar = $_FILES['avatar']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['avatar']['name']);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                insert_client_user($username, $password, $target_file, $address, $phone, $email);
                $thongbao = "Đăng ký thành công";
                header('Location:index.php?act=login');
            }

            include './view/account/registration.php';
            break;
        case 'forgot_password':
            if (isset($_POST['forgot_password']) && ($_POST['forgot_password'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $check_password = check_password($username, $email, $phone);
                if (is_array($check_password)) {
                    $thongbao = "mật khẩu của bạn là :" . $check_password['password'];
                } else {
                    $thongbao = "nhập thông tin không đúng";
                }
            }
            $list_user = load_all_account();
            include "./view/account/forgot_password.php";
            break;

        case 'cart':
            if (isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];
                $oneproduct = loadone_product($product_id);
                extract($oneproduct);
                $list_size = load_product_size($product_id);
                extract($list_size);
                $product_name = $oneproduct['product_name'];
                $price = $oneproduct['price'];
                $img = $oneproduct['img'];
                $soluong = $_POST['product_amount'];
                $item = [$product_id, $product_name, $price, $img, $soluong, $list_size];
                array_push($_SESSION['mycart'], $item);
                header('Location:index.php?act=cart');
            }
            include './view/cart.php';
            break;
        case 'delete_cart':
            # code...
            if (isset($_GET['cart_id'])) {
                array_splice($_SESSION['mycart'], $_GET['cart_id'], 1);
            } else {
                // $_SESSION['mycart'] = [];
            }
            header("Location:index.php?act=cart");
            break;
        case 'delete_checkout':
            # code...
            if (isset($_GET['cart_id'])) {
                array_splice($_SESSION['fake_cart'], $_GET['cart_id'], 1);
            }
            header("Location:index.php?act=checkout");
            break;
        case 'checkout':
            // unset($_SESSION['mycart']);
            if (!isset($_SESSION['fake_cart'])) $_SESSION['fake_cart'] = [];
            if (isset($_POST['fake_bill'])) {
                $product_id = $_POST['product_id'];
                $pr_name = $_POST['product_name'];
                $pr_price = $_POST['product_price'];
                $pr_img = $_POST['product_img'];
                $pr_size = $_POST['size_id'];
                if (isset($_POST['total_price'])) {
                    $total_cart = $_POST['total_price'];
                } else {
                    $total_cart = 0;
                }
                $product_amount = $_POST['product_amount'];
                $bill = [$product_id, $pr_name, $pr_price, $pr_img, $product_amount, $pr_size, $total_cart,];
                array_push($_SESSION['fake_cart'], $bill);
                // header('Location:index.php?act=checkout');
                // echo '<pre>';
                // echo print_r($_SESSION['fake_cart']);
            }

            include './view/checkout.php';
            break;
        case 'delete_all_checkout':
            unset($_SESSION['fake_cart']);
            include './view/home.php';
            break;
        case 'confirmation':
            extract($_SESSION['username']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d/m/Y');
            $total_bill = total_cart();
            if (isset($_POST['order_bill'])) {
                $pttt = $_POST['pttt'];
            }
            $id_bill = insert_bill($username, $email, $address, $phone, $total_bill, $pttt, 0, $user_id, $date);
            foreach ($_SESSION['fake_cart'] as $cart) {
                insert_cart($_SESSION['username']['user_id'], $cart[2], $cart[4], $cart[0], $cart[5], $id_bill, $cart[1]);
                // insert_cart($user_id, $price, $amount, $product_id, $size_id, $bill_id)
            }
            // echo '<pre>';
            // print_r($_SESSION['fake_cart']);
            // unset($_SESSION['mycart']);
            $bill = load_one_bill($id_bill);
            $bill_ct = list_cart($id_bill);
            include './view/confirmation.php';
            unset($_SESSION['fake_cart']);
            break;
        case 'mycart':
            $list_img_cart = list_img_cart($_SESSION['username']['user_id']);
            include './view/mycart.php';
            break;
        case 'detail':

            // echo '<pre>';
            // print_r($_SESSION['username']);
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                $oneproduct = loadone_product($product_id);
                extract($oneproduct);
                $product_cung_loai = load_product_cungloai($product_id, $categori_id);
                $list_size = load_product_size($product_id);
                $list_img_cart = list_img_cart($_SESSION['username']['user_id']);
                include './view/detail.php';
            } else {
                include './view/home.php';
            }
            
            break;
            // chi tiết sản phẩm 
        case 'man_pr':
            include './view/man_pr.php';
            break;
        case 'woman_pr':
            include './view/woman_pr.php';
            break;
        case 'search_pr':
            $text_search = $_POST['search_pr'];
            $list_pr_search = search_pr($text_search);
            include './view/search_pr.php';
            break;
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}
include './view/footer.php';
