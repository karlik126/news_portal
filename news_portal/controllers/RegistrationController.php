<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 02.11.2017
 * Time: 21:17
 */
use models\registration\Registration;
use models\registration\success_registration;
class RegistrationController extends \controllers\Controller
{
   public function actionIndex(){
       $error=array();
       if(!empty($_POST)){
           $registration=new Registration();
           foreach($_POST as $key=>$value){
               $_POST["$key"]=trim($_POST["$key"]);
           }
           $error=$registration->check_registration($this->pdo,$_POST['login'],$_POST['name'],$_POST['password'],$_POST['password_confirm'],$_POST['mail']);
           if(empty($error)){
               $success=new success_registration();
               $error[]=$success->success_registration($this->pdo,$_POST['login'],$_POST['name'],$_POST['password'],$_POST['mail']);
               return true;
           }

       }
       \views\registration\registration_form::write($error);//форма

       return true;
   }




}