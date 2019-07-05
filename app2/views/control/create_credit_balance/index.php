<script type="text/javascript">

	function func_create_new_balance()
	{
		var create_balance = "true";

		//if(confirm("هل تريد تكوين رصيد"))
		//{
			$.ajax({
		        url: "./create_credit_balance/createNewBalance",
		        type: "post",
		        data: {
		        	create_balance:create_balance
		        },
		        success: function (data) {
		           // you will get response from your php page (what you echo or print)                 
		           	alert(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }


		    });
		//}
	}

</script>



<div class="form-group has-success" style=" text-align: center;">
  <label class="control-label" for="input_course_title" style=" display: block; font-size: 34px;">تكوين رقم رصيد جديد</label>
  <button type="button" class="btn btn-primary btn-lg" onclick="func_create_new_balance()">تكوين رصيد</button>
  <span id="helpBlock2" class="help-block">عند الضغط على تكوين رصيد سوف يتم انشاء رقم جديد للرصيد وبعدها عليك ان تقوم بتثبيت الرقم للطباعة</span>
</div>