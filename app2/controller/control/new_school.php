<?php

class New_school extends Controller {

    public function index($name = '') {

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/new_school/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }


    public function addNewSchool()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');


		$school_name = $_POST['school_name'];
		$structure_val = $_POST['structure_val'];

		if ($structure_val == "sp_school" || $structure_val == "sp_nurs") {
			$type = "school";
		}

	    $tablename = "departments_foundation";

    	$arrayData = array(
			'DFName' => "$school_name",
			"DFDate" => date("Y-m-d"),
			'DFType' => "$type",
			'DFStructure' => "$structure_val"
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة مدرسة جديدة";
		}
	    
		
	}

}