<?php
namespace views\like;
use classes\news\News;

class LikeWritter
{
    public static function write(News $value){ ?>
        <div class="likes">
            <?
                $count=$value->getLikes()->getCount();
                $id=$value->getNewsId();
                if($value->getLikes()->getYourLike()=='yes'){
                    echo "<a  href='#' onclick=\"doit($id)\" class='ActivLike'><div class=\"likes_count\" id='id$id'>Нравится&ensp;$count</div><div class=\"heart\"  >&hearts;</div></a> ";
                }else if($value->getLikes()->getYourLike()=='no'){
                    echo "<a href='#' onclick='doit($id)' class='noActivLike'><div class=\"likes_count\" id='id$id'>Нравится&ensp;$count</div> <div class=\"heart\">&hearts;</div></a>";
                }else if($value->getLikes()->getYourLike()=="NoUser"){
                    echo "<a  href='#' class='nullLike' id='show$id'><div class=\"likes_count\">Нравится&ensp;$count</div> <div class=\"heart\">&hearts;</div></a>";
                    echo "<div class='modal_like_window1' id='modalshow$id'>Чтобы лайкнуть запись, авторизуйтесь!</div>";
                }
                ?>
        </div>
        <?

    }

}