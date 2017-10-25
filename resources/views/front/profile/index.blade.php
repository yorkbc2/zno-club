@extends('layouts.main', ['title' => $profile->name])

@section('imported_content')

	<div class="main-container">
		@yield('action')
		<div class="content-container">
		
			
			<div class="panel columns">
				
				<div class="column profile-aside">
						
					<div class="profile-image">
						<img src="{{pl($profile->avatar)}}" alt="Портрет не знайдено!">
						<a href='?action=change_avatar' class='profile-image--change icon-button'>
							<i class="fa fa-pencil"></i>
						</a>
					</div>

					<div class="profile-social">
						<div class="profile-social--add">
							<a href='?action=add_social' class="read-more--button">
								Додати соц. мережі
							</a>
						</div>
						<div class="profile-social--list">
							{!! getSocialLinks(_GU()->id) !!}
						</div>
					</div>

				</div>

				<div class="column" style='flex: 3;'>
					<h2 class='line-header'>
						{{$profile->name}}
					</h2>
					<p>
						Поштова скринька: {{$profile->email}}
					</p>
					<p>
						Комментарів: {{count(getComments($profile->id))}}
					</p>
					<p>
						Топіків: 0
					</p>
					<p>
						Репутація: 0
					</p>
				</div>

			</div>


		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection