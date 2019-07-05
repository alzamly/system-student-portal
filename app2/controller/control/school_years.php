<?php

class School_years extends Controller {

    public function index($name = '') {
        $this->select = $this->loadModel('SelectData');

        $school_years = $this->getSchoolYears();
        

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/school_years/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getSchoolYears() {

        $return = $this->select->pqSelectAll("school_year_values ORDER BY SYVId DESC");
        return $return;
    }

    public function runSchoolYear()
    {
        $update = $this->loadModel('Update');


        $id = $_POST['id'];
        
        $tablename = "school_year_values";

        $arrayData = array(
            'SYVIsRunning' => "off"
        );

        $return = $update->pqUpdateDataByAnyColumn($tablename, $arrayData, "SYVIsRunning", "on");


        $arrayData = array(
            'SYVIsRunning' => "on"
        );

        $return = $update->pqUpdateDataByAnyColumn($tablename, $arrayData, "SYVId", $id);

        if ($return) {
            echo "تم تفعيل السنة الدراسية";
        }
    }

}