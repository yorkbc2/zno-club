@extends('layouts.main', ['title' => "Форум"])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			<div class="panel">
				<div>
					<h2 class='inline-block'>Форум: </h2> 
					@if(checkUser())
					<a class='button green' href="{{pl('/forum/add-topic')}}">
						Додати топік
					</a>
					@endif

				</div>
				<div>
					<p class='muted'>Тут Ви можете поділитися своїми думками, обсудити їх з іншими користувачами та прочитати інші топіки.</p>
					<p>
						<select style='width: 240px' onchange=" document.location.href='/{{config('yorke.prefix')}}/forum/category/'+this.value; ;return true;">
							<option value="all" selected>
								Всі топіки
							</option>
							@foreach(getTopicCategories() as $cat) 
							<option value="{{$cat->alt_url}}">
								{{$cat->title}}
							</option>
							@endforeach
						</select>
					</p>
				</div>
			</div>	
			<hr style='background-color:  transparent; color: transparent;'>

			<div class="panel">
				@if(count($topics) > 0) 
				<div class='topic-list'>
				@foreach($topics as $topic)
				@php $current_category = getCategoryById($topic->id); @endphp
					<div class="topic">
						<div class="topic-info">
							<a href="{{pl('/profile/'.$topic->author_id)}}">
								<div class='topic-avatar'><img src="{{pl($topic->author_avatar)}}" alt="Портрет не знайдено" title="{{$topic->author_name}}"></div>
								{{$topic->author_name}}
							</a>
						</div>
						<div class="topic-content">
							<a href="{{pl('/forum/topic/'.$topic->id)}}"><h2>{{$topic->title}}</h2></a>
							<div class="topic-comments">
								0
							</div>
						</div>
						<div class="topic-footer">
							<span class="category">
								<a href="{{pl("/forum/category/".$current_category->alt_url)}}">{{$current_category->title}}</a>
							</span>
							<span class="date">
								{{$topic->created_at}}
							</span>
						</div>
					</div>
				@endforeach
				<div class="center">
					{{$topics->links()}}
				</div>
				@endif
			</div>		
		</div>
	</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection