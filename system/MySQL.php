<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 23:32
 */

final class MySQL {
    private $link;

    public function __construct($hostname, $username, $password, $database) {
        if (!$this->link = mysql_connect($hostname, $username, $password)) {
            trigger_error('Error: Could not make a database link using ' . $username . '@' . $hostname);
        }

        if (!mysql_select_db($database, $this->link)) {
            trigger_error('Error: Could not connect to database ' . $database);
        }

        mysql_query("SET NAMES 'utf8'", $this->link);
        mysql_query("SET CHARACTER SET utf8", $this->link);
        mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $this->link);
        mysql_query("SET SQL_MODE = ''", $this->link);
    }

    public function query($sql) {
        $resource = mysql_query($sql, $this->link);

        if ($resource) {
            if (is_resource($resource)) {
                $i = 0;

                $data = array();

                while ($result = mysql_fetch_assoc($resource)) {
                    $data[$i] = $result;

                    $i++;
                }

                mysql_free_result($resource);

                $query = new stdClass();
                $query->row = isset($data[0]) ? $data[0] : array();
                $query->rows = $data;
                $query->num_rows = $i;

                unset($data);

                return $query;
            } else {
                return true;
            }
        } else {
            trigger_error('Error: ' . mysql_error($this->link) . '<br />Error No: ' . mysql_errno($this->link) . '<br />' . $sql);
            exit();
        }
    }

    public function escape($value) {
        return mysql_real_escape_string($value, $this->link);
    }

    public function countAffected() {
        return mysql_affected_rows($this->link);
    }

    public function getLastId() {
        return mysql_insert_id($this->link);
    }

    public function __destruct() {
        mysql_close($this->link);
    }



    public function insertQuery($table, $what){

        $separator = '';
        $what_keys ='';
        $what_values ='';
        foreach($what as $key => $value){
            $what_keys .= $separator.$this->escape($key);
            $what_values .=$separator.'"'.$this->escape($value).'"';
            $separator = ', ';
        }

        $sql = "INSERT INTO ".$table." ( ".$what_keys." ) VALUES (".$what_values.")	";
        d_echo($sql);
        return $this->query($sql);
    }


    public function updateQuery($table, $what, $where){

        $separator = '';
        $what_keys ='';
        foreach($what as $key => $value){
            if($key!=''){
                $what_keys .=$separator.$key.'="'.$this->escape($value).'"';
                $separator = ', ';
            }
        }

        $separator = '';
        $where_keys ='';
        foreach($where as $key => $value){
            $where_keys .=$separator.$key.' = '.$this->escape($value);
            $separator = ' AND ';
        }

        $sql = "UPDATE ".$table." SET ".$what_keys." ".(($where_keys)?'WHERE '.$where_keys :'')." ";

        return $this->query($sql);
    }


    public function deleteQuery($table, $where){

        $separator = '';
        $where_keys ='';
        foreach($where as $key => $value){
            $where_keys .=$separator.$key.' = '.$this->escape($value);
            $separator = ' AND ';
        }

        $sql = "DELETE FROM ".$table." WHERE ".$where_keys." ";

        return $this->query($sql);

    }

}
?>