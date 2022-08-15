



<div class="container">
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
                    <th>Address</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Forms Link</th>
                    <th>Control</th>
                </tr>
                @foreach ($jobs as $job)
                    @if ($job->is_active == 1)
                        <tr>
                            <td>{{$job->name}}</td>
                            <td>{{$job->address_name}}</td>
                            <td>{{$job->start_date}}</td>
                            <td>{{$job->end_date}}</td>
                            <td>{{$job->link}}</td>
                            <td>
                                
                                <i class="fa fa-times text-danger fs-5 cursor-pointer ms-2" wire:click="removeJob({{$job->id}})"></i>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
    
</div>

@include('livewire.model')