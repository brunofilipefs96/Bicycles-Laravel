@extends('master.main')
@section('content')
    @component('components.bicycles.bicycle-form-show', ['bicycle' => $bicycle])
    @endcomponent
@endsection
