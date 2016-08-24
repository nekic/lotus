<?php
namespace Framework\Core;

/**
 * Class Model
 * 基础模型类
 */
class Model extends \PDO
{

    public function __construct()
    {
        $dsn = "mysql:host=" . C('DB_HOST') .";dbname=" . C('DB_DBNAME');
        $username = C('DB_USERNAME');
        $passwd = C('DB_PASSWORD');
        $options = array();
        try{
            parent::__construct($dsn, $username, $passwd, $options);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}