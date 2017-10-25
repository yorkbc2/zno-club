@extends('layouts.main', ['title' => "Всі статті"])

@section('imported_content')

	<div class="main-container">
		<div class="posts-container">
			<div class="post-list">
			@foreach($posts as $post)

				<div class="post-item">

				<div class="post-item--image">
					<img src="{{pl($post->main_image)}}" alt="На жаль, картинку не вдалося зайнти!" title='{{$post->title}}'>
				</div>
					
				<div class="post-item--content">
					<a @if($post->alt_link)
						href={{pl('/post/'.$post->alt_link)}}
					@else
						href='{{"/post/".$post->id}}'
					@endif>
						<h2>
							{{$post->title}}
						</h2>
					</a>
						<p>
							{!! strip_tags(\Illuminate\Support\Str::words($post->content, 15, '...')) !!}
						</p>
						<p>
							<a @if($post->alt_link)
								href='{{pl("/post/".$post->alt_link)}}'
							@else
								href='{{pl("/post/".$post->id)}}'
							@endif class='read-more--button'>Читати далі</a>
						</p>
				</div>

				</div>

			@endforeach

				
			</div>

			<div class="center">
				{{$posts->links()}}
			</div>

		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection