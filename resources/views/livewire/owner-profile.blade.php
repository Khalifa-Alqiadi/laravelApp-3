<div class="container">
    <h1 class="title-header text-center">Profile</h1>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div> 
        @endif
    </div>
    <form wire:submit.prevent="EditProfile" class="w-100">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <label class="col-md-12 fs-5">Company Name</label>
                    <div class="row mt-3">
                        <div class="col-md-9">
                            @if (!isset($nameEdit))
                                <input type="text" wire:model.defer="name" disabled class="form-control">
                                
                            @else
                                <input type="text" wire:model.defer="name" class="form-control">
                            @endif
                        </div>
                        <div class="col-md-2">
                            <i class="fa fa-edit text-dark fs-1" wire:click="nameEdit()"></i>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-12 fs-5">Company Email</label>
                    <div class="row">
                        <div class="col-md-9">
                            @if (isset($emailEdit))
                                <input type="text"  wire:model.defer="email" class="form-control">
                            @else
                                <input type="text"  wire:model.defer="email" disabled class="form-control">
                            @endif
                        </div>
                        <div class="col-md-2">
                            <i class="fa fa-edit text-dark fs-1" wire:click="emailEdit()"></i>
                        </div>
                    </div>
                </div> 
                <div class="row mt-3">
                    <label class="col-md-12 fs-5">Company Bio</label>
                    <div class="row">
                        @if (isset($company->bio))
                            <div class="col-md-9">
                                @if (isset($bioEdit))
                                    <textarea type="text"  wire:model.defer="bio" class="form-control"></textarea>
                                @else
                                    <textarea type="text"  wire:model.defer="bio" disabled class="form-control"></textarea>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <i class="fa fa-edit text-dark fs-1" wire:click="bioEdit()"></i>
                            </div>
                        @else
                            <div class="col-md-9">
                                <textarea type="text"  wire:model.defer="bio" class="form-control"></textarea>
                            </div>
                        @endif
                    </div>
                    
                </div> 
                <div class="row mt-3">
                    <label class="col-md-12 fs-5">Company Address</label>
                    <div class="row">
                        @if (isset($company->address))
                            <div class="col-md-9">
                                @if (isset($addressEdit))
                                    <input type="text"  wire:model.defer="address" class="form-control">
                                @else
                                    <input type="text"  wire:model.defer="address" disabled class="form-control">
                                @endif
                            </div>
                            <div class="col-md-2">
                                <i class="fa fa-edit text-dark fs-1" wire:click="addressEdit()"></i>
                            </div>
                        @else
                            <div class="col-md-9">
                                <input type="text"  wire:model.defer="address" class="form-control">
                            </div>
                        @endif
                    </div>
                    
                </div> 
            </div>
            <div class="col-md-4">
                @if ($image)
                    <img src="{{$image}}" class="w-100 border" alt="">
                @else
                    @if (isset(Auth::user()->company->avatar))
                        <img src="{{asset('storage/'. Auth::user()->company->avatar)}}" alt="" class="w-100 border">
                    @else
                        <img src="{{asset('images/img.jpg')}}" alt="" class="w-100 border">
                    @endif
                    <div class="mt-3 text-center">
                        <i class="fa fa-edit text-dark fs-1" wire:click="avatarEdit()"></i>
                    </div>
                    @if (isset($avatar))
                        <input type="file" id="image" wire:change="$emit('imageChoosen')">
                    @endif
                @endif
            </div>
            <button type="submit" class="p-2 col-md-1 shadow btn btn-primary" >Save</button>
        </div>
    </form>
</div>

<script>
    window.livewire.on('imageChoosen', () =>{
        let inputField = document.getElementById('image')
        let = file = inputField.files[0];
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
    
</script>
<script>
 
</script>
