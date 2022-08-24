

<div wire:ignore.self class="modal fade" id="addJobs" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add Job</h5>
                <button type="button" class="btn-close" wire:click="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="add_Job">
                <!-- Start Name -->
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="form-label fw-bold">Job Name</label>
                        <input type="text" wire:model.defer="name" class="form-control"  placeholder="Name Job">
                    </div>
                </div>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <!-- End Name -->
                <!-- Start Description -->
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Description Job</label>
                        <textarea id="description" wire:model.defer="description" class="ckeditor form-control"></textarea>
                    </div>
                </div>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <!-- End Description -->
                <!-- Start Address -->
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="form-label fw-bold">Select Location Job</label>
                        <select wire:model.debounce.500ms="address" class="form-control">
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('address')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <!-- End Address -->
                <!-- Start Start date -->
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="form-label fw-bold">Start Date Job</label>
                        <input type="date" wire:model.debounce.500ms="start" class="form-control"  placeholder="Start Date Job">
                    </div>
                </div>
                @error('start')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <!-- End Start Date -->
                <!-- Start End date -->
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="form-label fw-bold">End Date Job</label>
                        <input type="date" wire:model.debounce.500ms="end" class="form-control"  placeholder="End Date Job">
                    </div>
                </div>
                @error('end')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <!-- End End Date -->
                <!-- Start Forms Link -->
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="form-label fw-bold">Forms Link Job</label>
                        <input type="text" wire:model.debounce.500ms="link" class="form-control"  placeholder="Forms Link Job">
                    </div>
                </div>
                @error('link')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <!-- End Forms Link -->
                <button type="submit" class="p-2 col-md-2 shadow btn btn-primary mt-2" >add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div wire:ignore.self class="modal fade" id="EditJob" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Edit Job</h5>
                <button type="button" class="btn-close" wire:click="closeModel" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateJob">
                    <!-- Start Name -->
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="form-label fw-bold">Job Name</label>
                            <input type="text"  wire:model="name" class="form-control"  placeholder="Name Job">
                            <input type="hidden"  wire:model="job_id" class="form-control">
                        </div>
                    </div>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Name -->
                    <!-- Start Description -->
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label fw-bold">Description Job</label>
                            <textarea id="edit-description" value="{!! $description !!}" wire:model.debounce.500ms="description" class="ckeditor form-control"></textarea>
                        </div>
                    </div>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Description -->
                    <!-- Start Address -->
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="form-label fw-bold">Select Location Job</label>
                            <select wire:model.debounce.500ms="address" class="form-control">
                                @foreach ($cities as $city)
                                    @if ($city->id == $address)
                                        <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Address -->
                    <!-- Start Start date -->
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="form-label fw-bold">Start Date Job</label>
                            <input type="date" wire:model.debounce.500ms="start" class="form-control"  placeholder="Start Date Job">
                        </div>
                    </div>
                    @error('start')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Start Date -->
                    <!-- Start End date -->
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="form-label fw-bold">End Date Job</label>
                            <input type="date" wire:model.debounce.500ms="end" class="form-control"  placeholder="End Date Job">
                        </div>
                    </div>
                    @error('end')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End End Date -->
                    <!-- Start Forms Link -->
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="form-label fw-bold">Forms Link Job</label>
                            <input type="text" wire:model.debounce.500ms="link" class="form-control"  placeholder="Forms Link Job">
                        </div>
                    </div>
                    @error('link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Forms Link -->
                    <div class="mb-2 row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-10 col-md-9">
                            <button type="submit" class="p-2 col-md-2 shadow btn btn-primary" >add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts_after')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    
    
    CKEDITOR.replace('description');
    CKEDITOR.replace('edit-description')
</script>
@endpush

