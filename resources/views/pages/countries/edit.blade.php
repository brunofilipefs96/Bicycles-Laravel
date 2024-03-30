@extends('master.main')
@section('content')
    @component('components.countries.country-form-edit', ['country' => $country])
    @endcomponent
@endsection
