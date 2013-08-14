@extends('layouts.master')

@section('content')
<h1>Dashboard</h1>
<hr />
<div class="row-fluid">
	<div class="span6">
		{{Former::open(URL::action('UserController@postDashboard'))}}
		{{Former::textarea('signature','User Signature')->rows('5')->cols('80')}}
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
			{{Former::actions()->primary_submit('Submit')->inverse_reset('Reset')}}
			{{Former::close()}}
	</div>	
</div>

@stop