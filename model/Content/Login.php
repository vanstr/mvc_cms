<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 23:49
 */

class LoginModel extends Model {
    public $tplName = 'login';


    public function render() {
        //header('Location: ?content=news' );

        $this->registry->tpl->assign("loginHeader", $this->getTextByName("loginHeader"));
        $this->registry->tpl->assign("loginToYourAccount", $this->getTextByName("loginToYourAccount"));
        $this->registry->tpl->assign("loginLeftColumn", $this->getTextByName("loginLeftColumn"));

        $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }
}

?>
