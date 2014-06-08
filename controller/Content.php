<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 14.8.6
 * Time: 16:10
 */

class ContentController extends Controller {

    public function processActivity() {
        d_echo("Contoller:" . get_class($this));
        $this->processCommonModels();

        $model = $this->getModel();
        $this->processSpecificModel($model);
    }

    private function processCommonModels() {
        $footer = (new FooterModel($this->registry))->render();
        $navBar = (new NavigationBarModel($this->registry))->render();
        $body = "";

        $tpl = $this->registry->tpl;
        $tpl->assign("navbar", $navBar);
        $tpl->assign("body", $body);
        $tpl->assign("footer", $footer);
    }

    private function getModel() {
        $className = $this->getModelName();
        $model = new $className($this->registry);

        return $model;
    }

    private function getModelName() {
        if (isset($_GET['content']) && class_exists(escape($_GET['content']) . MODEL_CLASS_SUFFIX)) {
            $className = escape($_GET['content']) . MODEL_CLASS_SUFFIX;
        } else {
            $className = DEFAULT_CONTENT_MODEL;
        }
        return $className;
    }

    private function processSpecificModel($model) {
        $body = $model->render();

        $this->registry->tpl->assign("body", $body);
    }


    protected function actionAddComment($data){
        $sql = "INSERT INTO comments ( author, email, news_id, message, date ) VALUES ('".escape($data['author'])."', '".escape($data['email'])."', ".(int)$data['newsID'].", '".escape($data['message'])."', now())";
        $res = $this->registry->db->query($sql);
        if( $res == true ){
            d_echo("actionAddComment: true" );
            d_echo($data);
        }
    }

} 