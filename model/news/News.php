<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 19:50
 */

class News extends Model {

    public $tplName = 'news/news';

    public $allowedActions = array(
        'addcomment' => 'actionAddComment',
        // must be admin
        'addnews' => 'actionAddNews',
        'deletecomment' => 'actionDeleteComment',
        'deletenews' => 'actionDeleteNews',
        'editnews' => 'actionEditNews',
    );

    public function actionAddNews(){
        if( $this->registry->user->isAdmin() ){
            $this->registry->db->insertQuery("news", array("topic" => "new", "text"=>"new"));
        }
        else{
            d_Echo("access denied");
        }
    }

    public function actionDeleteComment(){
        if( $this->registry->user->isAdmin() ){
            $this->registry->db->deleteQuery( "comments", array("id" => (int)$_GET['comment_id']) );
            header('Location: ?page=news&id='.$_GET['id'] );
        }
        else{
            d_Echo("access denied");
        }
    }

    public function actionDeleteNews(){
        if( $this->registry->user->isAdmin() ){
            $this->registry->db->deleteQuery( "news", array("id" => (int)$_GET['id']) );
            header('Location: ?page=news' );
        }
        else{
            d_Echo("access denied");
        }
    }

    public function actionAddComment(){
        $sql = "INSERT INTO comments ( author, email, news_id, message, date ) VALUES ('".escape($_POST['author'])."', '".escape($_POST['email'])."', ".(int)$_POST['newsID'].", '".escape($_POST['message'])."', now())";
        $res = $this->registry->db->query($sql);
        if( $res == true ){
            d_echo("actionAddComment: true" );
            d_echo($_POST);
        }
    }

    public function render() {
        //header('Location: ?page=news' );

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