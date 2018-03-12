<?php
namespace views\common;
use models\account\autorization;

/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.11.2017
 * Time: 2:39
 */
class topMenu
{

    public static function write($pdo){
        ?>
        <!DOCTYPE html>
        <head>
            <meta charset="UTF-8"/>
            <title>IT</title>
            <link href="/style/css.css" rel="stylesheet" type="text/css" />
            <div style="position:fixed;top:0px:left:0px;width: 105%;height: 40px;margin-left:-10px;margin-top:-10px;background-color: cadetblue;opacity: 0.4;z-index: 25; "><?// код фона #403a3a?>
                <div id="main_menu" >
                    <a id="main_link" href="#"><div>Просмотреть проекты</div></a>
                    <a id="main_link" href="../../offerProject"><div>Предложить проект</div></a>
                    <a  id="main_link" href="../../news/page/1"><div>Новости</div></a>
                    <?//if($_SESSION['user']->getUserStatus()=='admin'){

                    //}
                    ?>
                    <?
                    if(!autorization::check_autorization($pdo)){ ?>
                        <nav class="menu">
                            <ul>
                                <li> <a><div  class="main_modal">Мой личный кабинет</div></a>
                                    <ul>
                                        <li align="center"><a href="../../autorization"><div class="top_modal">Войти</div></a></li>
                                        <li><a href="../../registration"><div class="bot_modal">Создать новый аккаунт</div><</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                    <?}else{
                        ?>
                        <nav class="menu">
                            <ul>
                                <li> <a><div  class="main_modal">Мой личный кабинет</div></a>
                                    <ul>
                                        <li align="center"><a href="../../account"><div class="top_modal">Параметры</div></a></li>
                                        <li><a href="../../logout"><div style="padding-left: 35%;" class="bot_modal">Выйти</div><</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <?
                    }
                    ?>
                </div>

            </div>
            <div class="main_error">Ошибка!</div>

        </head>

        <?
    }

}