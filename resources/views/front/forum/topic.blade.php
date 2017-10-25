@extends('layouts.main', ['title' => $topic->title])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			<div class="panel">
				<div class="topic-page--header">
					<div class="topic-page--author">
					<a style="display:inline-block;" target="_blank" href='{{pl('/profile/'.$topic->author_id)}}'>
						<div class="topic-page--avatar-shell">
							<img src="{{pl($topic->author_avatar)}}" alt="Портрет не знайдено" title="{{$topic->author_name}}">
						</div>
						<p>
							{{$topic->author_name}}
						</p>
					</a>
					{{-- @if(checkUser())
						<topic-balls userid="{{_GU()->id}}" topicid="{{$topic->id}}" balls="{{$balls}}"></topic-balls>
					@else
						<span class="balls">
						<button disabled class="top-butt"><i class="fa fa-chevron-up"></i></button>
							<b>{{$balls}}</b>
						<button disabled class='bottom-butt'><i class="fa fa-chevron-down"></i></button>
						</span>
						<p style="display: inline-block; font-size: 0.913em;" class='muted'>Щоб оцінити топік, будь ласка увійдіть до профілю!</p>
					@endif --}}
					</div>
					<div class="topic-page--title">
						<h2>
							{{$topic->title}}
						</h2>
					</div>
				</div>				
				<div class="topic-page--content">
					<article>
						{!!$topic->content!!}
					</article>
				</div>
				<div class="topic-page--footer">
					@php $cc=getCategoryById($topic->category_id) @endphp
					<footer>
						<a href="{{pl('/forum/category/'.$cc->alt_url)}}">
							{{$cc->title}}
						</a>
						<span class="date">
							{{$topic->created_at}}
						</span>
					</footer>
				</div>
				<div class="topic-comments">

					{{-- <topic-comment signupurl="{{pl('/signup')}}" token="{{csrf_token()}}" topicid="{{$topic->id}}" user="{{checkUser()}}"></topic-comment>
 --}}
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

			<hr style='background-color:  transparent; color: transparent;'>
		
		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>

	</div>

@endsection