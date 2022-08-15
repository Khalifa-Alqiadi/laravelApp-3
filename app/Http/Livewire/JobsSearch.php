<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use Livewire\Component;

class JobsSearch extends Component
{
    public $company_id;
    public $city_id;
    public function render()
    {
        $company    = Company::where('is_active', 1)->get();
        $city       = City::with('job')->where('is_active', 1)->get();
        return view('livewire.jobs-search', [
            'company'           => $company,
            'city'              => $city,
        ]);
    }

    public function filter()
    {
        $this->emitTo('jobs-front', 'reloadJobs', $this->company_id, $this->city_id);
    }
}
