@extends('layouts.master')

@section('content')
	<h1>Create Tag</h1>
	<hr>
	{{Former::open(URL::route('tags.store'))}}
	@include('tags._form')
	{{Former::close()}}	
@stop
