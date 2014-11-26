@extends('_1_base_view')

@section('body')
	<div class = "container">
	    <div>
            <a class="pull-left text-center" href='/'><img src="/restricted_images/getjuiced.png" alt=""></a>
        </div>
		<div>
			@if(Session::get('flash_message'))
		        <div class='alert alert-danger container'>
		          {{ Session::get('flash_message') }}
		        </div>
  			@endif
			<div class="pull-right">
				<div class="col-md-10">
					<h1 class="text-center">Log in</h1>
				  		{{ Form::open(array(
                              	'url'=>'/',
                              	'role'=>'form',
                              	'class'=>'form-horizontal',
                              	)) }}
                        <div class="form-group">
                            {{ Form::label('email_label', 'Email',array(
                                "class"=>"col-sm-3 control-label"
                            ))}}
                            <div class="col-sm-6">
                                {{ Form::email('email','', array(
                                    "class"=>"form-control"
                                ))}}
                            </div>
                             <div class="col-sm-3">
                             </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('password_label', 'Password',array(
                                "class"=>"col-sm-3 control-label"
                            ))}}
                            <div class="col-sm-6">
                                {{ Form::password('password',array(
                                    "class"=>"form-control"
                                ))}}
                            </div>
                             <div class="col-sm-3">
                             </div>
                        </div>
			    		{{ Form::submit('Submit', array('class'=>'btn btn-success pull-right')) }}

						{{ Form::close() }}
				</div>
				<div class="col-md-2">
					<a href="/sign-up" class="btn btn-success pull-right">
						Sign up!
					</a>
				</div>
			</div>
            <img src='/restricted_images/juice.jpg' width = "100%" alt="" />

		</div>
	</div>
@stop