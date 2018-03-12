<?php
namespace views\one_new;
use models\coments\comentGetter;
use views\Coments\comentsWritter;
use views\like\LikeWritter;

/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 31.10.2017
 * Time: 22:53
 */
class OneNewWritter
{
    /**
     * @param \classes\news\News $news
     */
    public static function write(\classes\news\News $news){


        ?>
        <div class="one_new">
            <div class="one_new_caption"><b><?=$news->getCaption();?></b></div>
            <div class="one_new_text"><?=$news->getText();?></div>
            <div id="body">

            <div id="gallery">
                <?
             /*
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <script type="text/javascript" src="/js/masonry.js"></script>
            <script type="text/javascript" src="/views/one_new/imageloaded.js"></script>
              $arr=$news->getImage();
               foreach ($arr as $value){
                   if($value!=''){
                      echo "<div class=\"item-masonry sizer4\">
	                       <img src=\"/image/news_image/$value\" alt=\"\">
	                         <div class=\"cover-item-gallery\">
	        	               <a href=\"#\">
	        		           <i class=\"fa fa-search fa-2x\"></i>
	        	                </a>
	                                </div>
	                         </div>";
                   }
               } */
                ?>
            </div>
            </div>
            <div class="one_new_pubdata"><?=$news->getPubdata();?></div>
            <? LikeWritter::write($news);
                ?>














            <div class="allComents" style="width: 100%;height: auto;">
                <input type="hidden" value="<?=self::getAdditionallyComents($news->getComentsCount());?>"   class="otherComents">
                <input type="hidden" value="<?=self::getNowComents($news->getComentsCount());?>"  class="nowCount">
                <?
                $news_id=$news->getNewsId();
                echo "<div class='hideComents'><a  href='#' onclick='hideComents($news_id)'>Скрыть комментарии</a></div>";
                $otherComents=self::getAdditionallyComents($news->getComentsCount());
                if($news->getComentsCount()>4){
                    echo "<div class='moreComents'><a  href='#' onclick='showMoreComents($news_id)'>Показать предыдущие $otherComents комментария</a></div>";
                    comentsWritter::write($news->getComents());
                }else{
                    echo "<div class='moreComents' style='display: none;'><a  href='#' onclick='showMoreComents($news_id)'>Показать предыдущие $otherComents комментария</a></div>";
                    comentsWritter::write($news->getComents());
                }
                ?>
            </div>

            <form  style="margin-top: 4%;position: relative;left:10%;">
                <textarea id="textArea"   placeholder="Ваш коментарий" class="comentText"></textarea>
                <div  class="fotoComent" style="display: none">&#128247;</div>
                <input type="submit" class="buttonComent"  onclick="putComent(<?=$news->getNewsId();?>);" value="Отправить" style="display: none;position: relative;left:52%;width:15%">
            </form>
            </div>






        <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/views/one_new/autoresize.jquery.js"></script>
        <script type="text/javascript" src="/classes/news/likes.js"></script>
        <script type="text/javascript" src="/views/one_new/coments.js"></script>
        <script src="/views/one_new/moreComents.js"></script>
        <?
    }

    private  static function getAdditionallyComents($count){
        if( $count-4<10){
            if($count-4>0){
                return $count-4;
            }else{
                return 0;
            }
        }else{
            return  10;
        }
    }
    private static function getNowComents($count){
        if($count>4){
            return 4;
        }else{
            return $count;
        }
    }

}