<?php
/**
 * Created by PhpStorm.
 * User: Mvideo
 * Date: 01.02.2018
 * Time: 16:00
 */

namespace views\news;


class bot_button
{

    public static function write($page_list,$activ_page){
        for ($i=0;$i<count($page_list);$i++){
            echo $page_list[$i];
        }
    }

}