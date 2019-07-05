<?php


class Tutorials extends Controller
{
	public function index($name = '')
	{
		$tutorials = $this->getTutorials();

		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/tutorials/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
	}

	public function getTutorials()
	{
		$select = $this->loadModel('SelectData');

		$return = $select->pqGetRowsByAnyColumn("lectures", "CId", $_GET['course']);
		return $return;
	}
}