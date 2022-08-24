@extends('front.layout.app')
@section('content')
    <section class="container-fluid bg-light p-5">
        <div class="container">
            <h1>Find great company to work</h1>
            <p class="fs-4">There are <span class="text-warning fw-bold">{{$count}}</span> companies</p>
        </div>
        <div class="container shadow py-3 bg-white">
            <div class="d-flex flex-wrap justify-content-evenly gap-5 col-12 col-lg-12">
                @foreach ($companies as $company)
                    @if(isset($company->company->user_id))
                        <a href="{{route('company.show', $company->name)}}" class="text-dark">
                            <div class="card flex-row" style="width: 35rem;">
                                <div class="card-header">
                                    <img src="{{URL::asset('storage/'. $company->company->avatar)}}" class="img-responsive img-fluid img-thumbnail" alt="">
                                </div>
                                <div class="card-body flex-0">
                                    <h3 class="post-title">{{$company->name}}</h3>
                                    <h5 class="card-title fs-6">
                                        RFP For H2O kejfklejflke lkej;lfje; (WASH + Agriculture)
                                    </h5>
                                    <div class='d-flex justify-content-between mt-5'>
                                        <p><span><i class="fa fa-building text-warning"></i> Care</span></p>
                                        <p> <span> <i class="fa fa-compass text-warning"></i> Sana'a</li>
                                        <p><span> <i class="fa fa-list-ol text-warning"></i> {{$company->companyJob->count()}} Jobs</li>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
            
        </div>
    </section>
    
@stop
    <!-- End All Comp Section -->
    
    