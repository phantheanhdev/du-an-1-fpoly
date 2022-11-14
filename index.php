<?php
session_start();
ob_start();
include 'model/PDO.php';
include './view/header.php';
include './model/user.php';
include './model/comment.php';
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
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['avatar']['name']);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                update_user_dk($user_id, $username, $password, $avatar, $address, $phone, $email);
                $_SESSION['username'] = checkuser($username, $password);
                header('Location: index.php?act=edit_user');
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
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['avatar']['name']);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                if ($password == $password2) {
                    insert_client_user($username, $password, $avatar, $address, $phone, $email);
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
            include "./view/account/forgot_password.php";
            break;
        
           
        case 'cart':
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
        case'detail':
            // chi tiết sản phẩm 
            include './view/detail.php';
            break;
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}
include './view/footer.php';
