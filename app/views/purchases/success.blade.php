@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Purchase Successfull</h1>
	<div class="well">
		Your purchase has been successfull, {{$purchase['seller']['username']}} has been notified.
	</div>
@stop