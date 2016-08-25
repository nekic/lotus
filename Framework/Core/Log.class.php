<?php
namespace Framework\Core;

/**
 * Class Log
 * 日志类
 */
class Log
{
    private $driver;
    /**
     * 1. 确定日志存储方式
     * 2. 使用对应驱动存储日志
     */
    public function __construct()
    {
        $this->initDriver();
    }

    /**
     * 初始化日志驱动
     */
    private function initDriver()
    {
        // 默认为 file 类型
        $driver = empty(C("LOG_DRIVE")) ? 'file' : strtolower(C("LOG_DRIVE"));

        switch ($driver) {
            case 'db':
                $this->driver = new \Framework\Core\Driver\Log\Db();
                break;
            default:
                $this->driver = new \Framework\Core\Driver\Log\File();
        }
    }

    public function getDriver()
    {
        return $this->driver;
    }


}