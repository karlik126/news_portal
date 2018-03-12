<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 17.11.2017
 * Time: 11:21
 */
use models\account\user;
class AjaxLikeController extends \controllers\ajaxController
{
    public function actionRemoveLike(){
        try{
             $news_id=$_POST['news_id'];
            $user_id= $_SESSION['user']->getUserId();
            $this->pdo->query("DELETE FROM news_likes WHERE post_id=$news_id AND user_id=$user_id");
           echo "Success";
       }catch(PDOException $e){
           echo "notSuccess";
       }
        die();
    }




    public function actionUpdateCount(){
        try{
            $news_id=$_POST['news_id'];
            $query=$this->pdo->query("SELECT COUNT(*) FROM news_likes WHERE post_id=$news_id");
            $result=$query->fetch(\PDO::FETCH_ASSOC);
            echo $result['COUNT(*)'];
        }catch(PDOException $e){
            echo "notSuccess";
        }
        die();
    }



    public function actionPutLike(){
        try{
            $news_id=$_POST['news_id'];
            $user_id= $_SESSION['user']->getUserId();
            $this->pdo->query("INSERT INTO `news_likes` (`user_id`, `post_id`) VALUES ($user_id, $news_id)");
            echo 'success';
        }catch(PDOException $e){
            echo "notSuccess";
        }
        die();
    }
}