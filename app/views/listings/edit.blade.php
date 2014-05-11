@extends('layouts.master')

@section('content')

<h1>Edit Listing</h1>
<hr>
{{Former::open(URL::route('listings.update', $listing->id))->method('PUT')}}
{{Former::populate($listing)}}
@include('listings._form')
{{Former::close()}}
@stop
