<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 22:14
 */

class Aboutus extends Model{

    public $tplName = 'aboutus';

    public function __construct() {
        d_Echo("Model class constructed : ". get_class ($this) );
    }

    public function getModelHeaderHTML() {
        return '<link rel="stylesheet" href="' . DIR_WEB_VIEW . 'css/about.css" type="text/css" media="screen" />';
    }

    public function render() {

        $this->tpl->assign("aboutusHeader", $this->getTextByName("aboutusHeader"));
        $this->tpl->assign("aboutusInfo", $this->getTextByName("aboutusInfo"));
        $this->tpl->assign("aboutusTeamHeader", $this->getTextByName("aboutusTeamHeader"));
        $this->tpl->assign("aboutusTeam", $this->getTextByName("aboutusTeam"));

        // add header scripts
        $this->tpl->assign("modelHeader", $this->getModelHeaderHTML());


        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;
    }


} 