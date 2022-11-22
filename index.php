<?php
session_start();
ob_start();
include 'model/PDO.php';
include './view/header.php';
include './model/user.php';
include './model/comment.php';
include './model/product.php';

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
                    header('Location: index.php');
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
                $target_dir = "./upload/";
                if (!empty($_FILES['avatar']['name'])) {
                    $target_file = $target_dir . basename($_FILES['avatar']['name']);
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                    }
                } else {
                    $target_file = '';
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                update_user_dk($user_id, $username, $password, $target_file, $address, $phone, $email, $role);
                $_SESSION['username'] = checkuser($username, $password);
                header('Location: index.php');
                $thongbao = "Cập Nhật Thành Công";
            }
            include "./view/account/edit_user.php";
            break;

        case 'registration':
            if (isset($_POST['registration']) && ($_POST['registration'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $address = $_POST['address'];
                $avatar = $_FILES['avatar']['name'];
                $target_dir = "./upload/";
                $target_file = $target_dir . basename($_FILES['avatar']['name']);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                if ($password == $password2) {
                    insert_client_user($username, $password, $target_file, $address, $phone, $email);
                    $thongbao = "Đăng ký thành công";
                    header('Location:index.php?act=login');
                } else {
                    $thongbao = "mật khẩu không trùng khớp";
                }
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
                $product_name = $oneproduct['product_name'];
                $price = $oneproduct['price'];
                $img = $oneproduct['img'];
                $soluong = 1;
                $size = [$size_id, $pr_size];
                $item = [$product_id, $product_name, $price, $img, $soluong, $list_size];
                array_push($_SESSION['mycart'], $item);

                header('Location:index.php?act=cart');
            }

            include './view/cart.php';
            break;
        case 'checkout':
            include './view/checkout.php';
            break;
        case 'confirmation':

            include './view/confirmation.php';
            break;
        case 'mycart':
            // đơn hàng của tôi
            include './view/mycart.php';
            break;
        case 'detail':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                $oneproduct = loadone_product($product_id);
                extract($oneproduct);
                $product_cung_loai = load_product_cungloai($product_id, $categori_id);
                $list_size = load_product_size($product_id);

                include './view/detail.php';
            } else {
                include './view/home.php';
            }
            break;
            // chi tiết sản phẩm 
        case 'delete_cart':
            # code...
            if (isset($_GET['cart_id'])) {
                array_splice($_SESSION['mycart'], $_GET['cart_id'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header("Location:index.php?act=cart");
            break;
        case 'man_pr':
            include './view/man_pr.php';
            break;
        case 'woman_pr':
            include './view/woman_pr.php';
            break;
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}
include './view/footer.php';
