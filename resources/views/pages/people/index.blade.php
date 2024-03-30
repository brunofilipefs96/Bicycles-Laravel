@extends('master.main')
@section('content')
    @component('components.people.person-list', ['people' => $people])
    @endcomponent
@endsection
