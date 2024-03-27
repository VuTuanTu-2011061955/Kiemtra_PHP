<?php
/**
 * Lớp xử lý kết nối và truy vấn cơ sở dữ liệu
 */
class Db
{
    // biến kết nối CSDL
    protected static $connection;

    // hàm khởi tạo kết nối
    public function connect()
    {
        // kết nối tới CSDL trong trường hợp kết nối chưa được khởi tạo
        $config = parse_ini_file("config.ini");
        self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);

        // xử lý lỗi nếu không kết nối được tới CSDL    
        if (self::$connection->connect_error) {
            // Xử lý lỗi tại đây, ví dụ: ghi vào file log
            error_log("Database connection error: " . self::$connection->connect_error);
            return false;
        }
        
        return self::$connection;
    }

    //hàm thực hiện xử lý câu lệnh truy vấn
    public function query_execute($queryString)
    {
        // khởi tạo kết nối
        $connection = $this->connect();
        if (!$connection) {
            return false;
        }

        //thực hiện execute truy vấn
        $result = $connection->query($queryString);
        $connection->close();
        return $result;
    }

    //hàm thực hiện trở về một mảng danh sách kết quả
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result === false) {
            return false;
        }

        while ($item = $result->fetch_assoc()) { 
            $rows[] = $item;
        }
        return $rows;
    }
}
?>