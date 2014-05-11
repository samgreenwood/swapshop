@extends('layouts.master')

@section('content')
	<h1>Edit Tag</h1>
	<hr>
		{{Former::open(URL::route('tags.edit', $tag->id))}}
		{{Former::populate($tag)}}
		@include('tags._form')
		{{Former::close()}}	
@stop
