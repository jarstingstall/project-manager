<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Project Manager</title>
		{{ HTML::style('css/style.css') }}
		<link href='http://fonts.googleapis.com/css?family=Pontano+Sans:400,700|Enriqueta:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
		
		<div class="container">

				@yield('main-content')
			
			<div class="sidebar-wrap">
				@yield('sidebar')
			</div>
		</div>

	</body>
</html>