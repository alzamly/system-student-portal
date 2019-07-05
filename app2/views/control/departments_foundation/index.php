<div class="row">

	<?php
	for ($i=0; $i < count($departments_foundation); $i++) { 

		$foundation_section = $departments_foundation[$i]['DFId'];
		$foundation_section_name = $departments_foundation[$i]['DFName']
		?>


    <div class="col-lg-3" style=" margin-top: 5px;">
		<div style="    width: 250px;
		    height: 190px;
		    background: white;
		    border: 1px solid #3127271f;
		    box-shadow: 3px 0px 12px -1px gainsboro;
		        text-align: center;
		           padding-top: 40px;
		">

		<a href="<?php echo URL."classes_view?foundation_section=".$foundation_section."&section_name=".$foundation_section_name;?>" style=" font-size: 35px;
    color: #4e50af;"><?php echo $departments_foundation[$i]['DFName'];?></a>
		

	

		</div>
	</div>



		<?php
	}
	?>

</div>