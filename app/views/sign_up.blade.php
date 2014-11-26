@extends('_1_base_view')

@section('body')
<div class= "container">
    <div class="navbar">
        <a class="pull-right" href='/'><img src="/restricted_images/getjuiced.png" alt=""></a>
    </div>
    <div class="row">
        @if(Session::get('flash_message'))
            <div class='alert alert-danger container'>
            {{ Session::get('flash_message') }}
            </div>
        @endif
        <h1 class="text-center">Sign up</h1>
    </div>
    <div class="row">
      	{{ Form::open(array(
      	'url'=>'/sign-up',
      	'role'=>'form',
      	'class'=>'form-horizontal',
      	)) }}
      	<div class="form-group">
            {{ Form::label('name_label', 'Name',array(
                "class"=>"col-sm-4 control-label"
            ))}}
      	    <div class="col-sm-4">
                {{ Form::text('name','', array(
                    "class"=>"form-control"
                ))}}
            </div>
             <div class="col-sm-4">
             </div>
      	</div>
      	<div class="form-group">
            {{ Form::label('email_label', 'Email address',array(
                  "class"=>"col-sm-4 control-label"
              ))}}
            <div class="col-sm-4">
                {{ Form::text('email','',array(
                     "class"=>"form-control"
                ))}}
            </div>
          <div class="col-sm-4">
                       </div>
        </div>
        <div class="form-group">
            {{ Form::label('password_label', 'Password',array(
                "class"=>"col-sm-4 control-label"
            ))}}
          <div class="col-sm-4">
              {{ Form::password('password', array(
                  "class" => "form-control"
              ))}}
          </div>
           <div class="col-sm-4">
           </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5">
              {{ Form::submit('Submit', array('class'=>'btn btn-lg btn-success')) }}
            </div>
        </div>
          {{ Form::close() }}
    </div>
</div>
@stop