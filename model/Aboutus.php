<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 22:14
 */

class Aboutus extends Model{

    public $tplName = 'aboutus';


    public function getModelHeaderHTML() {
        return '<link rel="stylesheet" href="' . DIR_WEB_VIEW . 'css/about.css" type="text/css" media="screen" />';
    }

    public function render() {

        $this->registry->tpl->assign("aboutusHeader", $this->getTextByName("aboutusHeader"));
        $this->registry->tpl->assign("aboutusInfo", $this->getTextByName("aboutusInfo"));
        $this->registry->tpl->assign("aboutusTeamHeader", $this->getTextByName("aboutusTeamHeader"));
        $this->registry->tpl->assign("aboutusTeam", $this->getTextByName("aboutusTeam"));

        // add header scripts
        $this->registry->tpl->assign("modelHeader", $this->getModelHeaderHTML());


        $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;
    }


} 