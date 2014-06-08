<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.14.12
 * Time: 00:40
 */

class FooterModel extends Model {
    public $tplName = 'footer';

    public function render() {

        $this->registry->tpl->assign("footerInfo", $this->getTextByName("footerInfo"));
        $this->registry->tpl->assign("footerCopyright", $this->getTextByName("footerCopyright"));
        /*
        $this->tpl->assign("portfolioHeader", $this->getTextByName("portfolioHeader"));


        $sql = "SELECT * FROM portfolio WHERE id = '" . (int)$_GET['id'] . "'";
        $query = $this->db->query($sql);
        $portfolioItem = $query->row;
        if ($portfolioItem == null) return; // TODO
        //d_echo($portfolioItem);
        $this->tpl->assign("navbarTitle", $portfolioItem);

        */
        $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;
    }
} 