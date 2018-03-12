<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 28.11.2017
 * Time: 13:44
 */

class AjaxComentsController extends \controllers\ajaxController
{
    public function actionPutComent(){
        $post_id=$_POST['news_id'];
        $user_id=$_SESSION['user']->getUserId();
        $text=htmlspecialchars($_POST['coment_text']);
        $time=time();
        $query=$this->pdo->query("INSERT INTO news_coments (post_id,author_id,text,time) VALUES ($post_id, $user_id,'{$text}', $time)");
        if($query){
            echo "success";
        }else{
            echo "unsuccess";
        }
        die();
    }

    public function actionDeleteComent(){
        $coment_id=$_POST['coment_id'];
        $query=$this->pdo->query("DELETE FROM news_coments  WHERE coment_id=$coment_id");
        if($query){
            echo "success";
        }else{
            echo "unsuccess";
        }
        die();
    }

    public function actionUpdateComents(){
        $post_id=$_POST['news_id'];
        $limit=$_POST['limit'];
        $coments=\models\coments\comentGetter::getComents($this->pdo,$post_id,$limit);
        echo json_encode($coments);
        die();
    }


    public function actionShowMoreComents(){
            $otherComents= $_POST['otherComents'];
            $nowCount= $_POST['nowCount'];
            $limit=$otherComents+$nowCount;
            $news_id=$_POST['news_id'];
            $coments=\models\coments\comentGetter::getComents($this->pdo,$news_id,$limit);
            echo json_encode($coments);
            die();
    }

    public function actionGetCountComents(){
        $news_id=$_POST['news_id'];
        echo \models\coments\comentGetter::getComentCount($this->pdo,$news_id);
        die();
    }




}