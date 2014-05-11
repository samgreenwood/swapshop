@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Delete Tag</h1>
	<div class="well">
		Are you sure you want to delete Tag {{$tag->name}}?
	</div>
		{{Former::open(URL::route('tags.destroy', $tag->id))->method('DELETE')}}
		{{Former::submit()->class('btn btn-danger')->value('Delete')}}
        <a href="/tags" class="btn btn-default">Cancel</a>
		{{Former::close()}}	
@stop
