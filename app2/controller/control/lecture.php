<?php


class Lecture extends Controller
{
	public function index($name = '')
	{
		$lectures = $this->getDataLecture();
		
		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/lecture/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
	}

	public function getDataLecture()
	{
		$select = $this->loadModel('SelectData');

		$return = $select->pqGetRowsByAnyColumn("lecture_videos", "LId", $_GET['lecture']);
		return $return;
	}
}