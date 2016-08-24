<?php
namespace Framework\Core;

/**
 * Class Controller
 * 基础控制器类
 */
class Controller
{
    private $assignData = array();

    /**
     * 显示视图
     * @param string $file
     *
     */
    public function display($file='')
    {
        if(empty($file)){
            // 使用默认视图
            $file = APP . MODULE . DS . 'View' . DS .CONTROLLER . DS . ACTION . '.html';
        } else {
            // 使用指定视图
            $view = explode('/', $file);
            switch (count($view)) {
                case 1:
                    // 当前控制器下的视图
                    $file = APP . MODULE . DS . 'View' . DS .CONTROLLER . DS . $view[0] . '.html';
                    break;
                case 2:
                    // 当前模块其他控制器下的视图
                    $file = APP . MODULE . DS . 'View' . DS . $view[0] . DS . $view[1] . '.html';
                    break;
                case 2:
                    // 其他模块其他控制器下的视图
                    $file = APP . $view[0] . DS . 'View' . DS . $view[1] . DS . $view[2] . '.html';
                    break;
            }
        }

        extract($this->assignData);

        include $file;
    }

    /**
     * 向页面分配变量
     * @param string $name
     * @param $value
     */
    public function assign($name='', $value)
    {
        if(empty($name)) {
            array_push($this->assignData,$value);
        } else {
            $this->assignData[$name] = $value;
        }

    }

}