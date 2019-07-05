<?php

class Tuition_fees extends Controller {

    public function index($name = '') {
        $this->select = $this->loadModel('SelectData');

        $tuition_fees = $this->getTuitionFees();
        $classes = $this->getClasses();
        

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/tuition_fees/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getTuitionFees() {

        $return = $this->select->pqSelectAll("tuition_fees,departments_foundation,school_year_values WHERE tuition_fees.TFDepartmentsFoundation=departments_foundation.DFId AND tuition_fees.TFSchoolYearValueId=school_year_values.SYVId");
        return $return;
    }

    public function getClasses() {

        $return = $this->select->pqSelectAll("classes");
        return $return;
    }

}