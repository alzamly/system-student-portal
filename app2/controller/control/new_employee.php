<?php


class New_employee extends Controller
{
	public function index($name = '')
	{
		$this->select = $this->loadModel('SelectData');

		$departments_foundation = $this->getDepartmentsFoundation();

		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/new_employee/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
        
	}

	public function getDepartmentsFoundation() {
        $return = $this->select->pqSelectAll("departments_foundation");
        return $return;
    }

	public function checkUsernameIsFound() {
        $select = $this->loadModel('SelectData');
        $username = $_POST['username'];

        $arr_check = $select->pqGetRowsByAnyColumn("users", "UUsername", $username);

        if (count($arr_check) > 0) {
            echo "found";
        } else {
            echo "not_found";
        }
    }


	public function addNewEmployee()
	{
		$select = $this->loadModel('SelectData');
		$add = $this->loadModel('Add_New');

		$full_name   = $_POST['full_name'];
		$username    = $_POST['username'];
		$password    = $_POST['password'];
	    $permissions = $_POST['permissions'];

	    $tablename = "users";

	    $is_found_username = $select->pqCheckStringIsFound($tablename,"UUsername",$username);

	    if (count($is_found_username) > 0) {
	    	echo "اسم المستخدم موجود مسبقا قم باختيار اسم اخر";
	    }
	    else
	    {
	    	$arrayData = array(
				'UName' => $full_name,
				'UUsername' => $username,
				'UPassword' => $password,
				'UDepartmentFoundationId' => $permissions
			);

			$return = $add->pqInsertData($tablename, $arrayData);

			if ($return) {
				echo "تم اضافة موظف جديد";
			}
	    }
		
	}

	
}