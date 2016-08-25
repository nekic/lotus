<?php
namespace Framework\Core;

/**
 * Class Model
 * 基础模型类
 */
class Model extends \medoo
{

    public function __construct()
    {
        $config = array(
            'database_type' => C("DB_TYPE"),
            'database_name' => C('DB_DBNAME'),
            'server' => C('DB_HOST'),
            'username' => C("DB_USERNAME"),
            'password' => C("DB_PASSWORD"),
            'charset' => C("DB_CHARSET")
        );

        parent::__construct($config);
    }
}