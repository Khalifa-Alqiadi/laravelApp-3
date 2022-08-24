<?php

namespace App\Http\Livewire;

use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplyFront extends Component
{
    public $job;
    public $user_id;
    public $job_id;
    public function mount($job)
    {
        $this->job = $job;
        $this->user_id = Auth::id();
        $this->job_id = $job->id;
    }

    public function applyNow()
    {
        $apply = new Apply();
        $apply->user_id = $this->user_id;
        $apply->job_id = $this->job_id;
        if ($apply->save()) {
            session()->flash('message', 'Appled successfully 😉');
        }
    }
    public function render()
    {
        $apply = Apply::get();
        return view('livewire.apply-front', [
            'apply'         => $apply,
        ]);
    }
}
