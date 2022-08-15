@extends('front.layout.app')
@section('content')
<section id="datile">
        <div class="container header-datile">
            <div class="row">
                <div class="col-sm-9">
                    <h5 class="card-title">
                        {{$job->name}}
                    </h5>
                    <ul class='list-items'>
                        <li><i class="fa fa-building text-warning"></i> {{$job->company->name}}</li>
                        <li><i class="fa fa-home text-warning"></i> {{$job->address_name}}</li>
                        <li><i class='fa fa-calendar text-warning'></i> Posted: <span> {{$job->created_at->diffForHumans()}}</span></li>
                        <li><i class='fa fa-calendar text-warning'></i> Deadline: <span>  {{date_format(new DateTime($job->end_date),'j M, Y')}}</span></li>
                    </ul>
                </div>
                <div class="col-sm-3 d-flex justify-content-evenly">
                    <i class="fa fa-facebook text-primary fs-4 mt-5"></i>
                    <i class="fa fa-twitter text-primary fs-4 mt-5"></i>
                    <i class="fa fa-instagram text-primary fs-4 mt-5"></i>
                </div>
            </div>
        </div>
        <div class="container datile-content">
            <div class="row">
                <div class="col-sm-9 content-left">
                    <h1 class="card-header">
                        Job Description
                    </h1>
                    <div class="card-body">
                        {!! $job->description !!}
                    </div>
                    <div class="card-footer">
                        <h1 class="card-header">
                            How to Apply
                        </h1>
                        <p>The deadline for submitting applications is {{date_format(new DateTime($job->end_date),'F j, Y')}}, Yemen time.</p>
                        <p>To apply via the following link:</p>
                        <h4><a href="{{$job->link}}" class="text-dark">{{$job->link}}</a></h4>
                    </div>
                </div>
                <div class="col sm-2 ">
                    <div class="content-right">
                        <img src="../layout/images/UNHCR.png" class="img-responsive img-fluid img-thumbnail" alt="">
                        <hr>
                        <div class="comp-info">
                            <h2 class="card-header">Other jobs from Al-Awn Foundation for Development</h2>
                            @if (isset($jobs))
                                @foreach ($jobs as $job)
                                    <div class="lists">
                                        <h4>{{$job->name}}</h4>
                                        <p>Deadline: {{date_format(new DateTime($job->end_date),'j M, Y')}}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="save">
                            <p><i class="fa fa-bookmark"></i> Save (Login required)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Datiles Section -->
    @endsection