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
						<form class='form-field' action="/admin/forum/add-category" method="post">
							{{csrf_field()}}
							<input type="hidden" name="red_url" value="/admin/forum/category">
							<div class="form-group">
								<input type="text" placeholder="Title" class='form-control' name='cat_title'>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Alternative link" class='form-control' name='cat_alt_link'>
							</div>
							<div class="form-group">
								<button type="submit" class='btn btn-default'>
									Додати +
								</button>
							</div>
						</form>
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>ID, #</th>
									<th>Name:</th>
									<th>Url: </th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $cat) 

								<tr>
									<td>{{$cat->id}}</td>
									<td>{{$cat->title}}</td>
									<td>{{$cat->alt_url}}</td>
								</tr>

								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection