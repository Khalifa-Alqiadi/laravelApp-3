@extends('front.layout.app')
@section('content')
    <section class="container mt-5">
        <div class="hero-info-card">
            <div class="card">
                <div class="card-header bg-transparent">
                    <img src="{{URL::asset('images/gradient-4.jpeg')}}" class="card-img-top w-100" alt="">
                    <div class="info d-flex flex-column align-items-center">
                        <h1 class="text-header fs-5 text-center">{{$top->user->name}}</h1>
                    </div>
                </div>
                <div class="card-body bg-transparent d-flex flex-column">
                    <img src="{{ asset('storage/'. $top->avatar)}}" class="card-img-top" alt="...">
                    <p class="fs-4 mt-3"><i class="fa fa-home text-warning"></i> {{$top->user->name}}</p>
                    <p class="fs-4 mt-3"><i class="fa fa-home text-warning"></i> {{$top->bio}}</p>
                </div>
                <div class="card-footer bg-transparent">
                    
                </div>
            </div>
        </div>
    </section>
    <div class="container comp">
        @foreach ($companies as $company)
        @if(isset($company->company->user_id))
        <div class="row">
            <div class="col-sm-2">
                <img src="{{URL::asset('storage/'. $company->company->avatar)}}" class="img-responsive img-fluid img-thumbnail" alt="">
                {{$company->company->image}}
            </div>
            <div class="col-sm-10">
                <h3 class="post-title">dkljvfhlkejf</h3>
                <h5 class="card-title">
                    RFP For H2O Research Consultancy (WASH + Agriculture)
                </h5>
                <ul class='list-items'>
                    <li>Company: <span><i class="fa fa-building"></i> Care</span></li>
                    <li>Location: <span> <i class="fa fa-compass"></i> Sana'a</li>
                </ul>
            </div>
        </div>
        @endif
        @endforeach
        
        
    </div>
@stop
    <!-- End All Comp Section -->
    
    