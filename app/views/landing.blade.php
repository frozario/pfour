@extends('template')

@section('head')

	<title>
		Developers' Best Friend
	</title>

@stop

@section('pagetitle')

	<h2>
		Lorem Ipsum and Random User Generator
	</h2>

@stop

@section('body')

<ul>
	<li><p>

		<center> 

			<a href="/textgen" class="button">Lorem Ipsum Text Generator</a> 

		</center>

	</p></li>
	
	In publishing and graphic design, lorem ipsum is a filler text commonly used 
	to demonstrate the graphic elements of a document or visual presentation. 
	Replacing meaningful content that could be distracting with placeholder text 
	may allow viewers to focus on graphic aspects such as font, typography, and 
	page layout.

	<li><p>

		<center> <a href="/usergen" class="button">Fake User Generator</a> </center>

	</p></li>

	Creates random user data for your applications. It's like Lorem Ipsum, but for 
	people.

</ul>

@stop