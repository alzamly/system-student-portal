<?php

class Schools extends Controller {

    public function index($name = '') {
        $this->select = $this->loadModel('SelectData');

        $schools = $this->getSchools();

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/schools/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

     public function getSchools() {

        $return = $this->select->pqSelectAll("departments_foundation");
        return $return;
    }

}