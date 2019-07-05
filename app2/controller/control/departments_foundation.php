<?php

class Departments_foundation extends Controller {

    public function index($name = '') {
    	
    	$this->select = $this->loadModel('SelectData');
        $departments_foundation = $this->getDepartmentsFoundation();
        
        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/departments_foundation/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }


    public function getDepartmentsFoundation() {

        $return = $this->select->pqSelectAll("departments_foundation WHERE DFStructure='sp_school'");
        return $return;
    }

}