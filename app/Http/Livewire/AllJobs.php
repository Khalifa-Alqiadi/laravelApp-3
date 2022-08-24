<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AllJobs extends Component
{
    use WithPagination, WithFileUploads;
    public $name;
    public $description;
    public $address;
    public $start;
    public $end;
    public $link;
    public $job_id;
    public function add_Job()
    {
        $this->validate([
            'name'          => 'required',
            'description'   => 'required',
            'address'       => 'required',
            'start'         => 'required',
            'end'           => 'required',
            'link'          => 'required',
        ]);
        $job = new Job;
        $job->name = $this->name;
        $job->description = $this->description;
        $job->city_id = $this->address;
        $job->start_date = $this->start;
        $job->end_date = $this->end;
        $job->link = $this->link;
        $job->company_id = Auth::id();
        $job->save();

        session()->flash('message', 'job added successfully');
    }

    public function editJobs($id)
    {
        $job = Job::find($id);
        if ($job) {
            $this->job_id           = $job->id;
            $this->name             = $job->name;
            $this->description      = $job->description;
            $this->address          = $job->city_id;
            $this->start            = $job->start_date;
            $this->end              = $job->end_date;
            $this->link             = $job->link;
        } else {
            redirect()->to('/jobs');
        }
    }

    public function updateJob()
    {
        $job                    = Job::find($this->job_id);
        $job->name              = $this->name;
        $job->description       = $this->description;
        $job->city_id           = $this->address;
        $job->start_date        = $this->start;
        $job->end_date          = $this->end;
        $job->link              = $this->link;

        if ($job->update()) {
            session()->flash('message', 'Job updated successfully 😉');
        }
    }


    public function removeJob($id)
    {
        $job = Job::find($id);
        Storage::disk('public')->delete($job->image);
        $job->delete();
        session()->flash('message', 'Job deleted successfully 😉');
    }


    public function closeModel()
    {
        $this->resetInput();
    }

    public function render()
    {
        $jobs = Job::where('company_id', Auth::id())->get();
        $cities = City::get();
        return view('livewire.all-jobs', [
            'jobs'          => $jobs,
            'cities'        => $cities,
        ]);
    }


    public function resetInput()
    {
        $this->name = '';
        $this->description = '';
        $this->address = '';
        $this->start = '';
        $this->end = '';
        $this->link = '';
        $this->image = '';
    }
}
