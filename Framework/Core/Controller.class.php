<?php
namespace Framework\Core;

/**
 * Class Controller
 * 基础控制器类
 */
class Controller
{
    /**
     * @var array 要想页面赋值的变量
     */
    private $assignData = array();
    /**
     * @var string 视图文件名称,不包含目录名
     */
    private $fileName;
    /**
     * @var string 视图文件目录
     */
    private $viewDir;

    /**
     * 显示视图
     * @param string $file
     *
     */
    public function display($file='')
    {
        // 获取当前视图目录及文件名称

        if(empty($file)){
            // 使用默认视图
            $this->fileName = ACTION . '.html';
            $this->viewDir = APP . MODULE . DS . 'View' . DS .CONTROLLER;
        } else {
            // 使用指定视图
            $view = explode('/', $file);
            switch (count($view)) {
                case 1:
                    // 当前控制器下的视图
                    $this->viewDir = APP . MODULE . DS . 'View' . DS .CONTROLLER;
                    $this->fileName =  $view[0] . '.html';
                    break;
                case 2:
                    // 当前模块其他控制器下的视图
                    $this->viewDir = APP . MODULE . DS . 'View' . DS . $view[0];
                    $this->fileName =  $view[1] . '.html';
                    break;
                case 3:
                    // 其他模块其他控制器下的视图
                    $this->viewDir = APP . $view[0] . DS . 'View' . DS . $view[1];
                    $this->fileName = $view[2] . '.html';
                    break;
            }
        }

        // 使用 twig 模板引擎

        \Twig_Autoloader::register();
        $loader = new \Twig_Loader_Filesystem($this->viewDir);
        $twig = new \Twig_Environment($loader, array(
            'cache' => C("TMPL_CACHEDIR"),// 缓存目录
            'debug' => DEBUG,
        ));

        $template = $twig->loadTemplate($this->fileName);
        $template->display($this->assignData);
//        extract($this->assignData);
//
//        include $file;
    }

    /**
     * 向页面分配变量
     * @param string $name
     * @param $value
     */
    public function assign($name=null, $value=null)
    {
        if(empty($name)) {
            array_push($this->assignData,$value);
        } else {
            $this->assignData[$name] = $value;
        }

    }

}