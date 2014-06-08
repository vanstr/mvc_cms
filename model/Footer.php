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

        $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;
    }
} 