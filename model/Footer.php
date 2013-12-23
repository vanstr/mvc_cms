<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.14.12
 * Time: 00:40
 */

class Footer extends Model {
    public $tplName = 'footer';

    public function __construct($tpl = null, $db = null, $user = null) {
        $this->tpl = $tpl;
        $this->db = $db;
        if( $user != null ) $this->user = $user;
        d_Echo("Model class constructed : " . get_class($this));
    }



    public function render() {

        $this->tpl->assign("footerInfo", $this->getTextByName("footerInfo"));
        $this->tpl->assign("footerCopyright", $this->getTextByName("footerCopyright"));
        /*
        $this->tpl->assign("portfolioHeader", $this->getTextByName("portfolioHeader"));


        $sql = "SELECT * FROM portfolio WHERE id = '" . (int)$_GET['id'] . "'";
        $query = $this->db->query($sql);
        $portfolioItem = $query->row;
        if ($portfolioItem == null) return; // TODO
        //d_echo($portfolioItem);
        $this->tpl->assign("navbarTitle", $portfolioItem);

        */
        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;
    }
} 