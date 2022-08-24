

@if (isset(Auth::user()->company->id))
    <div class="container">
        @include('livewire.model')
        <h1 class="title-header text-center">All Jobs </h1>
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div> 
            @endif
        </div>
        <div class="row">
            <div class="table-responsive">
                <a href="" class="btn btn-sm btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addJobs">
                    <i class="fa fa-plus"></i> Add New
                </a>
                <table class="main-table manage-members text-center table table-bordered">
                    <tr class="bg-dark text-white">
                        <th>Name</th>
                        <th>Location</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Forms Link</th>
                        <th>Apply</th>
                        <th>Control</th>
                    </tr>
                    @foreach ($jobs as $job)
                        @if ($job->is_active == 1)
                            <tr>
                                <td>{{$job->name}}</td>
                                <td>{{$job->cityJob->name}}</td>
                                <td>{{$job->start_date}}</td>
                                <td>{{$job->end_date}}</td>
                                <td>{{$job->link}}</td>
                                <td><a href="{{route('apply.show', $job->id)}}" class="text-dark">{{$job->apply->count()}} Advanced</a></td>
                                <td>
                                    <i class="fa fa-edit text-dark fs-5 cursor-pointer" wire:click="editJobs({{$job->id}})" data-bs-toggle="modal" data-bs-target="#EditJob"></i>
                                    <i class="fa fa-times text-danger fs-5 cursor-pointer ms-2" wire:click="removeJob({{$job->id}})"></i>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
                <div>
                    {{-- {{$jobs->links()}} --}}
                </div>
            </div>
        </div>
    </div> 
@else
    <div class="container mt-5">
        <div class="d-flex mt-5 align-items-center justify-content-center w-100">
            <div class="card mt-5 shadow text-center p-5 fw-bold">
                <h1 class="title=header fs-1 text-warning">YemenUp</h1>
                <p class="fs-5 my-5 col-md-7 m-auto">
                    Sorry! you can only access after complate your acount setting
                </p>
                <div class="card-footer my-5">
                    <a href="{{route('ownerProfile')}}" class="text-warning fs-5 mt-5 mb-2 text-center"><i class="fa fa-long-arrow-right p-2 pt-1">Account setting </i></a>
                </div>
            </div>
        </div>
    </div>
@endif


