<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.11.2017
 * Time: 2:45
 */


use models\account\autorization;

class LogoutController extends \controllers\Controller
{
    public function actionIndex(){
        autorization::log_out();
        if ($_SERVER['HTTP_REFERER']==''){
            header("Location:../../autorization");
        }else{
            $current_url=$_SERVER['HTTP_REFERER'];
            header("Location:$current_url");
        }
        return true;



    }

}