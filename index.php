<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__). DS );
define('FRAMEWORK', ROOT . 'Framework' . DS);
define('COMMON', FRAMEWORK . 'Common' . DS);
define('APP', ROOT . 'Application' . DS);

// 是否开启调试模式
define('DEBUG', true);

if (DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

// 加载函数库
include_once COMMON . 'function.php';

// 加载框架启动类
require_once FRAMEWORK . 'Framework.class.php';

// 启动框架
\Framework\Framework::run();

(new \Framework\Core\Route())->run();