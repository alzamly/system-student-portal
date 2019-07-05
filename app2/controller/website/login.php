<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/login/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
    }

    
    public function funcLogin()
    {

        if (isset($_POST["btn_login"])) {

            $login_model = $this->loadModel('LoginModel');
            $arr = $login_model->pqLogin($_POST["username"], $_POST["password"]);
        }

        if (count($arr) > 0) {

            $_SESSION['control_pq'] = "control";

            header('location: ' . URL );
            //. @$_SESSION['control_pq']. '/home/index'
        }
        else
        {
            header('location: ' . URL );
            //. @$_SESSION['control_pq']. '/home/index'
        }
    }

    
}
