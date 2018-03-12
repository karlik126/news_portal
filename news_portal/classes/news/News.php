<?php
namespace classes\news;
use models\like\Likes;

class News
{

    private  $news_id;
    private $caption;
    private $text;
    private $pub_data;
    private $image_path=array();
    private $likes;
    private $coments=array();
    private $comentsCount;
    public function __construct($news_id,$caption,$text,$pubdata,$image_path,Likes $likes,array $Coments,$comentsCount)
    {
        $this->news_id=$news_id;
        $this->caption=$caption;
        $this->text=$text;
        $this->pub_data=$this->convert_pubdata($pubdata);
        $this->image_path=explode(',',$image_path);
        $this->likes=$likes;
        $this->coments=$Coments;
        $this->comentsCount=$comentsCount;
    }
    public function getLikes(){
        return $this->likes;
    }
    public function setLikes(Likes $likes){
        $this->likes=$likes;
    }
    public function getComents(){
        return $this->coments;
    }
    public function getComentsCount(){
        return $this->comentsCount;
    }
    public function getAbbreviatedText($AbbreviatedTextLength){//возвращает сокращенный текст для ленты новостей
         if (mb_strlen($this->text)<$AbbreviatedTextLength) {
             return $this->text;
         }else {
             $index=mb_strpos(mb_substr($this->text,$AbbreviatedTextLength-1,mb_strlen($this->text)-$AbbreviatedTextLength),'.');
             if($index!=-1){
                 return mb_substr($this->text,0,$AbbreviatedTextLength+$index+1);
             }else {
                 if(mb_strpos($this->text,'.')==-1){
                     return mb_substr($this->text,0,$AbbreviatedTextLength).'...';
                 }else{
                     $i=$AbbreviatedTextLength;
                     for ($i;$this->text[$i]!='.' && $i>300;$i--){}
                     if($this->text[$i+1]=='.'){
                         return mb_substr($this->text,0,$i);
                     }else{
                         return mb_substr($this->text,0,$i).'...';
                     }

                 }
             }

         }
    }
    public function getCaption(){
        return $this->caption;
    }
    public function setCaption($caption){
        $this->caption=$caption;
    }
    public function getNewsId()
    {
        return $this->news_id;
    }
    public function setNewsId($news_id)
    {
        $this->news_id = $news_id;
    }

    public function getPubdata()
    {
        return $this->pub_data;
    }

    public function setPubdata($pub_data)
    {
        $this->pub_data = $pub_data;
    }

    public function getImage()
    {
        return $this->image_path;
    }

    public function setImage($image_path)
    {
        $this->image_path = $image_path;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
    }
    private function convert_pubdata($pubdata){ // Возвращает время постов как в контакте (3 часа  назад, секунду назад)3 11 ночи первую запись
        $raznost=time()-$pubdata;
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
            return date("H:i d/m/Y",$pubdata);
        }

    }




}