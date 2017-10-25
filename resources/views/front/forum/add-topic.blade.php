@extends('layouts.main', ['title' => "Додати топік"])

@section('imported_content')

	<div class="main-container">
		<div class="content-container">
			<div class="panel">
				<form action="/forum/add-topic" method='post' class="form">
					{{csrf_field()}}
					<div>
						<label for="t-title">Назва топіку:</label>
						<input type="text" id="t-title" name='t_title' placeholder="Введіть назву топіку" required>
					</div>
					<div>
						<textarea name="t_content" id="t_content_area" required maxlength="3000" placeholder="Ваш топік тут..."></textarea>
					</div>
					<div>
						<label for="t-category-id">
							Категорія топіку:
						</label>
						<select id='t-category-id' name="t_category">
							@foreach($categories as $cat)
							<option value="{{$cat->id}}">{{$cat->title}}</option>
							@endforeach
						</select>
					</div>
					<div>
						<button type="submit" class='button green'>
							Додати +
						</button>
					</div>
				</form>
			</div>		
		</div>
		<div class="side-container">
			@include('layouts.components.aside')
		</div>
	</div>

@endsection