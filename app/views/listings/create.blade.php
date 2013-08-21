@extends('layouts.master')

@section('content')

<h1>Create Listing</h1>
<hr>
{{Former::open(URL::action('Swapshop\Controllers\ListingController@postCreate'))}}
@include('listings._form')
{{Former::close()}}
@stop