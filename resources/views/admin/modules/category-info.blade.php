@extends('admin.layout')

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1>
							Добавити рубрику:
						</h1>
						@isset($_GET['success'])

						<div class="alert alert-success">
							Рубрика успешно добавлена!
						</div>

						@endisset
						<form action='/admin/api/v1/add-page-category' method='post' class="form-field">
							{{csrf_field()}}
							
							<div class="form-group">
								<input type="text" name='c_title' class='form-control' required placeholder='cat title'>
							</div>

							<div class="form-group">
								<input type="text" name='c_alt' class='form-control' required placeholder='cat url'>
							</div>

							<div class='form-group'>
								<div>
									<input checked type="radio" name='c_status' value='1' id='status-1' required>
									<label for="status-1">
										Публічний
									</label>
								</div>
								<div>
									<input type="radio" name='c_status' value='0' id='status-2' required >
									<label for="status-2">
										Прихований
									</label>
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

@endsection