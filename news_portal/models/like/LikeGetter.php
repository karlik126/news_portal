<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.11.2017
 * Time: 23:28
 */

namespace models\like;


class LikeGetter
{


    public static function getLikes($pdo,$news_id,$user_id=null){
        $count=self::getCountLikes($pdo,$news_id);
        $your_like=self::getYourLike($pdo,$news_id,$user_id);
        return new Likes($count,  'gdf', $your_like);
    }

    private static function getCountLikes($pdo,$news_id){
        $query=$pdo->query("SELECT COUNT(*) FROM news_likes WHERE post_id=$news_id");
        $result=$query->fetch(\PDO::FETCH_ASSOC);
        return $result['COUNT(*)'];
    }

    private static function getYourLike($pdo,$news_id,$user_id){
        if($user_id==null){
            return "NoUser";
        }else{
            $query=$pdo->query("SELECT COUNT(*) FROM news_likes WHERE user_id=$user_id AND post_id=$news_id");
            $result=$query->fetch(\PDO::FETCH_ASSOC);
            if($result['COUNT(*)']==0){
                return 'no';
            }else{
                return 'yes';
            }
        }

    }


}