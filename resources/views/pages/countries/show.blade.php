@extends('master.main')
@section('content')
    @component('components.countries.country-form-show', ['country' => $country])
    @endcomponent
@endsection
