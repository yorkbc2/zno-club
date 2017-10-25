@extends('admin.layout')

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1>
							Добавити категорію:
						</h1>
						@isset($_GET['success'])
						<div class="alert alert-success">
							<strong>Успішно!</strong> Категорія успішно додана!
						</div>
						@endisset
						<form action='/admin/api/v1/add-category' method='post' class="form-field">
							{{csrf_field()}}
							<div class="form-group">
								<input type="text" name='category_title' placeholder='назва категорії' required class='form-control'>
							</div>
							<div class="form-group">
								<textarea name='category_description' placeholder='опис категорії' required class='form-control'></textarea>
							</div>
							<div class="form-group">
								<input type="text" name='category_alt_link' placeholder='альтернативне посилання' required class='form-control'>
							</div>
							<div class='form-group'>
								<div>
									<input type="radio" name='category_status' value='1' id='status_1' checked> 
									<label for="status_1">
										Публічна категорія
									</label>
								</div>
								<div>
									<input type="radio" name='category_status' value='0' id="status_0">
									<label for="status_0">
										Прихована категорія
									</label>
								</div>
							</div>
							<div class="form-group">
								<button class='btn btn-default' type='submit'> 
									Створити
								</button>
							</div>
						</form>
						<h3>
							Всі категорії:
						</h3>
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Назва</th>
									<th>Опис</th>
									<th>Статус</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $cat) 

								<tr>
									<td>{{$cat->id}}</td>
									<td>{{$cat->name}}</td>
									<td>{{$cat->description}}</td>
									<td>{{$cat->status}}</td>
								</tr>

								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'post-editor' );
    </script>

@endsection