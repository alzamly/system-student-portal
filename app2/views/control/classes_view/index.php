<script>



function func_set_class_id(id)
{
  $('#input_class_id').val(id);
}

function func_set_class_id_material(id)
{
  $('#input_class_id_material').val(id);
}

function func_add_division()
{
    var input_class_id   = $('#input_class_id').val().trim();

    var input_division_name   = $('#input_division_name').val().trim();

    if (input_division_name !== "")
    {
      if(confirm("هل تريد اضفة شعبة جديدة"))
      {
        $.ajax({
              url: "./classes_view/addNewDivision",
              type: "post",
              data: {
                class_id:input_class_id,
                division_name:input_division_name
              },
              success: function (data) {

                  alert(data);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }


          });
      }
    }
    else
    {
      alert("قم بادخال الشعبة !");
    }

  
}


function func_display_division(class_id)
{

    $.ajax({
          url: "./classes_view/displayDiv",
          type: "post",
          data: {
            class_id:class_id
          },
          success: function (data) {

              $("#id_display_div").html(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }


      }); 
  
}



function func_add_material()
{
    var input_class_id_material   = $('#input_class_id_material').val().trim();

    var input_material_name   = $('#input_material_name').val().trim();

    if (input_material_name !== "")
    {
      if(confirm("هل تريد اضفة مادة جديدة"))
      {
        $.ajax({
              url: "./classes_view/addNewMaterial",
              type: "post",
              data: {
                class_id_material:input_class_id_material,
                material_name:input_material_name
              },
              success: function (data) {

                  alert(data);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }


          });
      }
    }
    else
    {
      alert("قم بادخال الشعبة !");
    }
}

function func_show_materials(class_id,class_title)
{
  $('.cls_title_materials').text(" مواد الصف "+class_title);

  $.ajax({
        url: "./classes_view/getMaterials",
        type: "post",
        data: {
          class_id:class_id
        },
        success: function (data) {
          $("#id_modal_body_show_materials").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}


</script>
<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>الصف</th>
        <th>اضافة شعبة</th>
        <th>عرض الشُعب</th>
        <th>اضافة مادة</th>
        <th>عرض المواد</th>
        <th>تعديل</th>
        <th>حذف</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	for ($i=0; $i < count($classes); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td><?php echo $classes[$i]['ClassName'];?></td>
			        <td>
                <button type="button" class="btn btn-success" onclick="func_set_class_id('<?php echo $classes[$i]['CId'];?>')" data-toggle="modal" data-target="#myModal">اضافة شعبة</button>
                          </td>
                    <td>
                <button type="button" class="btn btn-info" onclick="func_display_division('<?php echo $classes[$i]['CId'];?>')" data-toggle="modal" data-target="#myModal_display_div">عرض</button>
                          </td>

                    <td>
                <button type="button" class="btn btn-success" onclick="func_set_class_id_material('<?php echo $classes[$i]['CId'];?>')" data-toggle="modal" data-target="#myModal_material">اضافة مادة</button>
                          </td>
                    <td>
                <button type="button" class="btn btn-info" onclick="func_show_materials('<?php echo $classes[$i]['CId'];?>','<?php echo $classes[$i]['ClassName'];?>')" data-toggle="modal" data-target="#myModal_show_materials">عرض</button>
                          </td>
			        <td>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal_edit">تعديل</button>
						  </td>

			        <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف</button>
						  </td>
			      </tr>
    		<?php
    	}
    	?>
      
    </tbody>
  </table>
