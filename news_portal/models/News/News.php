<?php
namespace models\News;
class News
{

  //-------------------------------------------------------------
 //основные методы
    public static function getNewsList($pdo,$activ_page){// получить id выводимых новостей
        $newsList=array();
        $koef=5*($activ_page-1);
        $query=$pdo->query("SELECT news_id FROM news ORDER BY news_id DESC LIMIT $koef, 5");
        while($result=$query->fetch(\PDO::FETCH_ASSOC)){
            $newsList[]= $result['news_id'];
        }
        return $newsList;
    }

    public static function getButtonList($pdo,$activ_page){ //получить массив кнопок для страниц
        $count_page=self::get_count_page($pdo);
        if ($count_page == 0 || $count_page == 1) return array();
        if ($count_page > 10)
        {
            if($activ_page <= 4 || $activ_page + 3 >= $count_page)
            {
                for($i = 0; $i <= 4; $i++)
                {
                    $pageArray[$i] = $i + 1;
                }
                $pageArray[5] = "...";
                for($j = 6, $k = 4; $j <= 10; $j++, $k--)
                {
                    $pageArray[$j] = $count_page - $k;
                }
            } else
            {
                $pageArray[0] = 1;
                $pageArray[1] = 2;
                $pageArray[2] = "...";
                $pageArray[3] = $activ_page - 2;
                $pageArray[4] = $activ_page - 1;
                $pageArray[5] = $activ_page;
                $pageArray[6] = $activ_page + 1;
                $pageArray[7] = $activ_page + 2;
                $pageArray[8] = "...";
                $pageArray[9] = $count_page - 1;;
                $pageArray[10] = $activ_page;
            }
        }

        else
        {
            for($n = 0; $n < $count_page; $n++)
            {
                $pageArray[$n] = $n + 1;
            }
        }
        return $pageArray;
    }


    public static function get_count_page($pdo){
        $query=$pdo->query("SELECT COUNT(news_id) FROM news");
        $result=$query->fetch(\PDO::FETCH_ASSOC);
        return ceil($result['COUNT(news_id)']/5);

    }
}