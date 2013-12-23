<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.13.12
 * Time: 00:04
 */

function escape($value) {
    return mysql_real_escape_string(htmlspecialchars($value));
}



// Content -------------------------------------------------------------------->
// d_html_escape                    - escape HTML
// d_echo                           - print content between <pre> tags, that allows to see data in "nice" format in HTML page
// d_mem                            - print allocated memory in KB.
// ---------------------------------------------------------------------------->

if( !function_exists('d_html_escape') ){

    // d_html_escape()
    //   escape HTML
    // parameters:
    //   $mixed - string, int, float or array.
    // return:
    //   string - escaped string (if $mixed was string, int or float)
    //   array  - escaped array (if $mixed was array)
    // notes:
    //   - WARNING: must be used only by programmers, while development
    // dependancies:
    //   -
    // history:
    //   03.05.2011 - AL - created
    //   01.08.2011 - AL - only string are html-escaped
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
    } // d_html_escape
}

if( APP_DEBUG ){

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
    // dependancies:
    //   -
    // history:
    //   23.07.2010 - AL - created
    //   05.08.2011 - AL - bool & NULL always printed with var_dump
    //   18.08.2011 - AL - values always HTML-escaped
    //   01.09.2011 - AL - 'b' (bold) added
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
    } // d_echo
}
else{
    function d_echo($mixed, $mode = '', $die = false){}
}


if( !function_exists('d_mem') ){

    // d_mem()
    //   print allocated memory in KB.
    // parameters:
    //   -
    // return:
    //   true - OK
    // notes:
    //   - WARNING: must be used only by programmers, while development
    // dependancies:
    //   d_echo()
    // history:
    //   22.02.2011 - AL - created
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
    } // d_mem
}

?>