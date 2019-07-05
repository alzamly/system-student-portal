<?php


class Create_credit_balance extends Controller
{
	public function index($name = '')
	{
		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/create_credit_balance/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
        
	}


	public function createNewBalance()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');

		$create_balance   = $_POST['create_balance'];

	    $digits_needed=12;
		$random_number=''; // set up a blank string
		$count=0;
		while ( $count < $digits_needed ) {
		    $random_digit = mt_rand(0, 9);
		    
		    $random_number .= $random_digit;
		    $count++;
		}

		echo "string :: ". $random_number;
	}

	
}