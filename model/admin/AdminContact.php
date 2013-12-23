<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.16.12
 * Time: 13:32
 */

class AdminContact extends Model{

    public $tplName = 'admin/adminContact';

    public function __construct($tpl = null, $db = null) {
        $this->tpl = $tpl;
        $this->db = $db;
        d_Echo("Model class constructed : " . get_class($this));
    }

    public function render() {

        // render texts Items
        $sql = "SELECT * FROM messages";
        $query = $this->db->query($sql);
        $messages = $query->rows;
        //d_echo($portfolioItems);
        $this->tpl->assign("messages", $messages);
        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }
}