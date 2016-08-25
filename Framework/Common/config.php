<?php
return array(
    // 配置项=>值

    // URL 模式
    'URL_MODE' => 'pathinfo', // 1 pathinfo, 2 普通url

    // 数据库配置
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => '127.0.0.1', // 数据库服务器地址
    'DB_PORT' => '3306', // 数据库端口
    'DB_DBNAME' => 'test', // 数据库名
    'DB_USERNAME' => 'root', // 用户名
    'DB_PASSWORD' => 'root', // 密码
    'DB_OPTIONS' => '', // PDO 的 options 选项

    // 日志配置
    'LOG_DRIVE' => 'file', // 日志存储方式, 值 file 以文件方式 , db 以数据库方式
    'LOG_DIR' => 'Application/Runtime/Log', // 文件方式存储时日志目录, 相对路径

    // 模板引擎
    'TMPL_TYPE' => 'twig', // 模板引擎类型 php, twig, smarty
    'TMPL_CACHEDIR' => 'Application/Runtime/Cache', // 缓存文件目录
);