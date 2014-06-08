<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.14.12
 * Time: 00:30
 */

class NavigationBarModel extends Model {

    public $tplName = 'navbar';


    public function render() {

        $tpl = $this->registry->tpl;

        $tpl->assign("loggedOut", !($this->registry->user->isLoggedIn()) );
        $tpl->assign("admin",       $this->registry->user->isAdmin());
        $tpl->assign("pageAdmin",   $this->getTextByName("pageAdmin"));
        $tpl->assign("loginHeader", $this->getTextByName("loginHeader"));
        $tpl->assign("loginLogout", $this->getTextByName("loginLogout"));
        $tpl->assign("navbarTitle", $this->getTextByName("navbarTitle"));
        $tpl->assign("pageAboutus", $this->getTextByName("pageAboutus"));
        $tpl->assign("pageContact", $this->getTextByName("pageContact"));
        $tpl->assign("pageHome",    $this->getTextByName("pageHome"));
        $tpl->assign("pagePortfolio", $this->getTextByName("pagePortfolio"));

        $modelHTML = $tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;
    }
} 