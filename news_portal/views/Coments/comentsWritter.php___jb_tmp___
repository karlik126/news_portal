<?php
namespace views\Coments;


class comentsWritter
{
    public static function write($coments){
        if(sizeof($coments)>0){
        foreach ($coments as $value){
               $comendID=$value->getComentId();
            ?>
            <div class="coment <?=$comendID?>">
            <div class="author_coment_name"><a href="#"><?=$value->getAuthorName();?></a></div>
                <div class="authorcomentText"><?=$value->getText();?></div>
                <div class="comentPubData"><?=$value->getTime();?></div>
                 <?
                 if($value->getYourLike()==true){
                         echo "<a class=\"deleteComent\" onclick='deleteComent($comendID)' href=\"#\">✕</a>";
                     }

                 ?>
            </div>
        <?}
        }
        if(sizeof($coments)==0){
            echo "<div class='nullComent'>Нету ни одного комментария.</div>";
        }else {
            echo "<div class='nullComent' style='display: none'>Нету ни одного комментария.</div>";
        }
        ?>
        <script src="/views/Coments/deleteComent.js"></script>

        <?
    }

}