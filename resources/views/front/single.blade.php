@extends('layouts.main', ['title' => $page->title])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			<div class="panel">
				<div class="PageInfo__image">
					<img src="{{pl($page->main_image)}}" alt="Картинку не знайдено! :(" title="{{$page->title}}">
					<div class="PageInfo__mask">
						<h2>
							{{$page->title}}
						</h2>
						<h4>
							<i class="fa fa-calendar"></i>
							{{$page->created_at}} |
							<i class="fa fa-eye"></i>
							{{$page->views}}
						</h4>
					</div>
				</div>

				<div class="PageInfo__content">
					{!!$page->content!!}
				</div>
			</div>		
		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection