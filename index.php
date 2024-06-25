<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
ob_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
include "model/user/cart.php";
include 'model/PDO.php';
include 'model/user/login.php';
include 'model/user/homepage.php';
include 'model/user/orders.php';
include 'mail/index.php';
include 'views/header.php';


if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case "home":
            $listsp = select_all_product();
            $listpk = select_all_phukien();
            include 'views/pages/home.php';
            break;
        case "deltailProduct":
            if (isset($_GET['id'])) {
                $id_product = $_GET['id'];
                $list_sp = select_one_sanpham($id_product);
                extract($list_sp);
                //$list_samekind = select_sp_samekind($id_product, $id_category);
                $list_samekind = select_sp_samekind($id_product);
            }
            include "views/pages/detailProduct.php";
            break;
        case 'register':
            $checkPassAndAcc = '/^[a-zA-Z0-9]{6,}$/';
            $checkEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            if (isset($_POST['btn-register'])) {
                $account = $_POST['account'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];
                if (empty($account) || empty($email) || empty($pass) || empty($repass)) {
                    $_SESSION['error'] = "Vui lòng điền thông tin.";
                } else {
                    if (!preg_match($checkEmail, $email)) {
                        $_SESSION['error'] = "Email không hợp lệ.";
                    } elseif (!preg_match($checkPassAndAcc, $account)) {
                        $_SESSION['error'] = "Tên tài khoản phải có ít nhất 6 kí tự.";
                    } elseif (!preg_match($checkPassAndAcc, $pass)) {
                        $_SESSION['error'] = "Mật khẩu phải có 6 kí tự.";
                    } else {
                        if ($pass == $repass) {
                            insert_account($account, $pass, $email);
                            header("location:index.php?act=login");
                        } else {
                            $_SESSION['error'] = "Mật khẩu không khớp.";
                        }
                    }
                }
            }
            include "views/login/register.php";
            break;
        case 'login':
            if (isset($_POST['btn-login'])) {
                $account = $_POST['account'];
                $pass = $_POST['password'];
                if (!empty($account) && !empty($pass)) {
                    $login = select_account($account, $pass);
                    if (is_array($login)) {
                        $_SESSION['account'] = $login;
                        header("location:index.php?act=home");
                        exit;
                    } else {
                        $_SESSION['error'] = "Thông tin đăng nhập không chính xác";
                    }
                } else {
                    $_SESSION['error'] = "Không được bỏ trống thông tin";
                }
            }
            include "views/login/login.php";
            break;
        case 'logout':
            if (isset($_SESSION['account'])) {
                unset($_SESSION['account']);
            }
            header("Location: $_SERVER[REQUEST_URI]");
            header("location:index.php?act=home");
            break;
        case 'forgotPassword':
            $checkEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            if (isset($_POST['btn-submit'])) {
                $account = $_POST['account'];
                $email = $_POST['email'];
                $code = substr(rand(0,999999),0,6);
                $content = "Mã xác nhận của bạn là: " .$code;
                $title = "Forgot PassWord";
                if(empty($account) || empty($email)){
                    $_SESSION['error'] = "Không được bỏ trống thông tin.";
                }else {
                    if (!preg_match($checkEmail,$email)){
                        $_SESSION['error'] = "Email không hợp lệ.";
                    }else {
                        sendMail($email, $title, $content);
                        $_SESSION['email'] = $email;
                        $_SESSION['code'] = $code;
                        $_SESSION['account_forgot'] = $account;
                        header("location:index.php?act=checkCode");
                    }
                }
            }
            include "views/login/forgotPass.php";
            break;
        case 'checkCode':
            $_SESSION['error'] = "Mã xác nhận đã được gửi vào email.";
            if(isset($_POST['check'])){
                $code = $_POST['code'];
                if(empty($code)){
                    $_SESSION['error'] = "Vui lòng nhập mã xác nhận.";
                }else {
                    if ($code == $_SESSION['code']) {
                        header("location:index.php?act=resetPass");
                        unset($_SESSION['code']);
                    }else{
                        $_SESSION['error'] = "Mã xác nhận không đúng.";
                    }
                }
            }
            include 'views/login/checkCode.php';
            break;
        case 'resetPass':
            $checkPassAndAcc = '/^[a-zA-Z0-9]{6,}$/';
            if(isset($_POST['btn-submit'])){
                $pass = $_POST['pass'];
                $repass = $_POST['newPass'];
                if(empty($pass) || empty($repass)){
                    $_SESSION['error'] = "Vui lòng nhập mật khẩu.";
                }else {
                    if (!preg_match($checkPassAndAcc,$pass)){
                        $_SESSION['error'] = "Mật khẩu mới phải từ 6 kí tự trở lên.";
                    }else {
                        if ($pass = $repass) {
                            reset_pass($repass, $_SESSION['account_forgot'], $_SESSION['email']);
                            unset($_SESSION['account_forgot']);
                            unset($_SESSION['email']);
                            $_SESSION['error'] = "Đổi mật khẩu thành công.";
                            echo "<script>
                                    setTimeout(function() {
                                        window.location.href = 'index.php?act=login';
                                    }, 2000);
                                </script>";
                        }else{
                            $_SESSION['error'] = "Mật khẩu không khớp.";
                        }
                    }
                }
            }
            include"views/login/resetPass.php";
            break;
        case 'changePassword':
            $checkPass = '/^[a-zA-Z0-9]{6,}$/';
            if(isset($_SESSION['account'])){
            if (isset($_POST['btn-submit'])) {

                $account = $_SESSION['account']['account'];
                $pass = $_POST['pass'];
                $newPass = $_POST['newPass'];
                if (empty($pass) || empty($newPass)){
                    $_SESSION['error'] = "Vui lòng điền thông tin.";
                }else{
                    if (!preg_match($checkPass,$newPass)){
                        $_SESSION['error'] = "Mật khẩu phải từ 6 kí tự trở lên.";
                    }else{
                        if ($pass == $_SESSION['account']['password']) {
                            change_pass($newPass, $_SESSION['account']['id_user']);
                            $_SESSION['account'] = select_account($account, $newPass);
                            $_SESSION['error'] = "Đổi mật khẩu thành công.";
                        } else {
                            $_SESSION['error'] = "Mật khẩu không chính xác.";
                        }
                    }
                }

            }
            include "views/login/changePass.php";
            }else{
                header("location:admin/views/error.php");
            }
            break;
        case 'updateInformation':
            $checkPhone = '/^(0|\+84)(3[2-9]|5[2689]|7[06789]|8[1-689]|9[0-9])[0-9]{7}$/';
            $checkEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            if(isset($_SESSION['account'])) {
                if (isset($_POST['btn-updateInfo'])) {
                    $id_user = $_POST['id_user'];
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img_user = $_FILES["img"]["name"];
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    }else{
                        $_SESSION['error'] = "Không thể upload ảnh";
                    }
                    $account = $_POST['account'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    if (empty($email)){
                        $_SESSION['error'] = "Không được bỏ trống email.";
                    }else{
                        if (!preg_match($checkEmail,$email)){
                            $_SESSION['error'] = "Email không hợp lệ.";
                        }elseif (!preg_match($checkPhone,$phone)) {
                            $_SESSION['error'] = "Số điện thoại không hợp lệ.";
                        }else{
                            update_user($id_user, $img_user, $pass, $name, $email, $phone, $address);
                            $_SESSION['account'] = select_account($account, $pass);
                            $_SESSION['error'] = "Cập nhật thành công.";
                        }

                    }
                }
                include "views/login/updateInformation.php";
            }else{
                header("location:admin/views/error.php");
            }
            break;
        case 'products':
            $list_sp = select_all_product();
            $list_category = select_all_danhmuc();
            include "views/pages/product.php";
            break;
        case 'addToCart':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ ajax đẩy lên
                $productId = $_POST['id_product'];
                $productName = $_POST['name_product'];
                $productPrice = $_POST['price'];
                $productImg = $_POST['img_product'];
                $idUser = $_SESSION['account']['id_user'];

                // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                $index = array_search($productId, array_column($_SESSION['cart'], 'id_product'));
                // array_column() trích xuất một cột từ mảng giỏ hàng và trả về một mảng chứ giá trị của cột id
                if ($index !== false) {
                    $_SESSION['cart'][$index]['quantity'] += 1;
                } else {
                    // Nếu sản phẩm chưa tồn tại thì thêm mới vào giỏ hàng
                    $product = [
                        'id_user' => $idUser,
                        'id_product' => $productId,
                        'name_product' => $productName,
                        'img_product' => $productImg,
                        'price' => $productPrice,
                        'quantity' => 1,
                    ];
                    $_SESSION['cart'][] = $product;
                }
                // Trả về số lượng sản phẩm của giỏ hàng
                echo count($_SESSION['cart']);
                header("location:index.php?act=cart");
            } else {
                echo 'Yêu cầu không hợp lệ';
            }
            break;
        case 'cart':
            if(empty($_SESSION['account'])){
                header("location:index.php?act=login");
            }else{
                if(isset($_POST['btn-orders'])){
                    if(isset($_SESSION['account'])){
                        if(!empty($_SESSION['cart'])){
                            header("location:index.php?act=order");
                        }
                    }else{
                        header("location:index.php?act=login");
                    }
                }

                if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];

                    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                    $productId = array_column($cart, 'id_product');

                    // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
                    $idList = implode(',', $productId);

                    // Lấy sản phẩm trong bảng sản phẩm theo id
                    $dataDb = loadProductCart($idList);
//                     var_dump($_SESSION['cart']);
                }
            }
            include "views/pages/cart.php";
            break;
        case 'updateQuantity':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ ajax đẩy lên
                $productId = $_POST['id_product'];
                $newQuantity = $_POST['quantity'];

                // Kiểm giỏ hàng có tồn tại hay không
                if (!empty($_SESSION['cart'])) {
                    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                    $index = array_search($productId, array_column($_SESSION['cart'], 'id_product'));

                    // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
                    if ($index !== false) {
                        $_SESSION['cart'][$index]['quantity'] = $newQuantity;
                    } else {
                        echo 'Sản phầm ko tồn tại trong giỏ hàng';
                    }
                }

            } else {
                echo 'Yêu cầu không hợp lệ';
            }
            break;
        case 'deleteProductInCart':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ ajax đẩy lên
                $productId = $_POST['id_product'];

                // Kiểm giỏ hàng có tồn tại hay không
                if (!empty($_SESSION['cart'])) {
                    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                    $index = array_search($productId, array_column($_SESSION['cart'], 'id_product'));

                    // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
                    if ($index !== false) {
                        // Xóa sản phẩm khỏi giỏ hàng
                        unset($_SESSION['cart'][$index]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                    } else {
                        echo 'Sản phầm ko tồn tại trong giỏ hàng';
                    }
                }

            } else {
                echo 'Yêu cầu không hợp lệ';
            }
            header("location:index.php?act=cart");
            break;

        case 'order':
            $checkPhone = '/^(0|\+84)(3[2-9]|5[2689]|7[06789]|8[1-689]|9[0-9])[0-9]{7}$/';
            $checkEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            if (isset($_SESSION['account']) && isset($_SESSION['cart'])){
            if(isset($_POST['btn-submit'])){
                $nameOrder = $_POST['name_order'];
                $phoneOrder = $_POST['phone_order'];
                $emailOrder = $_POST['email_order'];
                $addressOrder = $_POST['address_order'];
                $takeNode = $_POST['takeNode'];
                $codeOrders = rand(0,9999);
                $pay = $_POST['pay'];
                $idUser = $_SESSION['account']['id_user'];
                $total = $_POST['total'];
                $dateOrder = date("d/m/Y");
                $status = 1;
                if(empty($nameOrder) || empty($phoneOrder) || empty($emailOrder) || empty($addressOrder) || empty($total)) {
                    $_SESSION['error'] = "Không được để trống thông tin.";
                }elseif(!isset($pay)){
                    $_SESSION['error'] = "Vui lòng chọn phương thức thanh toán.";
                }else{
                    if(!preg_match($checkPhone,$phoneOrder)){
                        $_SESSION['error'] = "Số điện thoại không hợp lệ.";
                    }elseif (!preg_match($checkEmail,$emailOrder)){
                        $_SESSION['error'] = "Email không hợp lệ.";
                    }else {
                        insert_orders($codeOrders, $dateOrder, $pay, $status, $total, $nameOrder, $emailOrder, $phoneOrder, $addressOrder, $takeNode, $idUser);
                        foreach ($_SESSION['cart'] as $key => $cart) {
                                $idProduct = $cart['id_product'];
                                $quantity = $cart['quantity'];
                                $price = $cart['price'] * $quantity;
                                insert_orders_detail($codeOrders, $idProduct, $quantity, $price);
                                update_total($idProduct,$quantity);
                        }
                        unset($_SESSION['cart']);
                        header("location:index.php?act=myOrders&status=All");
                    }
                }
            }
                include "views/pages/order.php";
            }else{
                header("location:admin/views/error.php");
            }
            break;
        case 'resultSearch':
            if (isset($_POST['btn-search'])) {
                $search_sp = $_POST['search_sp'];
                $list_sp = search_sp($search_sp);
            }
            $list_dm = select_all_danhmuc();
            require_once 'views/pages/resultSearch.php';
            break;
        case 'category':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $list_sp = select_sp_by_dm($id);
            }
            $list_dm = select_all_danhmuc();
            require_once 'views/pages/category.php';
            break;
        case 'myOrders':
            if($_GET['status']){
                $id_status = $_GET['status'];
            }
            $listOrders = listOrders($id_status,$_SESSION['account']['id_user']);

            require_once 'views/pages/myOrders.php';
            break;
        case 'SuccessOrders':
            if(isset($_GET['id'])) {
                StatusSuccess($_GET['id']);
                header("location:index.php?act=myOrders&status=5");
            }
            break;
        case 'CanceledOrders':
            if(isset($_GET['id'])){
                StatusCancel($_GET['id']);
                header("location:index.php?act=myOrders&status=6");
            }
            break;
        case 'myOrdersDetail':
                $code_order= $_GET['codeOrder'];
                $lisProduct = OrdersDetail($code_order);
            require_once 'views/pages/myOrdersDetail.php';
    }
} else {
    $listsp = select_all_product();
    $listpk = select_all_phukien();
    include 'views/pages/home.php';
}
include 'views/footer.php';
?>

