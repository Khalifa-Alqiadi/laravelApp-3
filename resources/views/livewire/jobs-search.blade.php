<div class="container mt-5 search-jobs slider-hero p-3">
    <h1 class="">Filter Jobs</h1>
    <div class="input-group">
        <div class="row w-100">
            <div class="col-md-3">
                <select wire:model="company_id" wire:change="filter" class="form-control comp py-3">
                    <option value="">Choose Company....</option>
                    @foreach ($company as $company)
                        <option value="{{$company->user->id}}">{{$company->user->name}}</option>
                    @endforeach 
                </select> 
            </div>
            <div class="col-md-3">
                <select wire:model="city_id" wire:change="filter" class="form-control comp py-3">
                    <option value="">Choose Location....</option>
                    @foreach ($city as $city)
                        @if (isset($city->job[0]))
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endif
                    @endforeach 
                </select> 
            </div>
        </div>
    </div>
</div>
