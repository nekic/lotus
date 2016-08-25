<?php
namespace Framework\Core\Driver\Log;

/**
 * Class File
 * 文件日志驱动类
 */
class File implements LogDriver
{
    /**
     * @var string 日志路径
     */
    private $path;

    public function __construct()
    {
        $this->initPath();
    }

    /**
     * 写日志
     * @param $message 日志信息
     *
     */
    public function write($log)
    {
        $logTime = date('Y-m-d H:i:s');
        $log = "[{$logTime}] " . $log . PHP_EOL;
        // TODO: Implement write() method.
        file_put_contents($this->path, $log, FILE_APPEND);
    }

    /**
     * 初始化存储路径
     */
    private function initPath()
    {

        $path = C("LOG_DIR");
        // 是否指定日志目录
        if (!$path) {
            // 没有指定,使用默认目录
            $this->path = APP . '/Runtime/Log/systemLog.txt';
            return;
        }

        // 判断路径是否存在, 没有则自动创建
        $path = ltrim($path, '/');
        if (!is_dir($path)) {
            // 创建目录
            mkdir($path, 0777, true); // 递归创建
        }

        $this->path = ROOT . $path . '/systemLog.txt';
    }

}