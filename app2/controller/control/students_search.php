<?php

class Students_search extends Controller {

    public function index($name = '') {
        $this->select = $this->loadModel('SelectData');

        $schools = $this->getDepartmentsFoundation();

        $students = $this->getSearchStudents();

        $result_search = $this->getSearchStudents();


        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/students_search/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getDepartmentsFoundation() {

        $return = $this->select->pqSelectAll("departments_foundation WHERE DFStructure='sp_school' OR DFStructure='sp_nurs'");
        return $return;
    }

    public function getHtmlClasses() {

        $select = $this->loadModel('SelectData');

        $dep_fon = $_POST['dep_fon'];

        $return = $select->pqSelectAll("classes WHERE CDepartmentFoundationId=$dep_fon");
        ?>
        <option value="all">كل الصفوف</option>
          <?php
          for ($i=0; $i < count($return); $i++) { 
            ?>
            <option value="<?php echo $return[$i]['CId'];?>"><?php echo $return[$i]['ClassName'];?></option>
            <?php
          }
          
    }

    public function getHtmlDiv() {

        $select = $this->loadModel('SelectData');

        $class_id = $_POST['class_id'];

        $return = $select->pqSelectAll("divisions WHERE ClassId=$class_id");
        ?>
        <option value="all">كل الشعب</option>
          <?php
          for ($i=0; $i < count($return); $i++) { 
            ?>
            <option value="<?php echo $return[$i]['DId'];?>"><?php echo $return[$i]['DivisionName'];?></option>
            <?php
          }
          
    }


    public function getSearchStudents()
    {
        if (isset($_GET['school'])) {
            $school = $_GET['school'];
            $class = $_GET['class'];
            $div = $_GET['div'];
            $search = $_GET['search'];
            $return = $this->select->pqSearchStudents($school, $class, $div, $search);
            return $return;
        }
        
        return null;
    }

}