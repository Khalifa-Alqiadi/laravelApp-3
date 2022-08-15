<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class JobsFront extends Component
{
    use WithPagination;
    public $jobs;
    protected $listeners = ['reloadJobs'];
    public function mount()
    {
        $this->jobs = Job::where('is_active', 1)->get();
    }


    public function render()
    {
        return view('livewire.jobs-front');
    }

    public function reloadJobs($company_id, $city_id)
    {
        $this->jobs = Job::query();
        if ($company_id) {
            $this->jobs = $this->jobs->where('company_id', $company_id);
        }
        if ($city_id) {
            $this->jobs = $this->jobs->where('city_id', $city_id);
        }

        $this->jobs = $this->jobs->get();
    }
}
