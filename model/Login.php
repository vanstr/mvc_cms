<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.15.12
 * Time: 23:49
 */

class Login extends Model {
    public $tplName = 'login';
    public $allowedActions = array(
        'login' => 'actionLogin',
        'logout' => 'actionLogout'
    );

    public function __construct() {
        d_Echo("Model class constructed : " . get_class($this));
    }

    public function actionLogin() {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $query = $this->db->query("SELECT * FROM users WHERE login = '".escape($_POST['login'])."' AND password ='".escape($_POST['password'])."' ");
            d_echo($query);
            if ($query->num_rows == 0) {
                d_echo("auth failed");
            } else {
                $_SESSION['user_id'] = $query->row['id'];
                header('Location: ?page=news');
            }
        }
    }

    public function actionLogout() {
        $this->user->setAdmin(false);
        $this->user->setLoggedIn(false);
        $_SESSION['user_id'] = null;
        header('Location: ?page=news' );
    }

    public function render() {
        //header('Location: ?page=news' );

        $this->tpl->assign("loginHeader", $this->getTextByName("loginHeader"));
        $this->tpl->assign("loginToYourAccount", $this->getTextByName("loginToYourAccount"));
        $this->tpl->assign("loginLeftColumn", $this->getTextByName("loginLeftColumn"));

        $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);

        return $modelHTML;

    }
}

?>
