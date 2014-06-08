<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.13.12
 * Time: 00:04
 */


function getConfiguredRainTpl($isAdmin){
    raintpl::configure("tpl_dir", DIR_RAINTPL_TPL);
    raintpl::configure("cache_dir", DIR_RAINTPL_TMP);
    raintpl::configure("tpl_ext", "php");
    raintpl::configure("path_replace", false);
    raintpl::configure("debug", APP_DEBUG);

    $tpl = new RainTPL;
    $tpl->assign("dirSRC", DIR_WEB_VIEW);
    $tpl->assign("title", "Hello World!");
    $tpl->assign("modelHeader","");
    $tpl->assign("modelFooter","");

    $tpl->assign("admin", $isAdmin);

    return $tpl;
}

function escape($value) {
    return mysql_real_escape_string(htmlspecialchars($value));
}

function isSilentRequest(){

    $result = false;

    if( (isset($_POST['silent']) && $_POST['silent'] == true) ||
        (isset($_GET['silent']) && $_GET['silent'] == true)
    ){
        $result = true;
    }

    return $result;
}


if( APP_DEBUG && !isSilentRequest() ){

    // d_echo()
    //   print content between <pre> tags, that allows to see data in "nice" format in HTML page
    // parameters:
    //   $mixed - any data to print.
    //   $mode  - string - modes (each letter has own meaning)
    //     'h' - escape html
    //     'd' - use var_dump()
    //     'l' - draw line after line
    //     'b' - bold
    //   $die   - die after print
    // return:
    //   NULL
    // notes:
    //   - WARNING: must be used only by programmers, while development
    function d_echo($mixed, $mode = '', $die = false){

        if( $mixed === NULL || is_bool($mixed) || $mixed === '' ) $mode .= 'd';

        $bold = ( strpos($mode, 'b') !== false );

        if( $bold ) echo '<b>';
        echo '<pre>';

        // escape HTML
        if( strpos($mode, 'h') !== false ) $mixed = d_html_escape($mixed);

        // print
        if( strpos($mode, 'd') !== false ) var_dump($mixed); else print_r($mixed);

        echo '</pre>';
        if( $bold ) echo '</b>';

        // line
        if( strpos($mode, 'l') !== false ) d_echo('----------');

        if( $die == true ){ die(); } // stop executin of script
    }

    // d_html_escape()
    //   escape HTML
    // parameters:
    //   $mixed - string, int, float or array.
    // return:
    //   string - escaped string (if $mixed was string, int or float)
    //   array  - escaped array (if $mixed was array)
    // notes:
    //   - WARNING: must be used only by programmers, while development
    function d_html_escape($mixed){

        if( is_array($mixed) ){
            $keys = array_keys($mixed);
            $ci = count($keys);
            for( $i = 0; $i < $ci; $i++ ){
                $mixed[$keys[$i]] = d_html_escape($mixed[$keys[$i]]);
            }
            return $mixed;
        }

        // escape some symbols with predefined entities
        return ( is_string($mixed) ) ? htmlspecialchars($mixed) : $mixed;;
    }

    function d_mem(){

        $mem = memory_get_usage();
        $mem = $mem / 1024;
        $mem = sprintf('Memory used: %0.3f KB', $mem);
        d_echo($mem);

        $mem = memory_get_peak_usage();
        $mem = $mem / 1024;
        $mem = sprintf('Memory peak used: %0.3f KB', $mem);
        d_echo($mem);

        return true;
    }
}
else{
    function d_mem(){}
    function d_echo($mixed, $mode = '', $die = false){}
    function d_html_escape($mixed){}
}





?>