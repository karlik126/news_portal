<?php
namespace views\autorization;
class AutorizationView
{
    public static function write($error){?>
        <form class="autorization_window" method="post">
            <div style="text-align: center;color: red;font-size: larger;"><?=$error;?></div>
            <div><input type="text" name="login" placeholder="Логин" ></div>
            <div><input type="password" name="password" placeholder="Пароль"></div>
            <div><input type="submit" value="Авторизация" style="width: 40%;margin-left: 35%;"></div>
            <div style="margin-left: 35%;">Нету аккаунта? <a href="../../registration">Регистрация</a></div><br>
            <hr style="margin-left: 21%;width: 30%;display: inline-block">Или<hr style="width: 30%;display: inline-block">
            <div style="margin-left: 28%;">Не можете войти?<a href="#">Восстановить аккаунт</a></div>
        </form>



   <? }

}