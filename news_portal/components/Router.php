<?php
namespace components;
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 15.10.2017
 * Time: 22:29
 */
class Router
{
    private $routes;
    public function __construct(){
        $routersPath=dirname(__FILE__).'/../config/routes.php';
        $this->routes=require($routersPath);
    }
    private function getURI(){     //return  REQUEST string
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    public function run(){
        $uri=$this->getURI();
        $uri_arr=explode('?',$uri);
        $uri=$uri_arr[0];
        foreach($this->routes as $uriPattern => $path){
            if (preg_match("~$uriPattern~",$uri)){
                $internalRoute=preg_replace("~$uriPattern~",$path,$uri); // нащ полный запрос
                $segment=explode('/',$internalRoute); // Разбивание $path на массив $segment
                $ControllerName=array_shift($segment)."Controller";
                  $ControllerName=ucfirst($ControllerName); //
                  $actionName='action'.ucfirst(array_shift($segment));
                  //-----------------------------
                //  получение Comtroller и action
                //-------------------------------
                $paramets_for_function=$segment; // параметры для функции
                $controllerFile=dirname(__FILE__).'/../controllers/'.$ControllerName.'.php';
                if (file_exists($controllerFile)){
                     require_once $controllerFile;
                    $controller=new $ControllerName();
                    $action=call_user_func_array(array($controller,$actionName),$paramets_for_function);
                    if ($action==true){
                        return true;
                    }
                }
            }
        }
        header("Location:../../../NotFound404");
    }
}