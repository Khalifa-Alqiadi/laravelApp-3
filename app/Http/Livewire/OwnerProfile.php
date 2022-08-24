<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\URL;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class OwnerProfile extends Component
{
    use WithPagination, WithFileUploads;
    public $count = 1;
    public $NewCourese;
    public $image;
    public $ticketid = 1;
    public $name;
    public $nameEdit;
    public $emailEdit;
    public $avatar;
    public $email;
    public $bio;
    public $address;
    public $bioEdit;
    public $addressEdit;

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
    public function updated($field)
    {
        $this->validateOnly($field, ['NewCourese' => 'required|max:255']);
    }
    public function EditProfile()
    {
        $this->validate([
            'name'          => 'required',
            'email'         => 'required',
            'bio'           => 'required',
            'address'       => 'required',
        ]);
        $image = $this->storeImage();
        $user =  User::find(Auth::id());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->update();
        if (isset(Auth::user()->company->user_id)) {
            $company = Company::firstWhere('user_id', Auth::id());
            $company->bio = $this->bio;
            $company->address = $this->address;
            $company->avatar = $image;
            $company->update();
        } else {
            $company = new Company();
            $company->bio = $this->bio;
            $company->address = $this->address;
            $company->avatar = $image;
            $company->user_id = Auth::id();
            $company->save();
        }
        session()->flash('message', 'Updated Your Information successfully');
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


    public function remove($courseId)
    {
        $course = Course::find($courseId);
        Storage::disk('public')->delete($course->image);
        $course->delete();
        session()->flash('message', 'course deleted successfully 😉');
    }
    public function nameEdit()
    {
        $company = User::find(Auth::id());
        $this->nameEdit = $company->name;
    }
    public function emailEdit()
    {
        $company = User::find(Auth::id());
        $this->emailEdit = $company->email;
    }
    public function avatarEdit()
    {
        $company = User::find(Auth::id());
        $this->avatar = $company->avatar;
    }
    public function bioEdit()
    {
        $this->bioEdit = '';
    }
    public function addressEdit()
    {
        $this->addressEdit = '';
    }
    public function render()
    {

        $user = User::find(Auth::id());
        $company = Company::firstWhere('user_id', Auth::id());
        $this->name = $user->name;
        $this->email = $user->email;
        if ($company) {
            $this->bio = $company->bio;
            $this->address = $company->address;
            // $this->image = $company->avatar;
        }
        return view('livewire.owner-profile', [
            'name'          => $this->name,
            'nameEdit'      => $this->nameEdit,
            'user'          => $user,
            'avatar'        => $this->avatar,
            'email'         => $this->email,
            'emailEdit'     => $this->emailEdit,
            'bio'           => $this->bio,
            'address'       => $this->address,
            'company'       => $company,
            'bioEdit'       => $this->bioEdit,
            // 'image'         => $this->image,
            'addressEdit'   => $this->addressEdit,
        ]);
    }
}
