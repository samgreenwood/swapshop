@extends('layouts.master')

@section('content')
<h1>Search</h1>
<hr>
{{Former::open(URL::action('Swapshop\Controllers\SearchController@postIndex'))}}
{{Former::text('search')}}
{{Former::actions()->primary_submit('Search')->inverse_reset('Reset')}}
{{Former::close()}}
@stop