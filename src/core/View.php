<?php

namespace app\core;


class View
{
    public function generate($viewName, $data = null, $baseView = null)
    {
        if ($baseView){
            include $_SERVER['DOCUMENT_ROOT']."/views/".$baseView.".php";
        }
        include $_SERVER['DOCUMENT_ROOT']."/views/".$viewName.".php";
    }
}
