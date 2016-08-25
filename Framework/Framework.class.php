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
        // 分发
        self::despatch();
    }


    /**
     * 注册自动加载
     */
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
        } else {
            throw new \Exception("需要加载的文件没有找到" . $file);
        }

    }

    /**
     * 加载控制器以及执行操作
     */
    private static function despatch()
    {
        $route = new \Framework\Core\Route();
        $requst = $route->getRequest();
        // 定义模块、控制器、操作常量
        D($requst);
        // 组织 控制器名
        $controllerName = '\\Application\\' . $requst['module'] . '\\Controller\\' . $requst['controller'] . 'Controller';
        $controller = new $controllerName();
        $controller->$requst['action']();
    }
}