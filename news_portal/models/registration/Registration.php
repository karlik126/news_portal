<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 04.11.2017
 * Time: 22:05
 */

namespace models\registration;


class Registration
{
    public  function check_registration($pdo,$login,$name,$password,$password_confirm,$mail){
        $error=array();
        $query=$pdo->query("SELECT name,login,mail FROM users WHERE name='$name' OR login='$login' OR mail='$mail'");
        if($query->rowCount()!=0){
            while($result=$query->fetch(\PDO::FETCH_BOTH)){
                if($result['login']==$login){
                    $error[]='Пользователь с таким логином уже существует';
                }
                if($result['name']==$name){
                    $error[]='Пользователь с таким именем уже существует';
                }
                if($result['mail']==$mail){
                    $error[]='Пользователь с таким эмейлом уже существует';
                }
            }
        }
        if(empty($login)){
            $error[]='Введите логин';
        }else if(!preg_match("|^[A-Za-z0-9._-]{6,30}$|",$login)){
            $error[]="Логин может содержать только большие и маленькие буквы латинского алфавтьа,точки,тире,цифры и нижнее подчеркивания, и содержать от 6 до 30 символов";
        }
        if(empty($name)){
            $error[]='Введите имя';
        }else if(!preg_match("|^[A-Za-z0-9-_]{4,30}$|",$name)){
            $error[]="Имя может содержать только большие и маленькие буквы латинского алфавита,цифры,тире и нижнее подчеркивания, и содержать от 4 до 30 символов";
        }
        if(empty($password)){
            $error[]='Введите пароль';
        } else  if(!preg_match("|^[A-Za-z0-9-_]{6,30}$|",$password)){
            $error[]="Пароль может содержать только большие и маленькие буквы латинского алфавита,цифры,тире и нижнее подчеркивания, и содержать от 6 до 30 символов";
        }
        if(empty($password_confirm)){
            $error[]='Введите пароль повторно';
        } else  if(!preg_match("|^[A-Za-z0-9-_]{6,30}$|",$password_confirm)){
            $error[]="Повторный пароль может содержать только большие и маленькие буквы латинского алфавита,цифры,тире и нижнее подчеркивания, и содержать от 6 до 30 символов";
        }
        if(empty($mail)){
            $error[]='Введите эмейл';
        }else if(!preg_match("|^[0-9A-Za-z._-]{1,30}@[A-Z0-9a-z-.]+[0-9A-Za-z]{1,1}\.[a-z]{2,6}$|",$mail)){
            $error[]="Эмейл введен некоректно";
        }
        return $error;
    }







}