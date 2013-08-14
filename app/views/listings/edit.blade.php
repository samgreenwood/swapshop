@extends('layouts.master')

@section('content')

<h1>Edit Listing</h1>
<hr>
{{Former::open(URL::route('listings.update', $listing->id))->method('PUT')}}
{{Former::populate([
			'listing[product_id]' => $listing->product_id,
			'listing[quantity]' => $listing->quantity,
			'listing[price]' => $listing->price,
			'listing[condition]' => $listing->condition,
			'listing[notes]' => $listing->notes,
		])}}
@include('listings._form')
{{Former::close()}}
@stop