@extends('front.layout.app')
@section('content')

    <div class="container mt-5 shadow p-2">
        <div class="row">
            <div class="col-md-4 p-2 bg-warning">
                <img src="{{URL::asset('storage/'. $company->company->avatar)}}" class="w-100" alt="">
            </div>
            <div class="col-md-7 p-2 ms-3">
                <h1 class="mt-0">{{$company->name}}</h1>
                <p class="fs-4">{{$company->company->bio}}</p>
                <ul>
                    <li class="bg-light fs-6 p-2">Location: 
                        <i class="fa fa-compass text-warning ms-5"></i> {{$company->company->address}}
                    </li>
                    <li class="bg-white fs-6 p-2">Jobs: 
                        <i class="fa fa-list-ol text-warning ms-5"></i> {{$company->companyJob->count()}} Jobs
                    </li>
                </ul>
                <div class="bg-light fs-6 p-2"> 
                    <i class="fa fa-star fs-4 text-warning"></i>
                    <i class="fa fa-star fs-4 text-warning"></i>
                    <i class="fa fa-star fs-4 text-warning"></i>
                    <i class="fa fa-star fs-4 text-warning"></i>
                    <i class="fa fa-star fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-5 container">
        <div class="card">
            <div class="card-header bg-warning p-2">Jobs for {{$company->name}}</div>
            <div class="card-body p-2">
                <div class="d-flex flex-wrap gap-5 col-11 col-lg-12 ">
                    @foreach ($company->companyJob as $job)
                        <div class="card items-jobs" style="width: 17rem;">
                            <a class="items" href="{{route('details.show', $job->name)}}">
                                <img src="{{ URL::asset('images/gradient-2.jpg')}}" class="card-img-top" height="200" alt="...">
                                <div class="info">
                                    <h1 class="text-header fs-5 my-3 text-center">{{$job->name}}</h1>
                                </div>
                            </a>
                            <div class="card-body">
                                <p class="fs-7 my-2 card-details"><i class='fa fa-calendar text-warning'></i> Deadline: {{date_format(new DateTime($job->end_date),'j M, Y')}}</p>
                                <p class="fs-7 my-2 card-details"><i class='fa fa-compass text-warning'></i> Location: {{$job->cityJob->name}}</p>
                                <a href="{{route('details.show', $job->name)}}" class="btn btn-primary text-warning fw-bold">View job</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection