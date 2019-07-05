<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Evaluation_cases extends Controller {

    public function index($name = '') {
        $evaluation_cases = $this->getEvaluationCases();

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/evaluation_cases/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function addNewEvaluationCases() {
        $select = $this->loadModel('SelectData');
        $add = $this->loadModel('Add_New');

        $case_text = $_POST['case_text'];

        $tablename = "evaluation_cases";

        $arrayData = array(
            'ECCase' => "$case_text"
        );

        $return = $add->pqInsertData($tablename, $arrayData);

        if ($return) {
            echo "تم اضافة";
        }
    }

    public function getEvaluationCases() {
        $select = $this->loadModel('SelectData');
        $return = $select->pqSelectAll("evaluation_cases");
        return $return;
    }

}
