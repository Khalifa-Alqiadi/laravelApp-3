<div class="col-md-10 shadow bg-white">
    <h1 class="text-center">Your profile</h1>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div> 
        @endif
    </div>
    <form wire:submit.prevent="UserProfile">
        <div class="row p-2">
            <div class="col-md-7">
                <div class="row">
                    <label class="col-md-12 fs-5">Your Name</label>
                    <div class="row mt-3">
                        <div class="col-md-9 d-flex">
                            @if (!isset($nameEdit))
                                <input type="text" wire:model.defer="name" disabled class="form-control">
                                <i class="fa fa-edit text-dark ms-2 fs-1" wire:click="nameEdit()"></i>
                            @else
                                <input type="text" wire:model.defer="name" class="form-control">
                            @endif
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-12 fs-5">Your Email</label>
                    <div class="row mt-3">
                        <div class="col-md-9 d-flex">
                            @if (!isset($emailEdit))
                                <input type="text" wire:model.defer="email" disabled class="form-control">
                                <i class="fa fa-edit text-dark ms-2 fs-1 " wire:click="emailEdit()"></i>
                            @else
                                <input type="text" wire:model.defer="email" class="form-control">
                            @endif
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-12 fs-5">Your Full Name</label>
                    <div class="row">
                        @if (isset($fullName))
                            <div class="col-md-9 d-flex">
                                @if (isset($fullNameEdit))
                                    <input type="text"  wire:model.defer="fullName" class="form-control">
                                @else
                                    <input type="text"  wire:model.defer="fullName" disabled class="form-control">
                                    <i class="fa fa-edit text-dark ms-2 fs-1" wire:click="fullNameEdit()"></i>
                                @endif
                            </div>
                        @else
                            <div class="col-md-9">
                                <input type="text"  wire:model.defer="fullName" class="form-control">
                            </div>
                        @endif
                        @error('fullName')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-12 fs-5">Your bio</label>
                    <div class="row">
                        @if (isset($bio))
                            <div class="col-md-9 d-flex">
                                @if (isset($bioEdit))
                                    <textarea type="text"  wire:model.defer="bio" class="form-control"></textarea>
                                @else
                                    <textarea type="text"  wire:model.defer="bio" disabled class="form-control"></textarea>
                                    <i class="fa fa-edit text-dark ms-2 fs-1" wire:click="bioEdit()"></i>
                                @endif
                            </div>
                        @else
                            <div class="col-md-9">
                                <textarea type="text"  wire:model.defer="bio" class="form-control"></textarea>
                            </div>
                        @endif
                        @error('bio')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-12 fs-5">Your address</label>
                    <div class="row">
                        @if (isset($address))
                            <div class="col-md-9 d-flex">
                                @if (isset($addressEdit))
                                    <input type="text"  wire:model.defer="address" class="form-control">
                                @else
                                    <input type="text"  wire:model.defer="address" disabled class="form-control">
                                    <i class="fa fa-edit text-dark ms-2 fs-1" wire:click="addressEdit()"></i>
                                @endif
                            </div>
                        @else
                            <div class="col-md-9">
                                <input type="text"  wire:model.defer="address" class="form-control">
                            </div>
                        @endif
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-md-12 fs-5">Your phone</label>
                    <div class="row">
                        @if (isset($phone))
                            <div class="col-md-9 d-flex">
                                @if (isset($phoneEdit))
                                    <input type="text"  wire:model.defer="phone" class="form-control">
                                @else
                                    <input type="text"  wire:model.defer="phone" disabled class="form-control">
                                    <i class="fa fa-edit text-dark ms-2 fs-1" wire:click="phoneEdit()"></i>
                                @endif
                            </div>
                        @else
                            <div class="col-md-9">
                                <input type="text"  wire:model.defer="phone" class="form-control">
                            </div>
                        @endif
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if ($image)
                    <img src="{{$image}}" class="w-100 border" alt="">
                @else
                    @if (isset(Auth::user()->profile->avatar))
                        <img src="{{URL::asset('storage/'. Auth::user()->profile->avatar)}}" alt="" class="w-100 border">
                    @else
                        <img src="{{URL::asset('images/'. $user->avatar)}}" alt="" class="w-100 border">
                    @endif
                    <div class="mt-3 text-center">
                        <i class="fa fa-edit text-dark fs-1" wire:click="avatarEdit()"></i>
                    </div>
                    @if (isset($avatar))
                        <input type="file" id="image" wire:change="$emit('imageChoosen')">
                    @endif
                @endif
            </div>
        </div>
        <button type="submit" class="p-2 my-3 col-md-1 shadow btn btn-primary" >Save</button>
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