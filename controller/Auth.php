<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 14.8.6
 * Time: 17:51
 */

class AuthController extends Controller{
    protected function actionLogin() {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $query = $this->registry->db->query("SELECT * FROM users WHERE login = '".escape($_POST['login'])."' AND password ='".escape($_POST['password'])."' ");
            d_echo($query);
            if ($query->num_rows == 0) {
                d_echo("auth failed");
            } else {
                $_SESSION['user_id'] = $query->row['id'];
                header('Location: ?content=news');
            }
        }
    }

    protected function actionLogout() {
        $this->registry->user->setAdmin(false);
        $this->registry->user->setLoggedIn(false);
        $_SESSION['user_id'] = null;
        header('Location: ?content=news' );
    }
} 