<?php


class Outly_types extends Controller
{
	public function index($name = '')
	{
		$outly_types = $this->getOutlyTypes();
		
		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/outly_types/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
        
	}


	public function addNewOutlyType()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');

		$type_name   = $_POST['type_name'];

	    $tablename = "type_outly";
	    
    	$arrayData = array(
			'TOName' => $type_name
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة";
		}
	    
		
	}


	public function getOutlyTypes()
	{	
		$select = $this->loadModel('SelectData');
		$return = $select->pqSelectAll("type_outly");
		return $return;
	}

	
}