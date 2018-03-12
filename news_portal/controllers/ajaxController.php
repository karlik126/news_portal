<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 17.11.2017
 * Time: 2:12
 */

namespace controllers;


class ajaxController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if($_SERVER['REQUEST_METHOD']!="POST"){
            header("Location:../../../NotFound404");
        }

    }

}