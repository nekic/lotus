<?php
namespace Framework\Core;

/**
 * Class Route
 * 路由类
 */
class Route
{
    private $request = array();

    public function __construct()
    {
        /**
         * 1. 读取配置文件,是否开启了隐藏index.php
         * 2. 是否为pathinfo 格式
         * 3. 返回对应的控制器和方法
         */
        // 判断 URL 模式
        switch (strtolower(C("URL_MODE"))) {
            case "normal":
            case "2":
                $this->normalUrl();
                break;
            default:
                $this->pathinfoUrl();
        }

    }

    private function pathinfoUrl()
    {
        $pathinfo = (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') ? trim($_SERVER['PATH_INFO'], '/') : null;

        $pathinfo = empty($pathinfo[0]) ? null : explode('/', $pathinfo);

        // 设置模块
        if (isset($pathinfo[0]) && !empty($pathinfo[0])) {
            $this->request['module'] = ucfirst($pathinfo[0]);
            unset($pathinfo[0]);

        } else {
            $this->request['module'] = "Home";
        }

        // 设置控制器
        if(isset($pathinfo[1]) && !empty($pathinfo[1])) {
            $this->request['controller'] = ucfirst($pathinfo[1]);
            unset($pathinfo[1]);
        } else {
            $this->request['controller'] = "Index";
        }

        // 设置动作
        if(isset($pathinfo[2]) && !empty($pathinfo[2])) {
            $this->request['action'] = strtolower($pathinfo[2]);
            unset($pathinfo[2]);
        }else {
            $this->request['action'] = 'index';
        }

        // 设置 GET 参数
        if($len = count($pathinfo)) {
                for($i = 1; $i <= $len; $i += 2) {
                    $_GET[$pathinfo[2+$i]] = isset($pathinfo[2+$i+1]) ? $pathinfo[2+$i+1] : null;
                }
        }// end if
    }

    public function getRequest() {
        return $this->request;
    }
}