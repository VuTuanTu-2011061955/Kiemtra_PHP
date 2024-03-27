<label><h2>Thêm nhân viên mới</h2></label>
<?php

require_once('entities/nhanvien.class.php');

if (isset($_POST['btnsubmit'])) {
    $nhanvienID = $_POST["txtnvID"];
    $nhanvienName = $_POST["txtnvName"];
    $phaiNV = $_POST["txtphai"];
    $noisinhNV = $_POST["txtnoisinh"];
    $maphongID = $_POST["txtphongID"];
    $luong = $_POST["txtluong"];
    

    $newNHANVIEN = new NHANVIEN($nhanvienID,$nhanvienName, $phaiNV, $noisinhNV, $maphongID, $luong);
    $result = $newNHANVIEN->save();
    if ($result) {
        header("Location: add_nhanvien.php?failure");
    }
    else {
        header("Location: add_nhanvien.php?inserted");
    }
}
?>

<?php
if (isset($_GET['inserted'])) {
    echo "<h2>Thêm nhân viên thành công</h2>";
}
?>


<form method="post">
    <div class="row">
        <div class="lbltitle">
            <label>Mã nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtnvID" value="<?php echo isset($_POST["txtnvID"]) ? $_POST["txtnvID"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label>Tên nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtnvName" value="<?php echo isset($_POST["txtnvName"]) ? $_POST["txtnvName"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label>Giới tính</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtphai" value="<?php echo isset($_POST["txtphai"]) ? $_POST["txtphai"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label>Nơi sinh</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtnoisinh" value="<?php echo isset($_POST["txtnoisinh"]) ? $_POST["txtnoisinh"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label>Mã phòng</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtphongID" value="<?php echo isset($_POST["txtphongID"]) ? $_POST["txtphongID"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label>Lương</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtluong" value="<?php echo isset($_POST["txtluong"]) ? $_POST["txtluong"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm nhân viên" />
        </div>
    </div>
</form>
<?php include_once('footer.php'); ?>