<?php
namespace controllers;
class Controller
{
    protected $pdo;
    public function __construct()
    {
        $this->pdo=require dirname(__FILE__).'/../config/PDO_config.php';

    }



}