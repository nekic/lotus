<?php
namespace Application\Home\Controller;

use Framework\Core\Model;

class IndexController
{
    public function index()
    {
        $model = new Model();
        $sql = "show tables;";
        $result = $model->query($sql);
        print_r($result->fetchAll());
    }
}