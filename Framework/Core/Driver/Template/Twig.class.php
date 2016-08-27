<?php
namespace Framework\Core\Driver\Template;

/**
 * Class Twig 使用 twig 模板引擎
 */
class Twig implements Template
{

    /**
     * @param string $file
     * @param mixed $data
     */
    public function display($file, $data = null)
    {
        // 使用 twig 模板引擎
        \Twig_Autoloader::register();
        $loader = new \Twig_Loader_Filesystem(dirname($file));
        $twig = new \Twig_Environment($loader, array(
            'cache' => C("TMPL_CACHEDIR"),// 缓存目录
            'debug' => DEBUG,
        ));

        $template = $twig->loadTemplate(basename($file));
        $template->display($data);
    }
}