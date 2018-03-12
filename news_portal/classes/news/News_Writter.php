<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 22.10.2017
 * Time: 20:43
 */

namespace classes\news;


use views\like\LikeWritter;

class News_Writter
{
    private  $news_list=array();

    public  function add_news(News $new){
        $this->news_list[]=$new;
    }


    public  function write(){
        ?>
        <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/classes/news/likes.js"></script>
        <?
        foreach ($this->news_list as $value){
        ?>
            <div id='caption'><b><?=$value->getCaption();?></b></div>
            <div class="text_new"><?=$value->getAbbreviatedText(700);?><br><a href="../view/<?=$value->getNewsId();?>">Читать далее</a>  </div>
            <div id="pubdata" style=" display: inline-block;"><?=$value->getPubdata(); ?></div>
           <?
            LikeWritter::write($value);
            ?>
            <? } ?>

        <?
    }


}
?>