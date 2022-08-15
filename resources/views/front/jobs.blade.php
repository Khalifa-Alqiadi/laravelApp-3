@extends('front.layout.app')
@section('content')
    @livewire('jobs-search')
    <!-- Start All Jobs Section -->
    @livewire('jobs-front')
    {{-- <livewire:jobs-front> --}}
@endsection

