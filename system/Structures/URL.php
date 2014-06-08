<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.25.12
 * Time: 14:20
 */

class URL {

    private $params = array(); // page = controller, params = { id, part, ...}



    public function getLink() {

        $link = '/?';
        if( isset($params['content']) )  $link .= 'content=' .$params['content'] . '&';

        if( isset($params['id']) )  $link .= 'id=' .$params['id'] . '&';

        if( isset($params['part']) )  $link .= 'part=' .$params['part'] . '&';

        return $link;
    }

    public function redirect(){
        header('Location: ' . $this->getLink() );
    }

    private function __construct( $data ) {

        $this->params = $data;
    }

    public static function getCurrentURL(){

        // TODO maybe better parse/explode REQUEST_URI
        $data = array();
        if( isset($_GET['content']) )  $data['content'] = $_GET['content'];
        if( isset($_GET['part']) )  $data['part'] = $_GET['part'];
        if( isset($_GET['id']) )    $data['id']   = $_GET['id'];

        $url = new URL($data);

        return $url;
    }

    public static function getNewURL(){

        $url = new URL( array() );

        return $url;
    }



    }
?>