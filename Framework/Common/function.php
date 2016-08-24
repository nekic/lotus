<?php
/**
 * 全局自定义函数
 */

function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } elseif (is_null($var)) {
        var_dump(null);
    } else {
        echo '<pre style="position: relative; z-index: 1000; padding: 10px; border-radius: 5px; background: #F5F5F5; border: 1px solid #aaa; font-size: 14px; line-height: 18px; opacity: 0.9">' . print_r($var,
                true) . '</pre>';
    }
}

/**
 * 获取配置文件值
 */
function C($configName)
{
    $configs = include __DIR__ . '/config.php';
    $configName = ucwords($configName);
    return isset($configs[$configName]) ? $configs[$configName] : null;
}

/**
 * 运行时动态定义常量
 */
function D(array $arr)
{
    foreach ($arr as $name => $value) {
        define(strtoupper($name), $value);
    }
}