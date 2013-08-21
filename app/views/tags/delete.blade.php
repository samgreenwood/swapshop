@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Delete Tag</h1>
	<div class="well">
		Are you sure you want to delete Tag {{$tag['name']}}?
	</div>
		{{Former::open(URL::action('Swapshop\Controllers\TagController@deleteDelete', $tag['id']))->method('DELETE')}}
		{{Former::submit()->class('btn btn-danger')->value('Delete')}}
		{{Former::close()}}	
@stop