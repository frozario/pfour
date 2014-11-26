@extends('_2_logout_bar')

@section('content')
	<div class="container">
		<div>
			<a class="btn btn-success pull-right" href='/add-juice'>Add Juice Recipe!</a>
	    </div>
	</div>
  @yield('main_content')
@stop