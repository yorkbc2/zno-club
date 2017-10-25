@extends('admin.layout')

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1>
							Добавити сторінку:
						</h1>
						<form enctype="multipart/form-data" action='/admin/api/v1/add-page' method='post' class="form-field">
							{{csrf_field()}}
							<div class="form-group">
								<input type="text" name='info_title' class='form-control' required placeholder='page title'>
							</div>
							<div class="form-group">
								<textarea name="info_content" id="page-editor" required></textarea>
							</div>
							<div class="form-group">
								<input type="text" name='info_alt_link' class='form-control' required placeholder='page alt link'>
							</div>
							<div class="form-group">
								<select name="info_category" class='form-control'>
									@foreach($categories as $cat)

										<option value="{{$cat->id}}">
											{{$cat->title}}
										</option>

									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input type="file" name='info_main_image' required>
							</div>
							<div class='form-group'>
								<div>
									<input type="radio" name='info_status' required value='1' checked><label for="status_1">Публічний:</label>
								</div>
								<div>
									<input type="radio" name='info_status' required value='0' ><label for="status_0">Прихований:</label>
								</div>
							</div>

							<div class="form-group">
								<button class='btn btn-default'>
									Створити
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'page-editor' );
    </script>

@endsection