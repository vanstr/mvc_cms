<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 20:13
 */

abstract class Model {

    public $db = null;
    public $action = null;
    public $tpl;
    public $tplName;
    public $user;

    public $allowedActions = array(); // all keys should be in lower case

    public function getTplName(){

        return $this->$tplName;

    }

    public function getModelHeaderHTML() {
        return "";
    }

    public function render() {

        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);
        $this->tpl->assign("modelHeader", $this->getModelHeaderHTML());

        return $modelHTML;

    }

    public function getTextByName($name){

        $sql = "SELECT text, id FROM texts WHERE name = '".escape($name)."' ";
        $queryRes = $this->db->query($sql);

        if( $queryRes->num_rows == 0 ){ // no entry in db
            $this->db->insertQuery("texts", array("name"=>$name, "text"=>$name));
            $sql = "SELECT text, id FROM texts WHERE name = '".escape($name)."' ";
            $queryRes = $this->db->query($sql);
        }
        //d_echo($queryRes->num_rows);

        $res = $queryRes->row;
        //d_echo($res);
        //d_echo($this->user);
        if( ($this->user) != null && $this->user->isAdmin() ){
            $html = '<div class="edit" id="'.$res['id'].'">'.$res['text'].'</div>';
        }
        else{
            $html = $res['text'];
        }


        return $html;
    }

    public function getTextByID($id){

        $sql = "SELECT text FROM texts WHERE id = '".$id."' ";
        $res = $this->db->query($sql)->row['text'];

        return $res;
    }

} 