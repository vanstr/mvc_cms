<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 20:01
 */

class User extends Model{

    private $admin = false;
    private $loggedIn = false;
    public $user_id;

    public function __construct($db = null, $userId = null) {
        if( $db != null) $this->db = $db;
        if ($userId != null) {

            $sql = "SELECT * FROM users WHERE id= " . $userId;

            $result = $this->db->query($sql);
            d_echo($result);
            if ($result->num_rows != 0) {
                if (($result->row['type']) == "admin") {
                    $this->admin = true;
                }
                $this->user_id = $userId;
                $this->loggedIn = true;
            }
        }
        d_Echo("Model class constructed : " . get_class($this));
        d_echo($this);
    }

    public function isLoggedIn() {
        return $this->loggedIn;
    }

    public function setLoggedIn($state) {
        $this->loggedIn = $state;
    }

    public function setAdmin($state) {
        $this->admin = $state;
    }

    public function isAdmin() {
        return $this->admin;
    }



} 