@extends('_1_base_view')

@section('body')
	<div class="container">
		 <div class="navbar">
		 	<a class="pull-left" href='/'><img src='/restricted_images/getjuiced.png' width=400 alt=""></a>
            <a class="pull-right logout" href="/log-out">Log out</a>

	    </div>
	</div>

  	@yield('content')

@stop