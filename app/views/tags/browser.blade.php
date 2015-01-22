<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-tag"></i> Browse by tag</div>
	<div class="list-group">
		@foreach($tags as $tag)
		<a href="/products/{{$tag->slug}}" class="list-group-item">{{$tag->name}}</a>
		@endforeach
	</div>
</div>
