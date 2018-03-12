<?php
use models\News;

class NewsController  extends \controllers\Controller
{
    /* Список новостей*/
    public function actionIndex($activ_page){//список новостей
        if ($activ_page==0 || $activ_page>News\News::get_count_page($this->pdo)){
            header("Location:/news/PageNotFound");
        }
        $news_list= News\News::getNewsList($this->pdo,$activ_page) ;
        $page_list= News\News::getButtonList($this->pdo,$activ_page);
        $newsWriter=new \classes\news\News_Writter();
        for ($i=0;$i<sizeof($news_list);$i++){
            $new=\classes\news\NewsGetter::getNews($this->pdo,$news_list[$i]);
            $newsWriter->add_news($new);
        }
        ?>
        <div class="common_news_view">
        <?php
        $newsWriter->write();// рисуем новости
        \views\news\bot_button::write($page_list,$activ_page);// рисуем кнопки внизу
        ?>
        </div>
        <?php
        \views\news\newsFinderWritter::write();
        return true;
    }
    /*----------------------------------------------------*/
    /*Один элемент*/
    public function actionView($id){// Просмотр одной новости
        $new=\classes\news\NewsGetter::getNews($this->pdo,$id);
        \views\one_new\OneNewWritter::write($new);
        return true;
    }
    /*----------------------------------------------------*/
    /*Редирект при заходе на сайт на основную страницу*/
    public function actionRedirect(){
        header("Location:/news/page/1");
        return true;
    }
    /*----------------------------------------------------*/
    /*Редирект при ненахождении страницы*/
    public function actionNotFound(){
        echo "страница не найдена";
        return true;

    }

}