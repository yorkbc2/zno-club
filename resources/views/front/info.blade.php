@extends('layouts.main', ['title' => "Інформація"])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			<div class="categories-list">
				
				@foreach($categories as $cat)

				<div class="category-item">
					
					<h2>
						<a href="{{pl("/info/".$cat->alt_link)}}">
							{{$cat->title}}
						</a>
					</h2>

				</div>

				@endforeach

			</div>			
		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection