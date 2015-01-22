@extends('layouts.master')

@section('jquery')

@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-tag"></i>
				Tags
				<small>Delete</small>
			</h1>
		</div>
		<div class="alert alert-warning" role="alert">
			<p>
				<i class="fa fa-exclamation-triangle"></i>
				<b>Whoa, nelly!</b>
			</p>
			<p>
				Are you sure you want to delete the tag <b>{{$tag->name}}</b>? Doing so will destroy it for ever!
			</p>
		</div>
		<div>
			{{Former::open(URL::route('tags.destroy', $tag->id))->method('DELETE')}}
			{{Former::submit()->class('btn btn-danger')->value('Delete')}}
			<a href="/tags" class="btn btn-default">Cancel</a>
			{{Former::close()}}	
		</div>
	</div>
</div>
@stop
