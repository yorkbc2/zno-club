@extends('layouts.main', ['title' => $title])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			<div class="categories-list">
				
				@foreach($pages as $page)

				<div class="category-item">
					
					<h2>
						<a href="{{pl('/info/'.$url.'/'.$page->alt_link)}}">
							{{$page->title}}
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