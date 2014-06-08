<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.25.12
 * Time: 19:27
 */

class FrontController extends Controller {


    public function execute() {

        $controllers = array();
        if( !$this->registry->user->isAdmin() ){
            $controllers[] = new ContentController($this->registry);
        }else{
            $controllers[] = new AdminContentController($this->registry);
        }
        $controllers[] = new AuthController($this->registry);
        //$controllers[] = new ImageController($this->registry);

        foreach ($controllers as $controller) {
            $controller->process();
        }


        if (!isSilentRequest()) {
            $tpl = $this->registry->tpl;
            $result = $tpl->draw('html', $return_string = true);
        } else {
            $result = $this->registry->response[0];
        }

        return $result;
    }


}

?>