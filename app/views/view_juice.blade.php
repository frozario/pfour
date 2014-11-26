@extends('_5_view_juice')

@section('view_juice_content')
	<h1>
		<?php echo $selected_juice->title; ?>
	</h1>
	
	<br>
	<?php 
		if ($selected_juice->image_file_name != ""){  ?>
			 <img class="img-thumbnail" src="/images/<?php echo $selected_juice->image_file_name.'.png'; ?> " width = 150 alt="<?php echo $selected_juice->image_file_name.'png'; ?>" />
	<?php 	} 	?>

	<p>
		<label>What Uses:</label>
		<p><?php echo $selected_juice->ingredients; ?></p>
	</p>

	<p>
		<label>Directions:</label>
		<p><?php echo $selected_juice->directions; ?></p>
	</p>

	<p>
		<label>Day:</label>
		<p><?php echo $selected_juice->day; ?></p>
	</p>

    <p>
		<label>When during the day:</label>
		<p><?php echo $selected_juice->day_part; ?></p>
	</p>
	<p class="pull-right">
	<a 	href= <?php echo "/edit-juice/" . $selected_juice->id; ?>><img src="/images/icons/edit.png" alt="" />Edit</a>
    	    	<a onclick="return confirm('Are you sure you want to delete this item?');" href= <?php echo "/delete-juice/" . $selected_juice->id; ?>><img src="/images/icons/delete.png" alt="" />Delete</a>
    </p>
@stop
