<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 19:50
 */

class NewsModel extends Model {

    public $tplName = 'news/news';

    public function render() {
        //header('Location: ?content=news' );

        $this->registry->tpl->assign("newsHeader",
            $this->getTextByName("newsHeader"));

        if (isset($_GET['id']) && $_GET['id'] != '') {

            $sql = "SELECT * FROM news WHERE id = '".(int)$_GET['id']."'";
            $query = $this->registry->db->query($sql);
            $newsArticle = $query->rows;
            if($newsArticle == null) return ""; // TODO
            d_echo($newsArticle);
            $this->registry->tpl->assign("newsArticles", $newsArticle);

            $articleHTML = $this->registry->tpl->draw('news/newsArticles', $return_string = true);
            $this->registry->tpl->assign("newsArticle", $articleHTML);

            //*

            $this->registry->tpl->assign("newsID", $_GET['id']);
            $this->registry->tpl->assign("commentsHeader", $this->getTextByName("commentsHeader"));
            $this->registry->tpl->assign("commentAddNew", $this->getTextByName("commentAddNew"));
            $this->registry->tpl->assign("commentAddNewButton", $this->getTextByName("commentAddNewButton"));
            $sql = "SELECT * FROM comments WHERE news_id = '".(int)$_GET['id']."'";
            $query = $this->registry->db->query($sql);
            $comments = $query->rows;
            //if($comments == null) return; // TODO
            //d_echo($comments);
            $this->registry->tpl->assign("comments", $comments);
            $newsComments = $this->registry->tpl->draw('comments', $return_string = true);
            $this->registry->tpl->assign("newsComments", $newsComments);
            //*/

            $modelHTML = $this->registry->tpl->draw('news/newsItem', $return_string = true);
        } else {

            $sql = "SELECT * FROM news";
            $query = $this->registry->db->query($sql);
            $newsArticles = $query->rows;
            $this->registry->tpl->assign("newsArticles", $newsArticles);

            $newsHTML = $this->registry->tpl->draw('news/newsArticles', $return_string = true);
            $this->registry->tpl->assign("news", $newsHTML);

            $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);
        }
        return $modelHTML;
    }

}