@extends('admin.layout')

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1>
							Керування комментарями:
						</h1>
						<form action="/admin/remove-comments" method="post">
							{{csrf_field()}}
							<input type="hidden" name="red_url" value="/admin/profile/commentaries">
						@foreach(getAllCommentaries() as $comment) 

						<div class='commentary'>
						<div class='c-aside'>
							<input type="checkbox" value="{{$comment->id}}" name="comment_ids[]">
							<div class="c-aside--image">
								<img src="{{pl($comment->author_avatar)}}" alt="{{$comment->author_name}}">
							</div>
						</div>
						<div class="c-inside">
							@if(checkUser())
								@if($comment->author_id == _GU()->id)
								<div class="c-remove">
									<form action="{{pl('/post/remove-comment')}}" method="post">
										{{csrf_field()}}
										<input type="hidden" name='commentary_id' value="{{$comment->id}}">
										<input type="hidden" name='author_id' value="{{_GU()->id}}">
										<input type="hidden" name='redirect_url' value="{{pl('/post/'.$post->alt_link)}}">
										<button type='submit'>
											<i class="fa fa-trash"></i>
										</button>
									</form>
								</div>
								@endif
							@endif
							<div class="c-inside--content">
								<h3><a href='{{pl("/profile/".$comment->author_id)}}'>{{$comment->author_name}}</a></h3>
								<p>
									{{$comment->content}}
								</p>
							</div>
						</div>
					</div>

						@endforeach

						<div>
							<button class='btn btn-danger' type='submit'>
								Видалити обрані
							</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection