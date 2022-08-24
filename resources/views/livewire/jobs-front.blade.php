


<section id="card" class="">
    <div class="container shadow">
        <h1 class="text-title" wire:click="select('Company')">Recent Tenders</h1>
        <div class="d-flex flex-wrap gap-5 col-11 col-lg-12 ">
        
            {{-- @if (isset($jobs)) --}}
                @foreach ($jobs as $job)
                    <div class="card  text-dark m-auto  p-2 mb-5" style="width: 18rem;">
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
            {{-- @endif --}}
        </div>
    </div>
</section>
