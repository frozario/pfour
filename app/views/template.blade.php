<!DOCTYPE html>
<html lang='en'>
<head> 
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	@section('head')
	<title>My landing page </title>
	@show
</head>
<body>
	<div class="header">
		<h1>Developers Best Friend</h1>
		@yield('pagetitle')
	</div>
	<div class="content">
		@yield('body')
	</div>
</body>