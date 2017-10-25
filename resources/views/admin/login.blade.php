@extends('admin.layout')

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						@if(isset($error_message))
						<div class="alert alert-danger">
							{{$error_message}}
						</div>
						@endif
						<form action='/admin/login' method='post' class="form-field">
							{{csrf_field()}}
							<div class='form-group'>
								<input type="text" name='a_login' placeholder='admin login' required class='form-control'>
							</div>
							<div class='form-group'>
								<input type="password" name='a_password' placeholder='admin password' required class='form-control'>
							</div>
							<div class='form-group'>
								<button class="btn btn-default" type='submit'>
									Log
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection