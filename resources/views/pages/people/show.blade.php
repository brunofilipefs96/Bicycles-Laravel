@extends('master.main')
@section('content')
    @component('components.people.person-form-show', ['person' => $person])
    @endcomponent
@endsection
