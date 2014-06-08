<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 20:01
 */

class User{

    private $admin = false;
    private $loggedIn = false;
    private $id = 0;

    /** @var MySQL */
    public $db;


    public function __construct($db) {

        $this->db = $db;

        if( isset($_SESSION['user_id']) && $_SESSION['user_id'] != null ){
            //d_echo("user constructor");
            $userId = (int)$_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE id= " . $userId;
            $db = $this->db;
            $result = $db->query($sql);
            if ($result->num_rows != 0) {
                if (($result->row['type']) == "admin") {
                    $this->admin = true;
                }
                $this->id = $userId;
                $this->loggedIn = true;
            }
        }
        //d_echo($this);
    }

    public function getID() {
        return $this->id;
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