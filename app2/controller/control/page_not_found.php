<?php

class Page_not_found extends Controller {

    public function index($name = '') {

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/page_not_found/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }
}