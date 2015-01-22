@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-tag"></i>
				Tags
				<small>Edit</small>
			</h1>
		</div>
		<div>
			{{Former::open(URL::route('tags.update', $tag->id))->method('PUT')}}
			{{Former::populate($tag)}}
			@include('tags._form')
			{{Former::close()}}	
		</div>
	</div>
</div>
@stop
