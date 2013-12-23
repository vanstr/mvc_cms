<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 13:22
 */

class Admin extends Model{
    public $tplName = 'admin/admin';

    public $allowedActions = array(
        'edittext' => 'actionEditText'
    );

    public function __construct() {
        d_Echo("Model class constructed : ". get_class ($this) );

    }

    public function getModelHeaderHTML() {
        //return '<link href="' . DIR_WEB_VIEW . 'css/contact.css" rel="stylesheet"/>';
    }

    public function actionEditText(){
        d_echo($_POST);
        $this->db->updateQuery("texts", array('text' => $_POST['newvalue']), array('id'=>$_POST['id']));

        return $this->getTextByID($_POST['id']);
    }


    public function render() {

        $adminPart = '';

        if(isset($_GET['part']) && $_GET['part'] != ''){
            if( $_GET['part'] == 'portfolio' ) $adminPart = (new AdminPortfolio($this->tpl, $this->db));
            //elseif( $_GET['part'] == 'news' ) $adminPart = (new AdminNews($this->tpl, $this->db));
            elseif( $_GET['part'] == 'contact' ) $adminPart = (new AdminContact($this->tpl, $this->db));
            else $adminPart = (new AdminText($this->tpl, $this->db));
        }
        else{
            $adminPart = (new AdminText($this->tpl, $this->db));
        }

        $adminPartHtml = $adminPart->render();

        $this->tpl->assign("adminPart", $adminPartHtml);
        $this->tpl->assign("adminPartHeader", get_class($adminPart) );

        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }

} 