<?php


class Add_outly extends Controller
{
	public function index($name = '')
	{
		$this->select = $this->loadModel('SelectData');

        $departments_foundation = $this->getDepartmentsFoundation();

		$outly_types = $this->getOutlyTypes();

		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/add_outly/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
        
	}

	public function getDepartmentsFoundation() {

        $return = $this->select->pqSelectAll("departments_foundation WHERE DFType='school'");
        return $return;
    }


	public function addOutly()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');

		$outly_type   			= $_POST['outly_type'];
		$amount    				= $_POST['amount'];
		$note    				= $_POST['note'];
	    $datepicker_outly_date  = $_POST['datepicker_outly_date'];
	    $departments_foundation = $_POST['departments_foundation'];

	    $tablename = "outly";
	   
    	$arrayData = array(
			'OTypeOutly' => $outly_type,
			'OAmount' => $amount,
			'ONotes' => "$note",
			'OOutlyDate' => $datepicker_outly_date,
			'ODate' => date('Y-m-d'),
			'ODepartmentsFoundationId' => "$departments_foundation"
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم اضافة المصاريف";
		}
	    
		
	}

	public function getOutlyTypes()
	{	
		$return = $this->select->pqSelectAll("type_outly");
		return $return;
	}


	
}