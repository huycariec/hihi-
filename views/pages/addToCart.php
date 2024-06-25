<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $productId = $_POST['id_product'];
    $productName = $_POST['name_product'];
    $productPrice = $_POST['price'];
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
            'price' => $productPrice,
            'quantity' => 1,
        ];
        $_SESSION['cart'][] = $product;
    }
    // Trả về số lượng sản phẩm của giỏ hàng
//                echo count($_SESSION['cart']);
} else {
    echo 'Yêu cầu không hợp lệ';
}