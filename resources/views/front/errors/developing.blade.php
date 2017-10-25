@extends('layouts.main', ['title' => "В розробці"])

@section('imported_content')

	<div class="main-container">
		<div class='content-container'>
			<h1>
				Сторінка у розробці!
			</h1>
		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection