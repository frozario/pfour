@extends('_3_action_bar')

@section('main_content')
	<br>

	<div class="container">
		<div class="row">

		    <div class="col-md-9">
		    	@yield('view_juice_content')
		    </div>
		    <div class="col-md-3 sidebar">
                <ul class="nav nav-sidebar">
                    @foreach ($juices as $juice)

                            <li>
                                <a  href="/view-juice/<?php echo	$juice->id ; ?>"><img class="img-rounded" src="/images/<?php echo $juice->image_file_name.'.png'; ?>" width="30" class="img-rounded" alt="<?php echo $juice->image_file_name; ?>"/><span class="title"><?php echo $juice->title; ?></span></a>
                            </li>

                    @endforeach
                </ul>
            </div>
	    </div>
	</div>
@stop
