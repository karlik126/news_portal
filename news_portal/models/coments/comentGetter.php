<?php
namespace models\coments;

class comentGetter
{
    public static function getComents($pdo,$news_id,$limit=4){
        $coments=array();
        $query=$pdo->query("SELECT* FROM ( SELECT* FROM news_coments WHERE (post_id=$news_id) ORDER BY coment_id  DESC LIMIT $limit) tbl
         ORDER BY tbl.`coment_id` ");
        while ($result=$query->fetch(\PDO::FETCH_ASSOC)){
            $author_name=self::getAuthorName($pdo, $result['author_id']);
            $coments[]=new \models\coments\Coment($result['coment_id'], $result['author_id'],$author_name, $result['post_id'],$result['text'],$result['time']);
        }
        return $coments;
    }

    public static function getComentsByComentsID($pdo,$comentID){
        $query=$pdo->query("SELECT * FROM news_coments WHERE coment_id=$comentID");
        $result=$query->fetch(\PDO::FETCH_ASSOC);
        $author_name=self::getAuthorName($pdo, $result['author_id']);
        return new \models\coments\Coment($result['coment_id'], $result['author_id'],$author_name, $result['post_id'],$result['text'],$result['time']);
    }

    private static function getAuthorName($pdo,$userID){
        $query=$pdo->prepare("SELECT name FROM Users WHERE (User_id=$userID)");
        $query->execute();
        $result=$query->fetch(\PDO::FETCH_ASSOC);
        return $result['name'];
    }

    public static function getComentCount($pdo,$news_id){
        $query=$pdo->query("SELECT COUNT(*) FROM news_coments WHERE (post_id=$news_id)");
        $result=$query->fetch(\PDO::FETCH_ASSOC);
        return $result['COUNT(*)'];
    }

}