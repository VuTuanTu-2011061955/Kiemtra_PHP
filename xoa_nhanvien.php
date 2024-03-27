<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "123", "ql_nhansu");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy mã nhân viên từ POST
if (isset($_POST['maNV'])) {
    $ma_nv = $conn->real_escape_string($_POST['maNV']);

    // Tạo câu lệnh SQL để xóa nhân viên
    $sql = "DELETE FROM NHANVIEN WHERE Ma_NV = '$ma_nv'";

    // Thực hiện câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Đóng kết nối
        $conn->close();

        // Chuyển hướng người dùng về trang danh sách nhân viên và reload lại trang
        echo '<script>alert("Nhân viên đã được xóa thành công."); window.location.href = "list_nhanvien.php";</script>';
        exit();
    } else {
        echo "Lỗi khi xóa nhân viên: " . $conn->error;
    }
} else {
    echo "Không có mã nhân viên nào được cung cấp để xóa.";
}

// Đóng kết nối
$conn->close();
?>