<?php


class New_class extends Controller
{
	public function index($name = '')
	{
		$this->select = $this->loadModel('SelectData');
        $departments_foundation = $this->getDepartmentsFoundation();

		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/new_class/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';

	}

    public function getDepartmentsFoundation() {

        $return = $this->select->pqSelectAll("departments_foundation WHERE DFStructure='sp_school'");
        return $return;
    }

	public function addNewClass()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');


		$class_name = $_POST['class_name'];
		$departments_foundation_id = $_POST['departments_foundation_id'];

	    $tablename = "classes";

    	$arrayData = array(
			'ClassName' => "$class_name",
			'CDepartmentFoundationId' => "$departments_foundation_id"
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة صف جديد";
		}
	    
		
	}

	
}