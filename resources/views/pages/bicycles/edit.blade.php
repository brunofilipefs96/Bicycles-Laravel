@extends('master.main')
@section('content')
    @component('components.bicycles.bicycle-form-edit', ['bicycle' => $bicycle,'people' => $people])
    @endcomponent
@endsection
