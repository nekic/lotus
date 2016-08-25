<?php
namespace Framework\Core\Driver\Log;

/**
 * Interface LogDriver
 * 日志存储驱动接口
 */
interface LogDriver
{
    public function write($log);

}