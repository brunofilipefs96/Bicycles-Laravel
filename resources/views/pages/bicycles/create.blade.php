@extends('master.main')
@section('content')
    @component('components.bicycles.bicycle-form-create', ['people' => $people])
    @endcomponent
@endsection
