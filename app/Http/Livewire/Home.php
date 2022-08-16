<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\URL;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

use Illuminate\Support\Str;

class Home extends Component
{
    use WithPagination;
    public $count = 1;
    public $NewCourese;
    public $image;
    public $ticketid = 1;
    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected',
    ];

    public function ticketSelected($ticketid)
    {
        $this->ticketid = $ticketid;
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }
    // public $courses;
    public function clickNum()
    {
        $this->count++;
    }
    public function updated($field)
    {
        $this->validateOnly($field, ['NewCourese' => 'required|max:255']);
    }
    public function addCource()
    {
        $this->validate(['NewCourese' => 'required|max:255']);
        $image = $this->storeImage();
        $course = new Course;
        $course->name = $this->NewCourese;
        $course->image = $image;
        $course->user_id = Auth::id();
        $course->support_ticket_id = $this->ticketid;
        $course->save();
        // $this->courses->prepend($course);
        $this->NewCourses = '';
        $this->image = '';

        session()->flash('message', 'course added successfully');
    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        // $img->move(public_path('images'), $name);
        Storage::disk('public')->put($name, $img);
        return $name;
    }


    public function remove($courseId)
    {
        $course = Course::find($courseId);
        Storage::disk('public')->delete($course->image);
        $course->delete();
        session()->flash('message', 'course deleted successfully 😉');
    }
    public function paginationView()
    {
        return 'pagination-links';
    }
    public function render()
    {
        $user = User::find(Auth::id());

        return view('livewire.home', [
            'user' => $user,
            'count' => $this->count,
            'courses' => Course::where('support_ticket_id', $this->ticketid)->latest()->paginate(2)
        ]);
    }
}
