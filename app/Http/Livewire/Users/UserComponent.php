<?php

namespace App\Http\Livewire\Users;

use App\Mail\SendPassword;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $last_name;
    public $email;
    public $position;
    public $active = false;
    public $photo;
    public array $selectedRoles = [];

    public $generatePassword;
    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;
    protected array $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'position' => 'required',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif'
    ];

    /**
     * @var User|mixed
     */
    public ?User $user;

    public function mount($user = null)
    {
        if ($user instanceof User) {
            $this->user = $user;
            $this->name = $user->name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
            $this->position = $user->position;
            $this->active = $user->active;
            $this->selectedRoles = array_map('strval', $user->getRoleNames()->all());
        }
    }

    public function resetForm(): void
    {
        $this->name = null;
        $this->last_name = null;
        $this->email = null;
        $this->position = null;
        $this->photo = null;
        $this->active = false;
    }

    public function store()
    {
        $this->rules['photo'] = 'required|image|mimes:jpg,jpeg,png,gif';
        $this->validate();

        $generatedPassword = Str::random(8);

        Mail::to($this->email)
            ->send(new SendPassword($generatedPassword));

        $profile_photo_path = $this->photo->store('profile-photos');

        /** @var User $user */
        $user = User::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'position' => $this->position,
            'profile_photo_path' => $profile_photo_path,
            'password' => bcrypt($generatedPassword),
            'active' => $this->active
        ]);

        $user->syncRoles($this->selectedRoles);

        $this->resetForm();
        $this->emit('alert', ['type' => 'success', 'message' => 'New service has been created!']);
    }

    public function update()
    {
        $this->rules['email'] = ['required','email', Rule::unique('users')->ignore($this->user->id)];
        $this->validate();

        //Generate new password for client, if needed
        if($this->generatePassword) {
            $generatedPassword = Str::random(8);
            $this->user->update(['password' => bcrypt($generatedPassword)]);

            Mail::to($this->user->email)
                ->send(new SendPassword($generatedPassword));

            $this->generatePassword = false;
        }

        $profile_photo_path = $this->user->profile_photo_path;

        if($this->photo) {
            $profile_photo_path = $this->photo->store('profile-photos');
            $this->photo = null;
        }

        /** @var User $user */
        $this->user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'position' => $this->position,
            'profile_photo_path' => $profile_photo_path,
            'active' => $this->active
        ]);

        $this->user->syncRoles($this->selectedRoles);

        $this->emit('alert', ['type' => 'success', 'message' => 'User has been updated!']);
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.user-component', compact('roles'));
    }
}
