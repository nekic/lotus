<?php
namespace Framework\Core;

/**
 * Class Route 路由类, 负责从 URL 提取模块、控制器和操作
 * 1. 读取配置文件,是否开启了隐藏index.php
 * 2. 根据 URL 模式提取分发参数
 * 3. 返回要请求的模块、控制器和方法
 */
class Route
{
    private $request = array();
    private $defaultModule;
    private $defaultController;
    private $defaultAction;

    /**
     * Route constructor. 根据 URL 模式调用对象的相应方法实现 模块 控制器 和 操作的提取
     */
    public function __construct()
    {
        // 初始化默认 mca
        $this->initDefaultMCA();

        // 根据 URL 模式调用对应方法
        switch (strtolower(C("URL_MODE"))) {
            case "normal":
            case "2":
                $this->normalUrl();
                break;
            default:
                $this->pathinfoUrl();
        }
    }

    /**
     * 初始化默认 mca
     */
    private function initDefaultMCA()
    {
        $this->defaultModule = C("DEFAULT_MODULE");
        $this->defaultController = C("DEFAULT_CONTROLLER");
        $this->defaultAction = C("DEFAULT_ACTION");
    }

    /**
     * URL 为 pathinfo 模式处理方法
     */
    private function pathinfoUrl()
    {
        $pathinfo = (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') ? trim($_SERVER['PATH_INFO'],
            '/') : null;

        $pathinfo = empty($pathinfo[0]) ? null : explode('/', $pathinfo);

        // 设置模块
        if (isset($pathinfo[0]) && !empty($pathinfo[0])) {
            $this->request['module'] = ucfirst($pathinfo[0]);
            unset($pathinfo[0]);

        } else {
            $this->request['module'] = $this->defaultModule;
        }

        // 设置控制器
        if (isset($pathinfo[1]) && !empty($pathinfo[1])) {
            $this->request['controller'] = ucfirst($pathinfo[1]);
            unset($pathinfo[1]);
        } else {
            $this->request['controller'] = $this->defaultController;
        }

        // 设置操作
        if (isset($pathinfo[2]) && !empty($pathinfo[2])) {
            $this->request['action'] = strtolower($pathinfo[2]);
            unset($pathinfo[2]);
        } else {
            $this->request['action'] = $this->defaultAction;
        }

        // 设置 GET 参数
        if ($len = count($pathinfo)) {
            for ($i = 1; $i <= $len; $i += 2) {
                $_GET[$pathinfo[2 + $i]] = isset($pathinfo[2 + $i + 1]) ? $pathinfo[2 + $i + 1] : null;
            }
        }// end if
    }

    /**
     * @return array 返回分发参数 mca
     */
    public function getRequest()
    {
        return $this->request;
    }
}