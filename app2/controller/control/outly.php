<?php


class Outly extends Controller
{
	public function index($name = '')
	{
		$outly = $this->getOutly();
		
		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/outly/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
        
	}



	public function getOutly()
	{	
		$select = $this->loadModel('SelectData');
		$return = $select->pqSelectAll("outly,type_outly,departments_foundation WHERE outly.OTypeOutly=type_outly.TOId AND outly.ODepartmentsFoundationId=departments_foundation.DFId");
		return $return;
	}

	
}