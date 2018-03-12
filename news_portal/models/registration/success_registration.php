<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 03.11.2017
 * Time: 16:35
 */

namespace models\registration;


use models\account\user;

class success_registration
{
    public function success_registration($pdo,$login,$name,$password,$mail){
        $ip=$_SERVER['REMOTE_ADDR'];
        $password=crypt($password,"CRYPT_BLOWFISH ");
        try{
            $pdo->query("INSERT INTO Users (Login,name,password,mail,ip) VALUES ('$login','$name','$password','$mail','$ip')");
        }catch(PDOExecption $e){
            return "Произошла ошибка, попробуйте зарегестрироваться еще раз или обратитесь к администратору";
        }
        setcookie('login',$login,time()+60*60*12,'/');
        setcookie('password',$password,time()+60*60*12,'/');
        $_SESSION['user']=$user=new user($pdo->lastInsertId() ,$name, $login, $password, $mail, 'no', 'user', 'no');
        header("Location:/registration/success-registration");

    }


}