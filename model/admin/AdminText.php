<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 13:26
 */

class AdminText extends Model{

    public $tplName = 'admin/adminText';

    public function render() {

        // render texts Items
        $sql = "SELECT * FROM texts";
        $query = $this->registry->db->query($sql);
        $texts = $query->rows;
        //d_echo($portfolioItems);
        $this->registry->tpl->assign("texts", $texts);
        $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }
}