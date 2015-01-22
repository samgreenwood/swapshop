@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="jumbotron">
			<h2>Welcome to Swap Shop!</h2>
			<p>Start shopping by selecting a tag from the right or by viewing <a href="/listings">all listings</a>.</p>
		</div>
	</div>
	<div class="col-md-4">
		@include('tags.browser')
	</div>
</div>
@stop
