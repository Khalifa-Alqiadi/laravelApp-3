
<div class="col-md-12 p-2">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div> 
    @endif
    <div class="content-right">
        <h1>Apply</h1>
        <p>{{$job->apply->count()}} Advanced</p>
        @if (Auth::user() != null)
        @role('client')
            @if (isset(Auth::user()->profile->user_id))
                <form wire:submit.prevent="applyNow">
                    <input type="hidden" wire:model.defer="user_id">
                    <input type="hidden" value="{{$job->id}}" wire:model.defer="job_id">
                    @if (isset($apply))
                        @foreach ($apply as $apply)
                            @if ($apply->user_id == Auth::id() && $apply->job_id == $job_id)
                                <button class="btn btn-primary text-warning fw-bold " disabled>Applyed</button>
                            @else
                                <button class="btn btn-primary text-warning fw-bold ">Apply now</button>
                            @endif
                        @endforeach
                    @else
                        <button class="btn btn-primary text-warning fw-bold ">Apply now</button>
                    @endif
                    
                </form> 
            @endif
        @endrole
            
        @endif
    </div>
</div>
