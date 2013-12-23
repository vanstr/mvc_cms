<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.14.12
 * Time: 00:30
 */

class NavigationBar extends Model {

    public $tplName = 'navbar';

    public function __construct($tpl = null, $db = null, $user = null) {
        $this->tpl = $tpl;
        $this->db = $db;
        if( $user != null ) $this->user = $user;
        d_Echo("Model class constructed : " . get_class($this));
    }

    public function render() {

        $this->tpl->assign("loggedOut", !($this->user->isLoggedIn()));
        $this->tpl->assign("admin",       $this->user->isAdmin());
        $this->tpl->assign("pageAdmin",   $this->getTextByName("pageAdmin"));
        $this->tpl->assign("loginHeader", $this->getTextByName("loginHeader"));
        $this->tpl->assign("loginLogout", $this->getTextByName("loginLogout"));
        $this->tpl->assign("navbarTitle", $this->getTextByName("navbarTitle"));
        $this->tpl->assign("pageAboutus", $this->getTextByName("pageAboutus"));
        $this->tpl->assign("pageContact", $this->getTextByName("pageContact"));
        $this->tpl->assign("pageHome", $this->getTextByName("pageHome"));
        $this->tpl->assign("pagePortfolio", $this->getTextByName("pagePortfolio"));

        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;
    }
} 