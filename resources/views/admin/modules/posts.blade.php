@extends('admin.layout')

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1>
							Добавити статтю:
						</h1>
						<form enctype="multipart/form-data" action='/admin/api/v1/add-post' method='post' class="form-field">
							{{csrf_field()}}
							<div class="form-group">
								<input type="text" name='post_title' class='form-control' required placeholder='post title'>
							</div>
							<div class="form-group">
								<textarea name="post_content" id="post-editor" required></textarea>
							</div>
							<div class="form-group">
								<input type="text" name='post_alt_link' class='form-control' required placeholder='post alt link'>
							</div>
							<div class="form-group">
								<select name="post_category" class='form-control'>
									@foreach($categories as $cat)

										<option value="{{$cat->id}}">
											{{$cat->name}}
										</option>

									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input type="file" name='post_main_image' required>
							</div>
							<div class='form-group'>
								<div>
									<input type="radio" name='post_status' required value='1' checked><label for="status_1">Публічний:</label>
								</div>
								<div>
									<input type="radio" name='post_status' required value='0' ><label for="status_0">Прихований:</label>
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
        CKEDITOR.replace( 'post-editor' );
    </script>

@endsection