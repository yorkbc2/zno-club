@extends('layouts.main', ['title' => "Вхід та реєстрація"])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			

		<div class="columns">
			
			<div class="panel column">
				<h2 class='line-header'>Реєстрація:</h2>
				@isset($error_message)
					<div class="error-message">
						{{$error_message}}
					</div>
				@endisset
				<form class='form' action="{{pl('/register')}}" method='post'>
					{{csrf_field()}}
					<div>
						<label for="u-name">
							Ваше ім'я:
						</label>
						<input type="text" name='u_name' placeholder='Введіть Ваше ім`я...' required id='u-name' />
					</div>
					<div>
						<label for="u-email">
							Ваша поштова скринька:
						</label>
						<input type="email" name="u_email" placeholder="Введіть Вашу поштову скриньку" required id='u-email' />
					</div>
					<div>
						<label for="u-password">
							Ваш пароль:
						</label>
						<input type="password" name="u_password" placeholder='Придумайте важкий пароль' required id='u-password' />
					</div>
					<div>
						<label for="u-r-password">
							Повторіть Ваш пароль:
						</label>
						<input type="password" name="u_r_password" placeholder='Повторіть Ваш пароль' required id='u-r-password' />
					</div>
					<div>
						<button class='read-more--button' type='submit'>
							Зареєструватися
						</button>
					</div>
				</form>	
			</div>

			<div class="panel column">
				<h2 class="line-header">
					Вхід:
				</h2>
				<form action="{{pl('/login')}}" method='post' class="form">
					{{csrf_field()}}
					<div>
						<label for="u-email">Ваша поштова скринька:</label>
						<input type="email" placeholder="Введіть вашу поштову скриньку" required name="u_email" id="u-email">
					</div>
					<div>
						<label for="u-password">Ваш пароль:</label>
						<input type="password"
							placeholder="Введіть Ваш пароль"
							required
							name='u_password'
							id="u-password">
					</div>
					<div>
						<button class="read-more--button" type='submit'>
							Увійти
						</button>
					</div>
				</form>
			</div>

		</div>


		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection