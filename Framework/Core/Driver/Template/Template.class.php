<?php
namespace Framework\Core\Driver\Template;

/**
 * Interface Template 模板引擎公共接口
 */
interface Template
{
    /**
     * @param string $file 要是显示的视图文件
     * @param mixed $data 要 assign 的数据
     */
    public function display($file,$data=null);
}