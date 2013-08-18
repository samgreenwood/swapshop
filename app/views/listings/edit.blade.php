@extends('layouts.master')

@section('content')

<h1>Edit Listing</h1>
<hr>
{{Former::open(URL::action('ListingController@postEdit', $listing['id']))}}
{{Former::populate($listing)}}
@include('listings._form')
{{Former::close()}}
@stop