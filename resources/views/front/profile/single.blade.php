@extends('layouts.main', ['title' => $profile->name])

@section('imported_content')

	<div class="main-container">
		@yield('action')
		<div class="content-container">
		
			
			<div class="panel columns">
				
				<div class="column profile-aside">
						
					<div class="profile-image">
						<img src="{{pl($profile->avatar)}}" alt="Портрет не знайдено!" titlte="{{$profile->name}}">
					</div>

					<div class="profile-social">
						<div class="profile-social--list">
							{!! getSocialLinks($profile->id) !!}
						</div>
					</div>

				</div>

				<div class="column" style='flex: 3;'>
					<h2 class='line-header'>
						{{$profile->name}}
					</h2>
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