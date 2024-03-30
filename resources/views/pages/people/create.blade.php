@extends('master.main')
@section('content')
    @component('components.people.person-form-create', ['countries' => $countries, 'bicycles' => $bicycles])
    @endcomponent
@endsection
