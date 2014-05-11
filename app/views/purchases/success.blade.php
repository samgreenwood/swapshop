@extends('layouts.master')

@section('jquery')

@stop

@section('content')
	<h1>Purchase Successful</h1>
	<div class="well">
		<p>Your purchase has been successfull, {{$purchase['listing']['user']['username']}} has been notified.</p>

		<p>A copy of this purchase has also been sent to you.</p>

		<a class="btn btn-primary" href="/buy">Back to Shopping</a>
	</div>
@stop
