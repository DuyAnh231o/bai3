<?php
session_start(); // luôn phải gọi đầu tiên

// Danh sách sản phẩm (hardcode)
$products = [
    1 => "Sản phẩm A",
    2 => "Sản phẩm B",
    3 => "Sản phẩm C",
    4 => "Sản phẩm D"
];

// Nếu chưa có giỏ hàng thì khởi tạo mảng rỗng
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Khi bấm "Thêm vào giỏ"
if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    // Chỉ thêm nếu ID tồn tại trong danh sách sản phẩm
    if (array_key_exists($id, $products)) {
        $_SESSION['cart'][] = $id;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Giỏ hàng đơn giản</title></head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <ul>
        <?php foreach ($products as $id => $name): ?>
            <li>
                <?php echo $name; ?>
                <a href="?add=<?php echo $id; ?>">Thêm vào giỏ</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Giỏ hàng của bạn</h2>
    <?php
    if (!empty($_SESSION['cart'])) {
        echo "<ul>";
        foreach ($_SESSION['cart'] as $item_id) {
            echo "<li>ID: $item_id - " . $products[$item_id] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Giỏ hàng trống</p>";
    }
    ?>
</body>
</html>
