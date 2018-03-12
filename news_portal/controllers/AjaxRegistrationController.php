<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 16.11.2017
 * Time: 3:27
 */
class ajaxRegistrationController extends \controllers\ajaxController
{

    public function actionCheck_login(){
        if(isset($_POST['login']) && $_POST['login'] != ''){
            $login = $_POST['login'];
             $query=$this->pdo->query("SELECT COUNT(*) FROM Users WHERE login='$login'");
             $result=$query->fetch(\PDO::FETCH_ASSOC);
             if($result['COUNT(*)'] >= 1){
                 echo  "invalid";
             }else{
                 echo  "valid";
             }
         }
         die();
     }


     public function actionCheck_mail(){
         if(isset($_POST['mail']) && $_POST['mail'] != ''){
             $mail = $_POST['mail'];
             $query=$this->pdo->query("SELECT COUNT(*) FROM Users WHERE mail='$mail'");
             $result=$query->fetch(\PDO::FETCH_ASSOC);
             if($result['COUNT(*)'] >= 1){
                 echo  "invalid";
             }else{
                 echo  "valid";
             }
         }
         die();

     }






}