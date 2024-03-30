@extends('master.main')
@section('content')
    @component('components.people.person-form-edit', ['person' => $person, 'countries' => $countries, 'bicycles' => $bicycles])
    @endcomponent
@endsection
