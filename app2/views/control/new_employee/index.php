<style type="text/css">
#id_new_employee{
	width: 70%;
	margin: auto
}
</style>

<script type="text/javascript">

	function func_new_employee(){

		if (confirm("هل تريد اضافة موظف جديد")) 
		{

			var full_name   = $('#full_name').val().trim();
			var username    = $('#username').val().trim();
			var password    = $('#password').val().trim();
			var permissions = $('#permissions').val().trim();

			$.ajax({
		        url: "./new_employee/addNewEmployee",
		        type: "post",
		        data: {
		        	full_name:full_name,
		        	username:username,
		        	password:password,
		        	permissions:permissions
		        },
		        success: function (data) {
		           // you will get response from your php page (what you echo or print)                 
		           	alert(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}

	}

	function func_check_username()
	{
	  var username = $('#username').val();

	  $.ajax({
	        url: "./new_employee/checkUsernameIsFound",
	        type: "post",
	        data: {
	          username:username
	        },
	        success: function (data) {

	          if(data == "found")
	          {
	            $("#id_show_alert_check_family_username").css("display","block");
	            $("#id_show_alert_check_family_username").html("اسم المستخدم موجود , اختر اسم مستخدم اخر");  
	          }
	          else
	          {
	            $("#id_show_alert_check_family_username").css("display","none");
	          }
	          
	          
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        }


	    });
	}
	 

</script>

<form id="id_new_employee" style="    direction: rtl;
    border: 1px solid #00000014;
    padding: 10px;
    width: 100%;
    background: white;
    box-shadow: 1px 1px 5px -1px grey;">
  <div class="form-group">
    <label for="full_name">اسم الموظف</label>
    <input type="text" class="form-control" id="full_name" placeholder="اسم الموظف">
  </div>
  <div class="form-group">
    <label for="username">اسم المستخدم</label>
    <input type="text" onkeyup="func_check_username()" class="form-control" id="username" placeholder="اسم المستخدم">
    <div id="id_show_alert_check_family_username" style=" width: 100%; background: #f443366e; padding: 7px; margin-top: 2px; border-radius: 4px; display: none;"></div>
  </div>
  <div class="form-group">
    <label for="password">كلمة المرور</label>
    <input type="password" class="form-control" id="password" placeholder="كلمة المرور">
  </div>

  <div class="form-group">
    <label for="permissions">تخصص الموظف</label>
    <select class="form-control" id="permissions">
    	<?php for ($i=0; $i < count($departments_foundation); $i++) { 
    		?>
    		<option value="<?php echo $departments_foundation[$i]['DFId'];?>"><?php echo $departments_foundation[$i]['DFName'];?></option>
    		<?php
    	}?>
	  
	</select>
  </div>
  
  <button type="button" class="btn btn-default" onclick="func_new_employee()">اضافة موظف جديد</button>
</form>