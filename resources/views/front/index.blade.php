
@extends('front.layout.app')
@section('content')
<section id="slider" >
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner hero-info-card">
            @php $i = 1 @endphp
            @if (isset($slider))
                @foreach ($slider as $slider)
                <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                    
                    @if ($i == 1)
                        <img src="{{ URL::asset('images/gradient-2.jpg')}}" class="" alt="...">
                    @elseif ($i == 2)
                        <img src="{{ URL::asset('images/gradient-4.jpeg')}}" class="" alt="...">
                    @elseif ($i == 3)
                        <img src="{{ URL::asset('images/gradient-3.jpg')}}" class="" alt="...">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="card">
                            <div class="card-header bg-transparent">
                                @if ($i == 1)
                                    <img src="{{Url::asset('images/gradient-4.jpeg')}}" class="card-img-top w-100" alt="">
                                @elseif ($i == 2)
                                    <img src="{{Url::asset('images/gradient-3.jpg')}}" class="card-img-top w-100" alt="">
                                @elseif ($i == 3)
                                    <img src="{{Url::asset('images/gradient-2.jpg')}}" class="card-img-top w-100" alt="">
                                @endif
                                <div class="info d-flex flex-column align-items-center">
                                    <h1 class="text-header fs-5 text-center">{{$slider->name}}</h1>
                                </div>
                            </div>
                            <div class="card-body bg-transparent d-flex flex-column">
                                <img src="{{ URL::asset('storage/' . $slider->image)}}" class="card-img-top" alt="...">
                                <p class="fs-4 mt-3"><i class="fa fa-building text-warning"></i> Adding by: {{$slider->company->name}}</p>
                                <p class="fs-4 mt-3"><i class="fa fa-building text-warning"></i> City: {{$slider->address_name}}</p>
                                <p class="fs-4 card-details"><i class='fa fa-calendar text-warning'></i> Posted: {{$slider->created_at->diffForHumans()}}</p>
                                <p class="fs-4 card-details"><i class='fa fa-calendar text-warning'></i> Deadline: {{date_format(new DateTime($slider->end_date),'j M, Y')}}</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                
                            </div>
                        </div>
                    </div>
                </div>
                @php $i++ @endphp
                @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section id="card" class="container">
    <h1 class="text-title">Recent Tenders</h1>
    <div class="d-flex flex-wrap gap-5 col-11 col-lg-12 ">
        {{-- <div class="col"> --}}
            @if (isset($jobs))
                @foreach ($jobs as $job)
                    <div class="card animate text-dark m-auto  p-2 mb-5" style="width: 18rem;">
                        <a class="" href="{{route('details.show', $job->name)}}">
                            <img src="{{ URL::asset('storage/'. $job->image)}}" class="card-img-top" height="200" alt="...">
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
            
            <div class="card animate text-dark m-auto  py-0 mb-5" style="width: 18rem;">
                <a class="" href="details">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                </a>
                <div class="card-bady">
                    <h1 class="text-header fs-5 text-center">Supply and installation</h1>
                    <div class="d-flex justify-content-evenly">
                        <p class="text-center fs-7 card-details"><i class="fa fa-building text-warning"></i> IRC</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 2 week ago</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 10 Feb 2022</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between w-100">
                    <p href="#" class="card-link card-details ms-0">kiejwfkejf</p>
                    <a href=""
                        class="card-link active  fs-6">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
                {{-- <ul class='list-items'>
                    <li>Added By: <span><i class="fa fa-building"></i> IRC</span></li>
                    <li>posted: <span><i class='fa fa-calendar'></i> 2 week ago</span></li>
                    <li>Location: <span> <i class="fa fa-compass"></i> Aden</li>
                    <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                </ul> --}}
                
            </div>
            <div class="card animate text-dark m-auto  py-0 mb-5" style="width: 18rem;">
                <a class="" href="details">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                </a>
                <div class="card-bady">
                    <h1 class="text-header fs-5 text-center">Supply and installation</h1>
                    <div class="d-flex justify-content-evenly">
                        <p class="text-center fs-7 card-details"><i class="fa fa-building text-warning"></i> IRC</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 2 week ago</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 10 Feb 2022</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between w-100">
                    <p href="#" class="card-link card-details ms-0">kiejwfkejf</p>
                    <a href=""
                        class="card-link active  fs-6">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
                {{-- <ul class='list-items'>
                    <li>Added By: <span><i class="fa fa-building"></i> IRC</span></li>
                    <li>posted: <span><i class='fa fa-calendar'></i> 2 week ago</span></li>
                    <li>Location: <span> <i class="fa fa-compass"></i> Aden</li>
                    <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                </ul> --}}
                
            </div>
            <div class="card animate text-dark m-auto  py-0 mb-5" style="width: 18rem;">
                <a class="" href="details">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                </a>
                <div class="card-bady">
                    <h1 class="text-header fs-5 text-center">Supply and installation</h1>
                    <div class="d-flex justify-content-evenly">
                        <p class="text-center fs-7 card-details"><i class="fa fa-building text-warning"></i> IRC</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 2 week ago</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 10 Feb 2022</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between w-100">
                    <p href="#" class="card-link card-details ms-0">kiejwfkejf</p>
                    <a href=""
                        class="card-link active  fs-6">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
                {{-- <ul class='list-items'>
                    <li>Added By: <span><i class="fa fa-building"></i> IRC</span></li>
                    <li>posted: <span><i class='fa fa-calendar'></i> 2 week ago</span></li>
                    <li>Location: <span> <i class="fa fa-compass"></i> Aden</li>
                    <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                </ul> --}}
                
            </div>
            <div class="card animate text-dark m-auto  py-0 mb-5" style="width: 18rem;">
                <a class="" href="details">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                </a>
                <div class="card-bady">
                    <h1 class="text-header fs-5 text-center">Supply and installation</h1>
                    <div class="d-flex justify-content-evenly">
                        <p class="text-center fs-7 card-details"><i class="fa fa-building text-warning"></i> IRC</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 2 week ago</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 10 Feb 2022</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between w-100">
                    <p href="#" class="card-link card-details ms-0">kiejwfkejf</p>
                    <a href=""
                        class="card-link active  fs-6">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
                {{-- <ul class='list-items'>
                    <li>Added By: <span><i class="fa fa-building"></i> IRC</span></li>
                    <li>posted: <span><i class='fa fa-calendar'></i> 2 week ago</span></li>
                    <li>Location: <span> <i class="fa fa-compass"></i> Aden</li>
                    <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                </ul> --}}
                
            </div>
            <div class="card animate text-dark m-auto  py-0 mb-5" style="width: 18rem;">
                <a class="" href="details">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                </a>
                <div class="card-bady">
                    <h1 class="text-header fs-5 text-center">Supply and installation</h1>
                    <div class="d-flex justify-content-evenly">
                        <p class="text-center fs-7 card-details"><i class="fa fa-building text-warning"></i> IRC</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 2 week ago</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 10 Feb 2022</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between w-100">
                    <p href="#" class="card-link card-details ms-0">kiejwfkejf</p>
                    <a href=""
                        class="card-link active  fs-6">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
                {{-- <ul class='list-items'>
                    <li>Added By: <span><i class="fa fa-building"></i> IRC</span></li>
                    <li>posted: <span><i class='fa fa-calendar'></i> 2 week ago</span></li>
                    <li>Location: <span> <i class="fa fa-compass"></i> Aden</li>
                    <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                </ul> --}}
                
            </div>
            <div class="card animate text-dark m-auto  py-0 mb-5" style="width: 18rem;">
                <a class="" href="details">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                </a>
                <div class="card-bady">
                    <h1 class="text-header fs-5 text-center">Supply and installation</h1>
                    <div class="d-flex justify-content-evenly">
                        <p class="text-center fs-7 card-details"><i class="fa fa-building text-warning"></i> IRC</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 2 week ago</p>
                        <p class="text-center fs-7 card-details"><i class='fa fa-calendar'></i> 10 Feb 2022</p>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between w-100">
                    <p href="#" class="card-link card-details ms-0">kiejwfkejf</p>
                    <a href=""
                        class="card-link active  fs-6">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
                {{-- <ul class='list-items'>
                    <li>Added By: <span><i class="fa fa-building"></i> IRC</span></li>
                    <li>posted: <span><i class='fa fa-calendar'></i> 2 week ago</span></li>
                    <li>Location: <span> <i class="fa fa-compass"></i> Aden</li>
                    <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                </ul> --}}
                
            </div>
    </div>
</section>

@endsection
