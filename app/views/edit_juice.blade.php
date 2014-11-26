@extends('_4_add_or_edit_juice')

@section('title')
  	Edit Juice
@stop

@section('add_or_edit_juice_header')
  	<h1>Edit Juice</h1>
@stop

@section('add_or_edit_juice_url')
	{{ Form::open(array('url'=>'/edit-juice/'.$id, 'files'=>true)) }}
@stop

@section('add_or_edit_juice_submit')
	{{ Form::submit('Edit Juice!', array('class'=>'btn btn-lg btn-success pull-right')) }}
@stop