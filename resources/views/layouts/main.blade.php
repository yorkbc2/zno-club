<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@isset($title)
			{{$title}} :: ЗНО-Клуб
		@else
			ЗНО-Клуб
		@endisset
	</title>

	<meta id="token" name='csrf-token' content="{{csrf_token()}}">

	<link href="https://fonts.googleapis.com/css?family=Russo+One|Roboto+Slab" rel="stylesheet">
	<link rel="stylesheet" href='{{pl("/css/styles.css")}}'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
	
		{{-- Navigator here --}}

		@include('layouts.components.nav')

		{{-- Navigator ending --}}

		<div class="app-wrapper" id='app'>
			@yield('imported_content')
		</div>

		{{-- Footer Here --}}

	</div>



	<script src="{{pl('/js/app.js')}}"></script>
	<script src="{{pl('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function () {
        	CKEDITOR.replace( 't_content_area' );
        })
    </script>
	
</body>
</html>