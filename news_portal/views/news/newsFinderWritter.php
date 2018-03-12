<?php
/**
 * Created by PhpStorm.
 * User: Mvideo
 * Date: 01.02.2018
 * Time: 15:38
 */

namespace views\news;


class newsFinderWritter
{


    public static function write(){
        ?>
        <form method="get" class="newsBlockFinder">
            <input type="text" placeholder="What are you interesting" class="newsBlockFinderInput" name="find">
            <input type="submit" value="Find" class="newsBlockFinderButton">
        </form>



        <?
    }

}