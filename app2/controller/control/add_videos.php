<?php


class Add_videos extends Controller
{
	public function index($name = '')
	{
		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';
        require VIEW. $_SESSION['control_pq'] .'/add_videos/index.php';
        require VIEW. $_SESSION['control_pq'] .'/_templates/footer.php';
	}

	public function uploadVideos()
	{
        $add = $this->loadModel('Add_New');

        $array = [];
		require VIEW. $_SESSION['control_pq'] .'/_templates/header.php';

        $target_dir = "public/tutorials_videos/";
        $name = $_FILES["file"]["name"];

       // $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($name,PATHINFO_EXTENSION);

        $random = rand(0, 999999);
        $extention = explode('.', $name);
        $filename = $random.'_'.date('d_m_Y').'_'.time().'.'.$imageFileType;
        $target_file = $target_dir.$filename;

        // Check if file already exists
        if (file_exists($target_file)) {
            #echo "Sorry, file already exists.";
            $uploadOk = 0;

            $array[] = "Sorry, file already exists.";
        }

         // Check file size -- Kept for 5GB
        if ($_FILES["file"]["size"] > 5000000000) {
            #echo "Sorry, your file is too large.";
            $uploadOk = 0;

            $array[] = "Sorry, your file is too large.";
        }

        // Allow certain file formats
        if($imageFileType != "wmv" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "MP4") {
            #echo "Sorry, only wmv, mp4 & avi files are allowed.";
            $uploadOk = 0;

            $array[] = "Sorry, only wmv, mp4 & avi files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            #echo "Sorry, your file was not uploaded.";

            $array[] = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
        } else {
            $lecture = $_POST['lecture'];

            if (!empty($lecture)) 
            {
            
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    #echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

                    $array[] = "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";


                    // insert data to database

                    $tablename = "lecture_videos";

                    $video_description = $_POST['video_description'];

                    $arrayData = array(
                        'LId' => $lecture,
                        'VideoURL' => "$filename",
                        'VideoDescription' => "$video_description",
                        'VideoTime' => time()
                    );

                    $return = $add->pqInsertData($tablename, $arrayData);

                    if ($return) {
                        $array[] = "تم حفظ الفيديو";
                    }



                } else {
                    #echo "Sorry, there was an error uploading your file.";

                    $array[] = "Sorry, there was an error uploading your file.";
                }
            }
            else {

                $array[] = "قم باختيار احد الدروس";
            }
        }
    	
        for ($i=0; $i < count($array); $i++) 
        { 
        
    	?>
    		<div class="alert alert-warning alert-dismissible" role="alert">
    		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    		  <strong></strong> <?php echo $array[$i];?>
    		</div>
	    <?php    
        }

        require VIEW. $_SESSION['control_pq'] ."/add_videos/index.php";
        require VIEW. $_SESSION['control_pq'] ."/_templates/footer.php";
	}
}