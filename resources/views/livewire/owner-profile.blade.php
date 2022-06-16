<div class="p-3 d-flex flex-column border shadow w-100">
    <h1 class="text-title fs-4">Comments</h1>
    <section class="d-flex flex-column">
        {{-- @if (isset($image))
        {{$image}}
        @endif --}}
        @if ($image)
            <img src={{$image}} width="200" alt="">
        @endif
        <input type="file" id="image" wire:change="$emit('fileChoosen')">
    </section>
    <form class="w-100" wire:submit.prevent="addCource">
        
        <div class="d-flex flex-column">
            @error('NewCourese')
            
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div> 
                @endif
            </div>
            <div class="p-2 d-flex w-100">
                <input type="text" class="bg-transparent shadow col-md-9 p-2" wire:model.debounce.500ms="NewCourese">
                <button type="submit" class="p-2 col-md-2 shadow" >add</button>
            </div>
        </div>
        
    </form>
    <div class=" courses-ajax">
        @if(isset($courses))
        @foreach($courses as $course)
            <div class="d-flex border shadow m-2 p-2 justify-content-between">
                <div class="m-2">
                    <div class="d-flex">
                        <p class="mx-2">{{Auth::user()->name}}</p>
                        <p class="active">{{$course->created_at->diffForHumans()}}</p>
                    </div>
                    <p class="mx-3">{{$course->name}}</p>
                    @if ($course->image)
                        <img src="{{$course->imagePath}}" alt="">
                    @endif
                    
                </div>
                <i class="fa fa-times text-danger cursor-pointer m-2" wire:click="remove({{$course->id}})"></i>
            </div>
        @endforeach
        
        @endif
        {{-- <div class=""> --}}
            {{-- <livewire:pagination-links :courses="$courses" /> --}}
            {{$courses->links('livewire.pagination-links',['courses' => $courses])}}
        {{-- </div> --}}
    </div>
    
</div>

<script>
    window.livewire.on('fileChoosen', () =>{
        let inputField = document.getElementById('image')
        let = file = inputField.files[0];
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>
