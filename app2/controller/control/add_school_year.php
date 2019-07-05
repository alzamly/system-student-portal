<?php

class Add_school_year extends Controller {

    public function index($name = '') 
    {
    	$this->select = $this->loadModel('SelectData');

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/add_school_year/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function addSchoolYear()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');


		$from_year = $_POST['from_year'];
		$to_year = $_POST['to_year'];
		
	    $tablename = "school_year_values";

    	$arrayData = array(
			'SYVFromYear' => "$from_year",
			"SYVToYear" => "$to_year",
			'SYVIsRunning' => "off"
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة سنة دراسية";
		}
	    
		
	}

}