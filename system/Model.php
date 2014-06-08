<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 20:13
 */

abstract class Model {

    public $action = null;

    /** @var Registry */
    public $registry;

    public $allowedActions = array(); // all keys should be in lower case

    public function getTplName(){
        return $this->registry->tplName;
    }

    public function getModelHeaderHTML() {
        return "";
    }


    public function __construct($registry){
        $this->registry=$registry;
        d_Echo("Model class constructed : ". get_class ($this) );
    }

    public function render() {

        $modelHTML = $this->registry->tpl->draw($this->registry->tplName, $return_string = true);
        $this->registry->tpl->assign("modelHeader", $this->getModelHeaderHTML());

        return $modelHTML;

    }

    public function getTextByName($name){

        $sql = "SELECT text, id FROM texts WHERE name = '".escape($name)."' ";
        $queryRes = $this->registry->db->query($sql);

        if( $queryRes->num_rows == 0 ){ // no entry in db
            $this->registry->db->insertQuery("texts", array("name"=>$name, "text"=>$name));
            $sql = "SELECT text, id FROM texts WHERE name = '".escape($name)."' ";
            $queryRes = $this->registry->db->query($sql);
        }
        //d_echo($queryRes->num_rows);

        $res = $queryRes->row;
        //d_echo($res);
        //d_echo($this->user);
        if( ($this->registry->user) != null && $this->registry->user->isAdmin() ){
            $html = '<div class="edit" oncontextmenu="return false" id="'.$res['id'].'">'.$res['text'].'</div>';
        }
        else{
            $html = $res['text'];
        }


        return $html;
    }

} 