@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-tag"></i>
				Tags
			</h1>
		</div>
		<div>
			<a href="/tags/create" class="btn btn-primary pull-right">Add Tag</a>
		</div>
		<div>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if(count($tags))
						@foreach($tags as $tag)
						<tr>
							<td>{{$tag->name}}</td>
							<td>
								<a class="btn btn-success" href="/tags/{{$tag->id}}/edit">Edit</a>
								<a class="btn btn-danger" href="/tags/{{$tag->id}}/delete">Delete</a>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="2">Sorry, no tags!</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
