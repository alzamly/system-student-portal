
<div style="direction: rtl;">


	<form action="<?php echo URL; ?>add_files/uploadFiles" method="post" enctype="multipart/form-data">

		<div class="form-group has-success">
		  <label class="control-label" for="file">اختر ملف (PDF)</label>

		  <input type="file" name="file" id="file" class="form-control" aria-describedby="helpBlock2" /> 

		  <input type="text" name="lecture" value="<?php echo $_GET['lecture'];?>" style=" display: none;"/> 
		  
		  <span id="helpBlock2" class="help-block"></span>
		</div>

		<hr >


		<div class="form-group">
			<label for="input_file_description">شرح توضيحي عن عن الفيديو ( اختياري )</label>
			<textarea class="form-control" rows="3" id="input_file_description" name="file_description"></textarea>
		</div>

		<hr >


		<input type="submit" name="submit" value="إضافة الملف الى الدرس" class="btn btn-info" />


	</form>

</div>




