

<table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Lecture Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Add video</th>
        <th>Add files</th>
        <th>Add exam</th>
      </tr>
    </thead>
    <tbody>
    	<?php

    	for ($i=0; $i < count($tutorials); $i++) { 
    		?>
    			  <tr>
			        <td><?php echo $i+1;?></td>
			        <td>
		                <a href="./lecture?lecture=<?php echo $tutorials[$i]['LId'];?>" role="button"><?php echo $tutorials[$i]['LectureTitle'];?></a>
		            </td>
			        <td><?php echo $tutorials[$i]['LectureDescription'];?></td>
			        <td><?php echo $tutorials[$i]['LDate'];?></td>
			        <td>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span></button>
			        </td>

			        <td>
			        	<a class="btn btn-default" href="./add_videos?lecture=<?php echo $tutorials[$i]['LId'];?>" role="button"><span class="glyphicon glyphicon-plus"></span></a>
			        </td>
			        <td>
			        	<a class="btn btn-default" href="./add_files?lecture=<?php echo $tutorials[$i]['LId'];?>" role="button"><span class="glyphicon glyphicon-plus"></span></a>
			        </td>
			        <td>
			        	<a class="btn btn-default" href="./add_lecture_exam?lecture=<?php echo $tutorials[$i]['LId'];?>" role="button"><span class="glyphicon glyphicon-plus"></span></a>
			        </td>
			      </tr>
    		<?php
    	}
    	?>
      
    </tbody>
  </table>



  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>