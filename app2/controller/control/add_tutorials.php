<?php


class Add_tutorials extends Controller
{
	public function index($name = '')
	{
		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/add_tutorials/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
	}

	public function addTutorial()
	{
		$add = $this->loadModel('Add_New');


		$tutorial_title 	   = $_POST['tutorial_title'];
		$tutorial_description  = $_POST['tutorial_description'];
		$course  			   = $_POST['course'];

	    $tablename = "lectures";

    	$arrayData = array(
			'CId' => $course,
			'LectureTitle' => "$tutorial_title",
			'LectureDescription' => "$tutorial_description",
			'LDate' => date('Y-m-d')
		);

		$return = $add->pqInsertData($tablename, $arrayData);

		if ($return) {
			echo "تم إضافة درس جديد";
		}
	}

}