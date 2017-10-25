<div class="aside-posts">
	
	<h3>
		Найпопулярніші статті:
	</h3>

	<ol>
		@foreach(get_popular_posts(5) as $post) 

		<li>
			<a @if($post->alt_link)
					href='{{pl("/post/".$post->alt_link)}}'
				@else
					href='{{pl("/post/".$post->id)}}'
				@endif>
				{{$post->title}} <i class="fa fa-eye"></i> {{$post->views}}
			</a>
		</li>

		@endforeach
	</ol>

</div>

<div class="aside-pbc">
	<h3>
		Найбільше комментарів:
	</h3>

	<ul class="pbc-list">
	@foreach(getTopUsersByComments() as $item)

	<li>
		<div class="pbc-image">
			<img title="{{$item["name"]}}" src="{{pl($item['avatar'])}}" alt="{{$item['name']}}">
		</div>
		<div class="pbc-content">
				<a href="{{pl('/profile/'.$item['id'])}}">{{$item["name"]}}</a> - {{$item["count"]}}
		</div>
	</li>
		

	@endforeach
	</ul>
</div>