@extends('admin.layout')

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1>
							Додати завантаження:
						</h1>
						@isset($_GET['success'])
						<div class="alert alert-success">
							<strong>Успішно!</strong> Файли успішно додані!
						</div>
						@endisset
						<form action='/admin/api/v1/add-uploads' enctype="multipart/form-data" method='post' class="form-field">
							{{csrf_field()}}
							<div class="form-group">
								<input type="file" name='uploads[]' multiple required >
							</div>
							<div class="form-group">
								<button class='btn btn-default' type='submit'> 
									Додати
								</button>
							</div>
						</form>
						<h3>
							Всі завантаження:
						</h3>
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Шлях (URL)</th>
									<th>Завантажив:</th>
									<th>Вид файлу:</th>
								</tr>
							</thead>
							<tbody>
								@foreach($uploads as $upload) 

								<tr>
									<td>{{$upload->id}}</td>
									<td>{{$upload->upload_path}}</td>
									<td>
										{{$upload->upload_author_name}}
									</td>
									<td>
										{{$upload->upload_extension}}
									</td>

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