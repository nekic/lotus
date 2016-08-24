<?php
namespace Framework\Core;

/**
 * Class Autoload
 * 自动加载类
 */
class Autoload
{
    public static function autoload()
    {
        spl_autoload_register(array(__CLASS__,load));
    }

    private function load($className) {
        // className = '\Framework\Core\Route'
        require_once str_replace('\\','/',$className) . 'class.php';
    }
}