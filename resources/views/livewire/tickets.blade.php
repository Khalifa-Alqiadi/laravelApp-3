<div class="p-2 border shadow">
    <h1 class="text-title fs-4">Welcome Tickets</h1>
    @foreach ($tickets as $ticket)
        <div class="my-2 border shadow {{$active == $ticket->id ? 'alert alert-success':''}}" 
            wire:click="$emit('ticketSelected', {{$ticket->id}})">
            <p class="p-2 fs-6">{{$ticket->questions}}</p>
        </div>
    @endforeach
</div>
