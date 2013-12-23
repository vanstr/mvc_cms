<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 13:27
 */

class AdminPortfolio extends Model{

    public $tplName = 'admin/adminPortfolio';

    public function __construct($tpl = null, $db = null) {
        $this->tpl = $tpl;
        $this->db = $db;
        d_Echo("Model class constructed : " . get_class($this));
    }

    public function render() {
        return "Coming soon";
    }

} 