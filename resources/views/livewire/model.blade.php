

<div wire:ignore.self class="modal fade" id="addJobs" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" >Add Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="add_Job">
                    <!-- Start Name -->
                    <div class="mb-1 row">
                        <label class="col-sm-3 col-form-label">Job Name</label>
                        <div class="col-sm-10 col-md-9">
                            <input type="text" wire:model.debounce.500ms="name" class="form-control" autocomplete="off"  placeholder="Name Job">
                        </div>
                    </div>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Name -->
                    <!-- Start Description -->
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">{{$descr}} Job</label>
                            <textarea id="{{$descr}}" wire:model.defer="description" class="ckeditor form-control" value="{{old('service_info_ar')}}"></textarea>
                            
                        </div>
                    </div>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Description -->
                    <!-- Start Address -->
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label">Address Job</label>
                        <div class="col-sm-10 col-md-9">
                            <input type="text" wire:model.debounce.500ms="address" class="form-control" autocomplete="new-password"  placeholder="Address Job">
                        </div>
                    </div>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Address -->
                    <!-- Start Start date -->
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label">Start Date Job</label>
                        <div class="col-sm-10 col-md-9">
                            <input type="date" wire:model.debounce.500ms="start" class="form-control"  placeholder="Start Date Job">
                        </div>
                    </div>
                    @error('start')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Start Date -->
                    <!-- Start End date -->
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label">End Date Job</label>
                        <div class="col-sm-10 col-md-9">
                            <input type="date" wire:model.debounce.500ms="end" class="form-control"  placeholder="End Date Job">
                        </div>
                    </div>
                    @error('end')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End End Date -->
                    <!-- Start Forms Link -->
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label">Forms Link Job</label>
                        <div class="col-sm-10 col-md-9">
                            <input type="text" wire:model.debounce.500ms="link" class="form-control"  placeholder="Forms Link Job">
                        </div>
                    </div>
                    @error('link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Forms Link -->
                    <!-- Start Image Field -->
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label">Job Image</label>
                        <div class="col-sm-10 col-md-9">
                            <input type="file" id="image" wire:model="image">
                        </div>
                    </div>
                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <!-- End Image Field -->
                    <button type="submit" class="p-2 col-md-2 shadow" >add</button>
                    </form>
                </div>
                
            
        </div>
    </div>
</div>
@push('scripts_after')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    
    // CKEDITOR.replace('service_info_en')
        CKEDITOR.replace('description');
</script>
@endpush

