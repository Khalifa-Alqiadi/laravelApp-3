<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SupportTicket;

class Tickets extends Component
{
    public $active = 1;
    protected $listeners = ['ticketSelected'];
    public function ticketSelected($ticketid){
        $this->active = $ticketid;
    }
    public function render()
    {
        return view('livewire.tickets', [
            'tickets' => SupportTicket::get(),
        ]);
    }
}
