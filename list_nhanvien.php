<label><h2>Danh sách nhân viên</h2></label>
<li>
        <a href="/KiemTraGK/add_nhanvien.php">Thêm nhân viên</a>
    </li>
<?php
require_once ('entities/nhanvien.class.php');
include_once ('header.php');



// Số lượng nhân viên trên mỗi trang
$soLuongNhanVienTrenTrang = 5;

// Lấy danh sách tất cả nhân viên
$nhanviens = NHANVIEN::list_nhanvien();

// Tính tổng số lượng nhân viên
$tongSoNhanVien = count($nhanviens);

// Tính tổng số lượng trang
$tongSoTrang = ceil($tongSoNhanVien / $soLuongNhanVienTrenTrang);

// Kiểm tra trang hiện tại
$trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;

// Xác định vị trí bắt đầu và kết thúc của danh sách nhân viên trên trang hiện tại
$viTriBatDau = ($trangHienTai - 1) * $soLuongNhanVienTrenTrang;
$viTriKetThuc = min($viTriBatDau + $soLuongNhanVienTrenTrang, $tongSoNhanVien);

echo "<table border=1 cellspacing=0 cellpading=0>";
echo "<tr><th><font color=#ff0000>Mã nhân viên</font></th><th><font color=#ff0000>Tên nhân viên</font></th><th><font color=#ff0000>Phái</font></th><th><font color=#ff0000>Nơi sinh</font></th><th><font color=#ff0000>Mã phòng</font></th><th><font color=#ff0000>Lương</font></th><th><font color=#ff0000>Sửa</font></th><th><font color=#ff0000>Xóa</font></th></tr>";

for ($i = $viTriBatDau; $i < $viTriKetThuc; $i++) {
    $item = $nhanviens[$i];
    echo "<tr>";
    echo "<td>" . $item["Ma_NV"] . "</td>";
    echo "<td>" . $item["Ten_NV"] . "</td>";
    echo "<td>";

    // Kiểm tra giá trị của phái từ dữ liệu thực của từng nhân viên
    if ($item["Phai"] == 'NAM') {
        echo "<img src='nam.png' width='50' height='50' />";
    } else {
        echo "<img src='nu.png' width='50' height='50' />";
    }

    echo "</td>";
    echo "<td>" . $item["Noi_Sinh"] . "</td>";
    echo "<td>" . $item["Ma_Phong"] . "</td>";
    echo "<td>" . $item["Luong"] . "</td>";
    echo "<td><form method='post' action='edit_nhanvien.php'>";
    echo "<input type='hidden' name='maNV' value='" . $item["Ma_NV"] . "' />";
    echo "<input type='submit' name='suaNV' value='Sửa' />";
    echo "</form></td>";
    echo "<td><form method='post' action='xoa_nhanvien.php'>";
    echo "<input type='hidden' name='maNV' value='" . $item["Ma_NV"] . "' />";
    echo "<input type='submit' name='xoaNV' value='Xóa' />";
    echo "</form></td>";
    echo "</tr>";
}

echo "</table>";

// Hiển thị phân trang
echo "<button>";
for ($page = 1; $page <= $tongSoTrang; $page++) {
    echo "<a href='?page=$page'>$page</a> ";
}
echo "</button>";

include_once ('footer.php');
?>
