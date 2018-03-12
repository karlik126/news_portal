<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 23.10.2017
 * Time: 2:38
 */

namespace classes\news;


use models\like\LikeGetter;
use models\coments\comentGetter;

class NewsGetter
{
    public static function getNews($pdo,$id)
    {
        $query=$pdo->prepare("SELECT* FROM news WHERE (news_id=$id)");
        $query->execute();
        $result=$query->fetch(\PDO::FETCH_ASSOC);
        $new=new News($result['news_id'],$result['caption'],$result['text'],$result['pubdata'],$result['image_path'],LikeGetter::getLikes($pdo,$id,self::getUserId()),comentGetter::getComents($pdo,$id),comentGetter::getComentCount($pdo,$id));
        return $new;

    }

    private static function getUserId(){
        if(!isset($_SESSION['user'])){
            return null;
        }else{
            return $_SESSION['user']->getUserId();
        }
    }



}