<?php
namespace models\like;
class Likes
{
    private $count;
    private $lickingPeople=array();
    private $yourLike;



    public function __construct($count,$lickingPeople, $yourLike)
    {
        $this->count = $count;
        $this->lickingPeople = $lickingPeople;
        $this->yourLike = $yourLike;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function setCount($count)
    {
        $this->count = $count;
    }
    public function getLickingPeople()
    {
        return $this->lickingPeople;
    }
    public function setLickingPeople($lickingPeople)
    {
        $this->lickingPeople = $lickingPeople;
    }
    public function getYourLike()
    {
        return $this->yourLike;
    }
    public function setYourLike($yourLike)
    {
        $this->yourLike = $yourLike;
    }
}