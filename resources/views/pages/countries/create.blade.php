@extends('master.main')
@section('content')
    @component('components.countries.country-form-create' , ['people' => $people])
    @endcomponent
@endsection
