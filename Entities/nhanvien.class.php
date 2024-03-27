<?php // IDEA:
require_once('config/db.class.php');

class NHANVIEN 
{
    public $nhanvienID;
    public $nhanvienName;
    public $phaiNV;
    public $noisinhNV;
    public $maphongID;
    public $luong;

    public function __construct($nhanvien_id,$nv_name, $phai_nv, $noisinh, $maphong, $luong)
    {
        $this->nhanvienID = $nhanvien_id;
        $this->nhanvienName = $nv_name;
        $this->phaiNV = $phai_nv;
        $this->noisinhNV = $noisinh;
        $this->maphongID = $maphong;
        $this->luong = $luong;
    }

    public function save ()
    {
        $db = new Db();
        $sql = "INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES
        ('$this->nhanvienID' ,'$this->nhanvienName', '$this->phaiNV', '$this->noisinhNV', '$this->maphongID', '$this->luong')";

        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_nhanvien() {
        $db = new Db();
        $sql = "SELECT * FROM nhanvien";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>