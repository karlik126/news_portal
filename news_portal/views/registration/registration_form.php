<?php
namespace views\registration;
class registration_form
{
    public static function write($error){
        ?>
        <form method="post" class="registration_form" style="border: ">
            <div><h1 style="position: relative;left:20%;">Регистрация</h1></div>
            <ul>
            <?
            foreach ($error as $value){?>
                <div class="error"><h5><li><?=$value?></li></h5></div>
            <?}
            ?>
            </ul>
            <div class="first"><div>Введите логин:</div><input id="1_input" class='reg' type="text" name="login" placeholder="Login" ></div>
            <div id="1_div" class="hint"></div>
            <div id="2_div" class="hint"></div>
            <div id="11_div" class="hint"></div>
            <div><div>Введите имя:</div><input id="2_input" class='reg' type="text" name="name" placeholder="name" ></div>
            <div id="3_div" class="hint"></div>
            <div id="4_div" class="hint"></div>
            <div><div>Введите пароль:</div> <input id="3_input" class='reg' type="password" name="password" placeholder="password"></div>
            <div><div>Введите пароль повторно:</div> <input id="4_input" class='reg' type="password" name="password_confirm" placeholder="password_confirm"></div>
            <div class="kek">
                <div style="display: table;width: 100%;text-align: left;color:red;" id="1"><div id='badge1' style="width: auto">✗ </div>Пароль может содержать только большие и маленькие буквы латинского алфавита,цифры,тире и нижнее подчеркивания.</div>
                <div style="display: table;width: 100%;text-align: left;color:red;" id="2"><div id='badge2' style="width: auto">✗ </div>Пароль должен содержать от 6 до 30 символов.</div>
                <div style="display: table;width: 100%;text-align: left;color:red;" id="3"><div id='badge3' style="width: auto">✗ </div>Введенные пароли совпадают.</div>
                <div style="display: table;width: 100%;text-align: left;color:green;"id="4"><div id='badge4' style="width: auto">✔ </div>Не используйте пароль похожий на логин!!!</div>
            </div>
            <div> <div>Введите эмейл:</div><input class='reg' id="5_input" type="text" name="mail" placeholder="qwerty@yandex.ru"></div>
            <div id="5_div" class="hint"></div>
            <div id="22_div" class="hint"></div>
            <div><input type="submit" value="Зарегестрироваться " style="position: relative;left:30%;"></div>

        </form>
        <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/views/registration/js.js"></script>
        <script type="text/javascript" src="/views/registration/ajax.js"></script>
        <?

    }

}
?>
