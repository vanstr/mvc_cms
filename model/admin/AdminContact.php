<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.16.12
 * Time: 13:32
 */

class AdminContact extends Model{

    public $tplName = 'admin/adminContact';

    public function render() {

        // render texts Items
        $sql = "SELECT * FROM messages";
        $query = $this->registry->db->query($sql);
        $messages = $query->rows;
        //d_echo($portfolioItems);
        $this->registry->tpl->assign("messages", $messages);
        $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }
}