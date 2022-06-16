@extends('owner.layout.home')
@section('content')
    <div class="mt-3 d-flex justify-content-around">
        <div class="col-md-5">
            @livewire('tickets')
            {{-- <livewire:tickets /> --}}
        </div>
        <div class="col-md-6">
            @livewire('owner-profile')
            {{-- <livewire:owner-profile /> --}}
        </div>
    </div>
@endsection