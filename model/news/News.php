<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 19:50
 */

class News extends Model {

    public $tplName = 'news/news';

    public function __construct(){
        d_Echo("Model class constructed : ". get_class ($this) );
    }

    public $allowedActions = array(
        'addcomment' => 'actionAddComment',
        // must be admin
        'addnews' => 'actionAddNews',
        'deletecomment' => 'actionDeleteComment',
        'deletenews' => 'actionDeleteNews',
        'editnews' => 'actionEditNews',
    );

    public function actionAddNews(){
        if( $this->user->isAdmin() ){
            $this->db->insertQuery("news", array("topic" => "new", "text"=>"new"));
        }
        else{
            d_Echo("access denied");
        }
    }

    public function actionDeleteComment(){
        if( $this->user->isAdmin() ){
            $this->db->deleteQuery( "comments", array("id" => (int)$_GET['comment_id']) );
            header('Location: ?page=news&id='.$_GET['id'] );
        }
        else{
            d_Echo("access denied");
        }
    }

    public function actionDeleteNews(){
        if( $this->user->isAdmin() ){
            $this->db->deleteQuery( "news", array("id" => (int)$_GET['id']) );
            header('Location: ?page=news' );
        }
        else{
            d_Echo("access denied");
        }
    }

    public function actionAddComment(){
        $sql = "INSERT INTO comments ( author, email, news_id, message, date ) VALUES ('".escape($_POST['author'])."', '".escape($_POST['email'])."', ".(int)$_POST['newsID'].", '".escape($_POST['message'])."', now())";
        $res = $this->db->query($sql);
        if( $res == true ){
            d_echo("actionAddComment: true" );
            d_echo($_POST);
        }
    }

    public function render() {
        //header('Location: ?page=news' );

        $this->tpl->assign("newsHeader", $this->getTextByName("newsHeader"));

        if (isset($_GET['id']) && $_GET['id'] != '') {

            $sql = "SELECT * FROM news WHERE id = '".(int)$_GET['id']."'";
            $query = $this->db->query($sql);
            $newsArticle = $query->rows;
            if($newsArticle == null) return; // TODO
            d_echo($newsArticle);
            $this->tpl->assign("newsArticles", $newsArticle);

            $articleHTML = $this->tpl->draw('news/newsArticles', $return_string = true);
            $this->tpl->assign("newsArticle", $articleHTML);

            //*

            $this->tpl->assign("newsID", $_GET['id']);
            $this->tpl->assign("commentsHeader", $this->getTextByName("commentsHeader"));
            $this->tpl->assign("commentAddNew", $this->getTextByName("commentAddNew"));
            $this->tpl->assign("commentAddNewButton", $this->getTextByName("commentAddNewButton"));
            $sql = "SELECT * FROM comments WHERE news_id = '".(int)$_GET['id']."'";
            $query = $this->db->query($sql);
            $comments = $query->rows;
            //if($comments == null) return; // TODO
            //d_echo($comments);
            $this->tpl->assign("comments", $comments);
            $newsComments = $this->tpl->draw('comments', $return_string = true);
            $this->tpl->assign("newsComments", $newsComments);
            //*/

            $modelHTML = $this->tpl->draw('news/newsItem', $return_string = true);
        } else {

            $sql = "SELECT * FROM news";
            $query = $this->db->query($sql);
            $newsArticles = $query->rows;
            $this->tpl->assign("newsArticles", $newsArticles);

            $newsHTML = $this->tpl->draw('news/newsArticles', $return_string = true);
            $this->tpl->assign("news", $newsHTML);

            $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);
        }
        return $modelHTML;
    }

}