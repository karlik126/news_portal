<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 06.11.2017
 * Time: 21:46
 */
use models\account;
class AccountController extends \controllers\AccController
{


    public function actionIndex(){
        echo $_SESSION['user']->getUserId();
        return true;
    }

}