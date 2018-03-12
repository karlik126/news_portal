<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 06.11.2017
 * Time: 16:13
 */

use models\account\autorization;


class AutorizationController extends \controllers\Controller
{
    public function ActionIndex(){
        $error='';
        if(!empty($_POST)){
            $object=autorization::log_in($this->pdo,$_POST['login'],$_POST['password']);
            if (gettype($object)=='object'){
                $_SESSION['user']=$object;
                setcookie('login',$object->getLogin(),time()+60*60*12,'/');
                setcookie('password',$object->getHashPassword(),time()+60*60*12,'/');
                header("Location:/../../account");
            }else if(gettype($object)=='string') {
                $error=$object;
            }
        }
        \views\autorization\AutorizationView::write($error);
        return true;

    }



}