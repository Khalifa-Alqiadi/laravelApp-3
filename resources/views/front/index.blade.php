
@extends('front.layout.app')
@section('content')
<div class="container-fluid slider-hero p-2">
    <div id="slider-jobs" class="swiper slider-content">
        <div class="d-flex swiper-wrapper">
            @php $i = 1 @endphp
            @if (isset($jobs))
                @foreach ($jobs as $job)
                    @if ($i <= 8)
                        <div class="card items-jobs swiper-slide text-dark m-auto slider-card p-3 mx-2" style="">
                            <a class="items" href="{{route('job.show', [$job->id, preg_replace('/\+/', '_', urlencode($job->name))])}}">
                                <img src="{{ URL::asset('images/gradient-2.jpg')}}" class="card-img-top" height="200" alt="...">
                                <div class="info">
                                    <h1 class="text-header fs-5 my-3 text-center">{{$job->name}}</h1>
                                </div>
                            </a>
                            <div class="card-bady d-flex mt-3 justify-content-between">
                                <img src="{{ URL::asset('storage/'. $job->company->avatar)}}" class="card-img-top border" height="100" alt="...">
                                
                                <div class="">
                                    <p class="fs-7 my-2 card-details"><i class='fa fa-calendar'></i> Deadline: {{date_format(new DateTime($job->end_date),'j M, Y')}}</p>
                                    <p class="fs-7 card-details"><i class="fa fa-building"></i> {{$job->company->name}}</p>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-between w-100">
                                <p href="#" class="card-link card-details ms-0"><i class="fa fa-spinner"></i> Progress</p>
                                
                                <a href="" class="card-link active text-warning fs-6"><i class="fa fa-long-arrow-right p-2 pt-1"></i>Details</a>
                            </div>
                            
                        </div>
                    @endif
                    @php $i++ @endphp 
                @endforeach
            @endif
        </div>
        
    </div>
    <div class="swiper-button-next text-warning"></div>
    <div class="swiper-button-prev text-warning"></div>
    <div class="swiper-pagination"></div>
</div>
<section id="card" class="container shadow p-2 mt-5">
    <h1 class="text-title">Recent Tenders</h1>
    <div class="d-flex flex-wrap gap-5 col-11 col-lg-12 ">
        {{-- <div class="col"> --}}
            @if (isset($jobs))
                @foreach ($jobs as $job)
                    <div class="card animate text-dark m-auto shadow p-2 mb-5" style="width: 18rem;">
                        <a class="" href="{{route('job.show', [$job->id, preg_replace('/\+/', '_', urlencode($job->name))])}}">
                            <img src="{{ URL::asset('storage/'. $job->company->avatar)}}" class="card-img-top" height="200" alt="...">
                        </a>
                        <div class="card-bady">
                            <h1 class="text-header fs-5 my-3 text-center">{{$job->name}}</h1>
                            <div class="">
                                <p class="fs-7 text-center my-2 card-details"><i class='fa fa-calendar'></i> Deadline: {{date_format(new DateTime($job->end_date),'j M, Y')}}</p>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between w-100">
                            <p href="#" class="card-link card-details ms-0"><i class="fa fa-spinner"></i> Progress</p>
                            <p class="text-center fs-7 card-details"><i class="fa fa-building"></i> {{$job->company->name}}</p>
                            <a href="" class="card-link active text-warning fs-6"><i class="fa fa-long-arrow-right p-2 pt-1"></i>Details</a>
                        </div>
                        
                    </div>
                @endforeach
            @endif
    </div>
</section>

@endsection

@push('scripts_after')
<script>
    var swiper = new Swiper(".slider-content", {
      slidesPerView: 4,
      spaceBetween: 18,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
        1200: {
            slidesPerView: 4,
        },
      },
    });
  </script>
@endpush
