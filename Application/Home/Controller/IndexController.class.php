<?php
namespace Application\Home\Controller;

use Framework\Core\Model;
use Framework\Core\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $model = new Model();
        $sql = "show tables;";
        $result = $model->query($sql);
        $data = $result->fetchAll();

        $this->assign('data', $data);
        $this->display('User/edit');
    }
}