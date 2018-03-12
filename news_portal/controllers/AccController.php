<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.11.2017
 * Time: 0:34
 */

namespace controllers;
use models\account;

class AccController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!account\autorization::check_autorization($this->pdo)){
            header("Location:../../autorization");
        }
    }


}