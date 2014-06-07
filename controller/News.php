<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.29.12
 * Time: 23:21
 */

class NewsController extends Controller {


    public function render(){

        $body = (new News($this->registry))->render();

        $this->registry->tpl->assign("body", $body);

    }

} 