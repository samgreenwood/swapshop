@extends('layouts.master')

@section('content')

<h1>Create a Listing</h1>
<hr>
{{Former::open(URL::route('listings.store'))}}
@include('listings._form')
{{Former::close()}}
@stop
