

<div class="row" style=" direction: rtl;">
  <div class="col-sm-8 col-md-12">
    <div class="thumbnail">
      	
      	<?php
      	for ($i=0; $i < count($lectures) ; $i++) 
      	{ 
      	?>
    	<video  controls style=" width: 100%;">
		  <source src="<?php echo URL."public/tutorials_videos/".$lectures[$i]['VideoURL'];?>" type="video/mp4">
		  <source src="mov_bbb.ogg" type="video/ogg">
		  Your browser does not support HTML5 video.
		</video>
		
	      <div class="caption">
	        <p><?php echo $lectures[$i]['VideoDescription'];?></p>
	        
	      </div>

	    <hr>

	    <?php
		}
	    ?>
	    


    </div>
  </div>
</div>