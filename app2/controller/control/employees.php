<?php


class Employees extends Controller
{
	public function index($name = '')
	{
		$employees = $this->getEmployees();

		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/employees/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
	}

	public function getEmployees()
	{	
		$select = $this->loadModel('SelectData');
		$return = $select->pqGetEmployeesData();
		return $return;
	}


}

?>