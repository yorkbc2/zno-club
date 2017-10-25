@extends('layouts.main', ['title' => $post->title])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			<div class="post-page">
				
				<div class="post-page--image">
					<img src="{{pl($post->main_image)}}" alt="На жаль, картинку не знайдено!" title="{{$post->title}}">
				</div>

				<div class="post-page--header">
					<h1>{{$post->title}}</h1>
				</div>

				<div class="post-page--info">
					<i class="fa fa-calendar"></i> {{$post->created_at}} | <i class="fa fa-eye"></i> {{$post->views}}
				</div>

				<div class="little-divider"></div>

				<div class="post-page--content">
					{!! $post->content !!}
				</div>

				<div class="little-divider"></div>

				@if(checkUser()) 
					<comment-post prefix="{{pl()}}" url='{{pl('/add-comment')}}' token="{{csrf_token()}}" postid="{{$post->id}}"></comment-post>
				@else
					<div class="alert-info">
						<p class="icon">
							<i class="fa fa-check"></i>
						</p>
						<p>
							На жаль, Ви не можете коментувати, так як не увійшли до Вашого аккаунту. Будь ласка, <a href="{{pl('/signup')}}">Увійдіть або Зареєструйтесь на сайті!</a>
						</p>
					</div>
				@endif

				<div class="post-comments">
					@foreach($comments as $comm )
					<div class='commentary'>
						<div class='c-aside'>
							<div class="c-aside--image">
								<img src="{{pl($comm->author_avatar)}}" alt="{{$comm->author_name}}">
							</div>
						</div>
						<div class="c-inside">
							@if(checkUser())
								@if($comm->author_id == _GU()->id)
								<div class="c-remove">
									<form action="{{pl('/post/remove-comment')}}" method="post">
										{{csrf_field()}}
										<input type="hidden" name='commentary_id' value="{{$comm->id}}">
										<input type="hidden" name='author_id' value="{{_GU()->id}}">
										<input type="hidden" name='redirect_url' value="{{pl('/post/'.$post->alt_link)}}">
										<button type='submit'>
											<i class="fa fa-trash"></i>
										</button>
									</form>
								</div>
								@endif
							@endif
							<div class="c-inside--content">
								<h3><a href='{{pl("/profile/".$comm->author_id)}}'>{{$comm->author_name}}</a></h3>
								<p>
									{{$comm->content}}
								</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>

			</div>
		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection