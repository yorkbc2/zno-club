@extends('front.profile.index')

@section('action')

	<div class="modal-window">
		<div class="modal-block">
			<div class="modal-header">
				<h2 class='modal-heading'>
					Додати соц. мережі
				</h2>
				<div class="modal-close">
					<a href='{{pl('/profile')}}'>
						&times;
					</a>
				</div>
			</div>
			<div class="modal-body">
				<div class="add-socials">
					<form method="post" class='form-by-groups' action="{{pl('/profile/add-social')}}">
						{{csrf_field()}}
						@php $links = getSocialLinksRaw(_GU()->id) @endphp
						<div>
							<i class="fa fa-facebook"></i>
							<input type="text" placeholder='facebook.com/...' value="{{checkSocialLink($links, "facebook")}}" name='links[facebook]'>
						</div>
						<div>
							<i class="fa fa-twitter"></i>
							<input type="text" placeholder='twitter.com/...' value="{{checkSocialLink($links, "twitter")}}" name='links[twitter]'> 
						</div>
						<div>
							<i class="fa fa-instagram"></i>
							<input type="text" placeholder='instagram.com/...' value="{{checkSocialLink($links, "instagram")}}" name='links[instagram]'>
						</div>
						<div>
							<i class="fa fa-vk"></i>
							<input type="text" placeholder='vk.com/...' value="{{checkSocialLink($links, "vk")}}" name='links[vk]'>
						</div>
						<div>
							<i class="fa fa-github"></i>
							<input type="text" placeholder='github.com/...' value="{{checkSocialLink($links, "github")}}" name='links[github]'>
						</div>
						<div></div>
						<div>
							<button type='submit' class='read-more--button'>
								Додати
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection