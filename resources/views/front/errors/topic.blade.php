@extends('layouts.main', ['title' => "В розробці"])

@section('imported_content')

	<div class="main-container">
		<div class='content-container'>
			<div class="alert-info">
				<p class="icon"><i class="fa fa-check"></i></p>
				<p>
					@isset($error_message)
						{!!$error_message!!}
					@endisset
				</p>
			</div>
		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection