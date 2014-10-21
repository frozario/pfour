@extends('template')

@section('head')

	<title>

		User Generator

	</title>

@stop

@section('pagetitle')

	<h2>
		User Generator
	</h2>

@stop

@section('body')

{{Form::open(array('url' => '/usergen')) }}
	
	<p>

	{{ Form::label('qty','How many users?')}}
	
	{{ Form::text('qty','5') }}

	</p>
	
	<fieldset>

		<legend>
			Additional Options (Names already included)
			</legend>
		<ul>

			<li>

				<label for="addressbox">

					<input type="checkbox" name="address" value="address" id="addressbox">
					Address

				</label>	

			</li>

			<li>

				<label for='phoneBox'>

					<input type="checkbox" name="phonenumber" value="phone" id="phoneBox">
					Phone

				</label>

			</li>

			<li>

				<label for="birthdateBox">

					<input type="checkbox" name="birthdate" value="birthdate" id="birthdateBox">
					Birthdate

				</label>
			</li>

			<li>

				<label for="emailBox">

					<input type="checkbox" name="email" value="email" id="emailBox">
					Email

				</label>

			</li>

		</ul>

	</fieldset>

	<br/>

	<input type="submit"  value="Generate!" name="submit" id="userSubmit" class="button">

{{Form::close()}}

@stop