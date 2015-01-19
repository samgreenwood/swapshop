@extends('layouts.master')

@section('content')
	<h1>Edit Tag</h1>
	<hr>
		{{Former::open(URL::route('tags.update', $tag->id))->method('PUT')}}
		{{Former::populate($tag)}}
		@include('tags._form')
		{{Former::close()}}	
@stop
