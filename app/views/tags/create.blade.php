@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				<i class="fa fa-tag"></i>
				Tags
				<small>Add new</small>
			</h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		{{Former::open(URL::route('tags.store'))}}
			@include('tags._form')
		{{Former::close()}}	
	</div>
</div>
@stop
