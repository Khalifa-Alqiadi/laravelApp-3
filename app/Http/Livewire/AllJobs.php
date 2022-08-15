<?php

namespace App\Http\Livewire;

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
    public $image;
    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
    ];
    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }
    public function add_Job()
    {
        $this->validate([
            'name'          => 'required',
            'description'   => 'required',
            'address'       => 'required',
            'start'         => 'required',
            'end'           => 'required',
            'link'          => 'required',
            'image'         => 'required',
        ]);
        $image = $this->storeImage();
        $job = new Job;
        $job->name = $this->name;
        $job->description = $this->description;
        $job->address_name = $this->address;
        $job->start_date = $this->start;
        $job->end_date = $this->end;
        $job->link = $this->link;
        $job->image = $image;
        $job->company_id = Auth::id();
        $job->save();

        session()->flash('message', 'job added successfully');
    }



    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }
    public function removeJob($id)
    {
        $job = Job::find($id);
        Storage::disk('public')->delete($job->image);
        $job->delete();
        session()->flash('message', 'Job deleted successfully 😉');
    }
    public function render()
    {
        $description = 'description';
        $jobs = Job::where('company_id', Auth::id())->get();
        return view('livewire.all-jobs', [
            'descr'         => $description,
            'users'         => User::get(),
            'jobs'          => $jobs,
        ]);
    }
}
