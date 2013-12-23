<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 19:49
 */

class Contact extends Model{

    public $tplName = 'contact';

    public $allowedActions = array(
        'sendmessage' => 'actionSendMessage'
    );

    public function __construct() {
        d_Echo("Model class constructed : ". get_class ($this) );

    }

    public function getModelHeaderHTML() {
        return '<link href="' . DIR_WEB_VIEW . 'css/contact.css" rel="stylesheet"/>';
    }

    public function render() {

        $this->tpl->assign("contactHeader", $this->getTextByName("contactHeader"));
        $this->tpl->assign("contactMarketingText", $this->getTextByName("contactMarketingText"));
        $this->tpl->assign("contactInfo", $this->getTextByName("contactInfo"));
        $this->tpl->assign("modelHeader", $this->getModelHeaderHTML());

        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }


    public function actionSendMessage(){

        $what = array(
            'author' => $_POST['author'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'] ,
            'phone' => $_POST['phone'] ,
            'message' => $_POST['message']
        );

        $res = $this->db->insertQuery("messages", $what);

        if( $res == true ){
            d_echo("actionSendMessage: true" );
            d_echo($_POST);
        }

    }

} 