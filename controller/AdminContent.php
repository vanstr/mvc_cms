<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 14.8.6
 * Time: 17:44
 */


require_once 'Content.php';


class AdminContentController extends ContentController {

    protected function actionAddNews() {
        $this->registry->db->insertQuery("news", array("topic" => "new", "text" => "new"));
    }

    protected function actionDeleteComment($data) {
        $this->registry->db->deleteQuery("comments", array("id" => (int)$data['comment_id']));
        header('Location: ?content=news&id=' . $data['id']);
    }

    protected function actionDeleteNews($data) {
        $this->registry->db->deleteQuery("news", array("id" => (int)$data['id']));
        header('Location: ?content=news');
    }

    protected function actionEditText($data){
        $this->registry->db->updateQuery("texts", array('text' => $data['newvalue']), array('id'=>$data['id']));
        $text = $this->getTextByID($data['id']);
        return $text;
    }

    private function getTextByID($id){
        $sql = "SELECT text FROM texts WHERE id = '".$id."' ";
        $res = $this->registry->db->query($sql)->row['text'];
        return $res;
    }
} 