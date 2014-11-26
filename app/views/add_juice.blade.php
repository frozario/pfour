@extends('_4_add_or_edit_juice')

@section('title')
  	Add Juice
@stop

@section('add_or_edit_juice_header')
	<h1>Add Juice Recipe!</h1>
@stop

@section('add_or_edit_juice_url')
	{{ Form::open(array('url'=>'/add-juice/', 'files'=>true)) }}
@stop

@section('add_or_edit_juice_submit')
	{{ Form::submit('Add Juice!', array('class'=>'btn btn-lg btn-success pull-right')) }}
@stop