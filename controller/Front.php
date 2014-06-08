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
        $controllers[] = new ContentController($this->registry);
        //$controllers[] = new AuthController($this->registry);
        //$controllers[] = new CommentController($this->registry);
        //$controllers[] = new ImageController($this->registry);

        foreach ($controllers as $controller) {
            $controller->process();
        }


        if (!isSilentRequest()) {
            $tpl = $this->registry->tpl;
            $result = $tpl->draw('html', $return_string = true);
        } else {
            $result = $this->response;
        }

        return $result;
    }


}

?>