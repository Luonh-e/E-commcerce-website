<?php
class Connection{
    private static $instance = null, $conn = null;
    
    private function __construct($config) {
        try {
            // dsn
            $dsn = 'mysql:dbname='.$config['db'].';host='.$config['host'];
            //cau hinh $options
            /*
            * cãu hinh utf8
            Cäu hinh ngoai le khi truy vän bi löi
            *
            */
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            
            // kết nối
            $con = new PDO($dsn, $config['user'], $config['pass'], $options);
            
            self::$conn = $con;
            } catch(Exception $exception) {
                echo "Không có kết nối với database";
            }
    }

    public static function getInstance($config) {
        if (self::$instance == null) {
            $connection = new Connection($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}
