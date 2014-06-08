<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 13:22
 */

class AdminModel extends Model{
    public $tplName = 'admin/admin';

    public function render() {

        $adminPart = '';

        if(isset($_GET['part']) && $_GET['part'] != ''){
            if( $_GET['part'] == 'portfolio' ) $adminPart = (new AdminPortfolio($this->registry));
            //elseif( $_GET['part'] == 'news' ) $adminPart = (new AdminNews($this->tpl, $this->db));
            elseif( $_GET['part'] == 'contact' ) $adminPart = (new AdminContact($this->registry));
            else $adminPart = (new AdminText($this->registry));
        }
        else{
            $adminPart = (new AdminText($this->registry));
        }

        $adminPartHtml = $adminPart->render();

        $this->registry->tpl->assign("adminPart", $adminPartHtml);
        $this->registry->tpl->assign("adminPartHeader", get_class($adminPart) );

        $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }

} 