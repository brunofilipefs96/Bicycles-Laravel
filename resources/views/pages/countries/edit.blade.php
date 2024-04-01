@extends('master.main')
@section('content')
    @component('components.countries.country-form-edit', ['country' => $country, 'people' => $people])
    @endcomponent
@endsection
