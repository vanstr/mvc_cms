<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 13:26
 */

class AdminText extends Model{

    public $tplName = 'admin/adminText';

    public function __construct($tpl = null, $db = null) {
        $this->tpl = $tpl;
        $this->db = $db;
        d_Echo("Model class constructed : " . get_class($this));
    }

    public function render() {

        // render texts Items
        $sql = "SELECT * FROM texts";
        $query = $this->db->query($sql);
        $texts = $query->rows;
        //d_echo($portfolioItems);
        $this->tpl->assign("texts", $texts);
        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }
}