@if ($courses->hasPages())
<ul class="d-flex justify-content-between">
    @if(!$courses->onFirstPage())
    <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="previousPage">Prev</li>
        
    @else
    <li class="w-16  px-2 py-1 text-center rounded border shadow">Prev</li> 
    @endif

    @foreach($elements as $element)
        <div class="d-flex">
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $courses->currentPage())
                        <li class="mx-2 bg-primary text-white border shadow px-2 py-1 text-center rounded cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                    @else
                        <li class="mx-2 border shadow px-2 py-1 text-center rounded bg-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                    @endif
                @endforeach
            @endif
            
        </div>
    @endforeach

    @if($courses->hasMorePages())
        <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="nextPage">Next</li>
    @else
        <li class="w-16 px-2 py-1 text-center rounded  bg-white ">Next</li>
    @endif
</ul>
@endif