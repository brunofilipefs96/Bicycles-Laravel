@extends('master.main')
@section('content')
    @component('components.countries.country-list', ['countries' => $countries])
    @endcomponent
@endsection
