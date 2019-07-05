<?php

class Classes_view extends Controller {

    public function index($name = '') {
    	$this->select = $this->loadModel('SelectData');

    	$classes = $this->getClasses();

        require VIEW . $_SESSION['control_pq'] . '/_templates/header.php';
        require VIEW . $_SESSION['control_pq'] . '/classes_view/index.php';
        require VIEW . $_SESSION['control_pq'] . '/_templates/footer.php';
    }

    public function getClasses() {
        

        $foundation_section = $_GET['foundation_section'];

        $return = $this->select->pqSelectAll("classes WHERE CDepartmentFoundationId = $foundation_section");
        return $return;
    }

    public function addNewDivision() {
        $select = $this->loadModel('SelectData');
        $add = $this->loadModel('Add_New');


        $class_id = $_POST['class_id'];
        $division_name = $_POST['division_name'];

        $tablename = "divisions";

        $arrayData = array(
            'ClassId' => "$class_id",
            'DivisionName' => "$division_name"
        );

        $return = $add->pqInsertData($tablename, $arrayData);

        if ($return) {
            echo "تم اضافة شعبة جديدة";
        }
    }


     public function displayDiv() {
                $select = $this->loadModel('SelectData');

                $class_id = $_POST['class_id'];

                $divisions = $select->pqSelectAll("divisions WHERE ClassId = $class_id");
                ?>

        <table class="table table-striped" style=" direction: rtl;">

            <thead>
                <tr>
                    <th style=" text-align: right;">#</th>
                    <th style=" text-align: right;">الشعبة</th>
                    <th style=" text-align: right;">تعديل</th>
                    <th style=" text-align: right;">حذف</th>
                </tr>
            </thead>

            <tbody>

        <?php
        for ($i = 0; $i < count($divisions); $i++) {
            ?>

                    <tr  style=" text-align: right;">

                        <td>
                            <label><?php echo ($i + 1) . ' - '; ?></label>
                        </td>

                        <td>
                            <label><?php echo $divisions[$i]['DivisionName']; ?></label>
                        </td>

                        <td>
                            <button type="button" class="btn btn-default" onclick="" data-toggle="modal" data-target="#myModal">تعديل</button>
                        </td>

                        <td>
                            <button type="button" class="btn btn-default" onclick="" data-toggle="modal" data-target="#myModal">حذف</button>
                        </td>
                    </tr>

            <?php
        }
        ?>
            </tbody>
        </table>
        <?php
    }



    public function addNewMaterial() {
        $add = $this->loadModel('Add_New');


        $class_id = $_POST['class_id_material'];
        $material_name = $_POST['material_name'];

        $tablename = "material";

        $arrayData = array(
            'MName' => "$material_name",
            'MClassId' => "$class_id"
        );

        $return = $add->pqInsertData($tablename, $arrayData);

        if ($return) {
            echo "تم اضافة مادة جديدة";
        }
    }


           public function getMaterials() {
                $select = $this->loadModel('SelectData');

                $class_id = $_POST['class_id'];

                $materials = $select->pqSelectAll("material WHERE MClassId = $class_id");
                ?>

        <table class="table table-striped" style=" direction: rtl;">

            <thead>
                <tr>
                    <th style=" text-align: right;">#</th>
                    <th style=" text-align: right;">المادة</th>
                    <th style=" text-align: right;">تعديل</th>
                    <th style=" text-align: right;">حذف</th>
                </tr>
            </thead>

            <tbody>

        <?php
        for ($i = 0; $i < count($materials); $i++) {
            ?>

                    <tr  style=" text-align: right;">

                        <td>
                            <label><?php echo ($i + 1) . ' - '; ?></label>
                        </td>

                        <td>
                            <label><?php echo $materials[$i]['MName']; ?></label>
                        </td>

                        <td>
                            <button type="button" class="btn btn-default" onclick="" data-toggle="modal" data-target="#myModal">تعديل</button>
                        </td>

                        <td>
                            <button type="button" class="btn btn-default" onclick="" data-toggle="modal" data-target="#myModal">حذف</button>
                        </td>
                    </tr>

            <?php
        }
        ?>
            </tbody>
        </table>
        <?php
    }

    
}