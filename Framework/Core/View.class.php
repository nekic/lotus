<?php
namespace Framework\Core;

/**
 * Class View
 * 根据配置初始模板引擎
 */
class View{

    private $engineType;
    private $engine;

    public function __construct(){
        $this->engineType = C("TMPL_TYPE");
    }

    /**
     * 根据配置文件初始化相对应的模板引擎
     */
    private function initEngine()
    {
        switch (strtolower($this->engineType)) {
            case 'twig':
                $this->engine = new \Framework\Core\Driver\Template\Twig();
                break;
            case 'smarty':
                $this->engine = new \Framework\Core\Driver\Template\Smarty();
                break;
            case 'php':
                $this->engine = new \Framework\Core\Driver\Template\PhpEngine();
                break;
            default:
                throw new \Exception("未知的模板引擎!" . $this->engineType);
        }
    }

    public function display($file, $data)
    {
        $this->initEngine();
        $this->engine->display($file, $data);
    }
}