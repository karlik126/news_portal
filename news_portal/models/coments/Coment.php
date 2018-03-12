<?php
namespace models\coments;
class Coment
{
    public $coment_id;
    public $author_id;
    public $author_name;
    public $news_id;
    public $text;
    public $time;
    public $your_like;


    public function __construct($coment_id, $author_id,$author_name, $news_id, $text,$time)
    {
        $this->coment_id = $coment_id;
        $this->author_id = $author_id;
        $this->author_name=$author_name;
        $this->news_id = $news_id;
        $this->text = $text;
        $this->time=$this->convertTime($time);
        if(isset($_SESSION['user'])){
            if($author_id==$_SESSION['user']->getUserId()){
                $this->your_like=true;
            }else{
                $this->your_like=false;
            }
        }else{
            $this->your_like=false;
        }

    }
    public function getYourLike(){
        return  $this->your_like;
    }
    public function getTime(){
        return $this->time;
    }
    public function __toString()
    {
        return $this->coment_id." // ".$this->author_id ." //  ".$this->author_name." // ".  $this->text . "//". $this->time ;
    }
    public function getAuthorName(){
        return $this->author_name;
    }

    public function getComentId()
    {
        return $this->coment_id;
    }
    public function setComentId($coment_id)
    {
        $this->coment_id = $coment_id;
    }
    public function getAuthorId()
    {
        return $this->author_id;
    }
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }
    public function getNewsId()
    {
        return $this->news_id;
    }
    public function setNewsId($news_id)
    {
        $this->news_id = $news_id;
    }
    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    private function convertTime($time){
        $raznost=time()-$time;
        if($raznost<60){
            if($raznost<10){
                return  " Только что";
            }else{
                return "$raznost секунд назад";
            }
        }else if($raznost<3600){
            $raznost=intdiv($raznost,60);
            if ($raznost==1){
                return "$raznost минуту назад";
            }else if($raznost<5){
                return "$raznost минуты назад";
            }else{
                return "$raznost минут назад";
            }
        }else if($raznost<216000){
            $raznost=intdiv($raznost,3600);
            if ($raznost==1){
                return "Час назад";
            }else if($raznost<5){
                return "$raznost часа назад";
            }else{
                return "$raznost часов назад";
            }
        }else{
            return date("H:i d/m/Y",$time);
        }
    }





}