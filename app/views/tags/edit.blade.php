@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Edit Tag</h1>
	<hr>
		{{Former::open(URL::action('TagController@postEdit', $tag['id']))}}
		{{Former::populate($tag)}}
		@include('tags._form')
		{{Former::close()}}	
@stop