<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 06.11.2017
 * Time: 2:06
 */

namespace models\account;
class autorization
{
    public static function log_in($pdo,$login,$password){
        if(empty($login)){
            return 'Введите логин';
        }else if(empty($password)){
            return 'Введите пароль';
        }
        $hash_password=crypt($_POST['password'],"CRYPT_BLOWFISH ");
        $query=$pdo->query("SELECT* FROM users WHERE login='$login' and password='$hash_password'");
         if($query->rowCount()==1){
             $result=$query->fetch(\PDO::FETCH_ASSOC);
             $user=new user($result['User_id'],$result['name'], $result['Login'], $result['password'], $result['mail'], $result['email_confirm'], $result['status_user'], $result['Ban']);
             return $user;
         }else if($query->rowCount()==0){
                return "Неправильно введен логин или пароль";
         }else
             {
             return "Ошибка, обратитесь к администратору";
         }

    }
    public static function log_out(){
        session_destroy();
        setcookie('login',"",time()-1,'/');
        setcookie('password',"",time()-1,'/');
    }

    public static function check_autorization($pdo){
        if(isset($_SESSION['user'])){
            return self::check_session_autorization($pdo,$_SESSION['user']->getLogin(),$_SESSION['user']->getHashPassword());
        }else  if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
            $object=self::check_cookies_autorization($pdo,$_COOKIE['login'],$_COOKIE['password']);
            if(gettype($object)=='object'){
                $_SESSION['user']=$object;
                return true;
            }else{
                return false;
            }
        }

    }

    private static function check_session_autorization($pdo,$login,$hashpassword){
        $query=$pdo->query("SELECT* FROM users WHERE login='$login' and password='$hashpassword'");
        if($query->rowCount()==1){
            return true;
        }else{
            return false;
        }

    }
    private static function check_cookies_autorization($pdo,$login,$hashpassword){
        $query=$pdo->query("SELECT* FROM users WHERE login='$login' and password='$hashpassword'");
        if($query->rowCount()==1){
            $result=$query->fetch(\PDO::FETCH_ASSOC);
            $user=new user($result['User_id'],$result['name'], $result['Login'], $result['password'], $result['mail'], $result['email_confirm'], $result['status_user'], $result['Ban']);
            return $user;
        }else{
            return false;
        }

    }






}