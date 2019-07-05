<script>

  function getClasses(val)
  {

    $.ajax({
          url: "./students_search/getHtmlClasses",
          type: "post",
          data: {
            dep_fon:val.value
          },
          success: function (data) {

            $('#id_classes').html(data);


          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }


      });
  }

  function getDiv(val)
  {

    $.ajax({
          url: "./students_search/getHtmlDiv",
          type: "post",
          data: {
            class_id:val.value
          },
          success: function (data) {

            $('#id_div').html(data);

           
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }


      });
  }

  function create_search_link(url)
  {
    var id_schools = $("#id_schools").val().trim();
    var id_classes = $("#id_classes").val();
    var id_div = $("#id_div").val().trim();
    var id_search_text = $("#id_search_text").val();

    $("#link_search").attr("href", url+"students_search?school="+id_schools+"&class="+id_classes+"&div="+id_div+"&search="+id_search_text);
  }





</script>

<div style=" width: 100%; height: 50px; text-align: center;">
	<p style=" font-size: 22px; font-weight: bold;">البحث عن الطلاب</p>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <select class="form-control rounded-0" id="id_schools" onchange="getClasses(this);">
      <option value="all">القسم</option>
      <?php
      for ($i=0; $i < count($schools); $i++) { 
      	?>
      	<option value="<?php echo $schools[$i]['DFId'];?>"><?php echo $schools[$i]['DFName'];?></option>
      	<?php
      }
      ?>
      
    </select>  

     <select class="form-control rounded-0" onchange="getDiv(this);" id="id_classes">
      <option value="all">الصف</option>
      
    </select>  

     <select class="form-control rounded-0" id="id_div">
      <option value="all">الشعبة</option>
    </select>  

    <input type="text" id="id_search_text" class="form-control rounded-0"  placeholder="اسم الطالب">
    
    <a type="button" id="link_search" onclick="create_search_link('<?php echo URL;?>')" href="" class="btn btn-secondary rounded-0">بحث</a>
</nav>




<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>اسم الطالب</th>
        <th>تسديد القسط</th>
        <th>عرض القسط</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	for ($i=0; $i < count($result_search); $i++) { 
        $student_id = $result_search[$i]['SId'];
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td><?php echo $result_search[$i]['SName'];?></td>
              <td>
                <button type="button" class="btn btn-secondary rounded-0" onclick="func_set_student_id_for_payment('<?php echo $result_search[$i]['SId'];?>')" data-toggle="modal" data-target="#myModal_pay">تسديد</button>
              </td>
              <td>
                <a href="<?php echo URL.'student_tuition_fees?student='.$student_id;?>" class="btn btn-info rounded-0">عرض</a>
              </td>
			      </tr>
    		<?php
    	}
    	?>
      
    </tbody>
  </table>