<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Document</title>
	</head>
	<body>
		@yield('content')
		
		{!!Html::script('/js/jquery.min.js')!!}
		{!!Html::script('/js/dropdown.js')!!}
	</body>
</html>