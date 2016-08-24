<?php
namespace Framework;

/**
 * Class Framework
 * 框架启动类
 */
class Framework
{
    /**
     * 启动框架
     */
    public static function run()
    {
        // 自动加载
        self::autoload();
    }

    public static function autoload()
    {
        spl_autoload_register(array(__CLASS__, 'load'));
    }

    /**
     * 加载函数
     * @param $className 加载的类名
     */
    private static function load($className)
    {
        // className = '\Framework\Core\Route'
        $file = ROOT . str_replace('\\', '/', $className) . '.class.php';
        if (is_file($file)) {
            include $file;
        }
    }
}