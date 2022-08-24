<?php

namespace App\Http\Livewire\User;

use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use App\Models\UserProfile as ModelsUserProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class UserProfile extends Component
{
    use WithPagination, WithFileUploads;
    public $user, $nameEdit, $name, $email, $emailEdit, $fullName, $fullNameEdit,
        $bio, $bioEdit, $address, $addressEdit, $phone, $phoneEdit, $image,
        $avatar, $avatarEdit, $profileData;
    public $user_id;
    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
    ];

    protected function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required',
            'fullName'  => 'required',
            'bio'       => 'required',
            'address'   => 'required',
            'phone'     => 'required',
        ];
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }
    public function nameEdit()
    {
        $this->nameEdit = '';
    }
    public function emailEdit()
    {
        $this->emailEdit = '';
    }
    public function fullNameEdit()
    {
        $this->fullNameEdit = '';
    }
    public function bioEdit()
    {
        $this->bioEdit = '';
    }
    public function addressEdit()
    {
        $this->addressEdit = '';
    }
    public function phoneEdit()
    {
        $this->phoneEdit = '';
    }
    public function avatarEdit()
    {
        $this->avatar = '';
    }


    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        if (isset($user->profile->user_id)) {
            $this->fullName = $user->profile->fullName;
            $this->bio = $user->profile->bio;
            $this->address = $user->profile->address;
            $this->phone = $user->profile->phone;
        }
    }



    public function UserProfile()
    {
        $validatedData = $this->validate();
        $user = User::find(Auth::id());
        $image = $this->storeImage();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->update();
        if (isset(Auth::user()->profile->user_id)) {
            $profile = ModelsUserProfile::find(Auth::user()->profile->id);
            $profile->fullName = $this->fullName;
            $profile->bio = $this->bio;
            $profile->address = $this->address;
            $profile->phone = $this->phone;
            if ($image != null) {
                $profile->avatar = $image;
            }
            $profile->update();
        } else {
            $profile = new ModelsUserProfile;
            $profile->fullName = $this->fullName;
            $profile->bio = $this->bio;
            $profile->address = $this->address;
            $profile->phone = $this->phone;
            if ($image != null) {
                $profile->avatar = $image;
            }
            $profile->user_id = Auth::id();
            $profile->save();
        }
        session()->flash('message', 'Updated Your Information successfully');
    }


    public function render()
    {
        return view('livewire.user.user-profile');
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
}
