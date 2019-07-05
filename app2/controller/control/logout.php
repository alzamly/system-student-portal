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

class Logout extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    
    public function index()
    {
        session_destroy();

        $_SESSION['control_pq'] = 'website';
        
        require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/home/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
        
    }

}
