@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Create Tag</h1>
	<a href="/tags">Back to Tags</a>
	<hr>
		{{Former::open('/tags/create')}}
		@include('tags._form')
		{{Former::close()}}	
@stop