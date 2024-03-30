@extends('master.main')
@section('content')
    @component('components.bicycles.bicycle-list', ['bicycles' => $bicycles])
    @endcomponent
@endsection
