<?php
/**
 * 全局函数
 */

/**
 * 输出某个变量信息, 只是美化了输出界面
 * @param mixed $var 要输出的变量
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
 * 获取配置项的值
 * @param string $configName 要获取配置项的名称, 大小写不敏感
 */
function C($configName)
{
    $configs = include __DIR__ . '/config.php';
    $configName = strtoupper($configName);
    return isset($configs[$configName]) ? $configs[$configName] : null;
}

/**
 * 程序启动后根据环境动态定义常量
 * @param  array $arr 格式为 "常量名"=>"值" 对, 支持二维数组形式
 *
 */
function D(array $arrs)
{
    if(empty($arrs)) {
        return false;
    }

    if(isset($arrs[0])) { // 二维
        foreach ($arrs as $arr) {
            foreach ($arr as $name => $value) {
                define(strtoupper($name), $value);
            }
        }
        return;
    }

    foreach ($arrs as $name => $value) {
        define(strtoupper($name), $value);
    }
}