<?php

namespace App\Http\Livewire\Facilities;

use App\Models\Facility;
use Livewire\Component;

class FacilityComponent extends Component
{
    public string $name;
    public bool $active = false;

    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;
    protected array $rules = [
        'name' => 'required|max:255|min:3|unique:roles',
        'permissions' => 'required',
    ];
    /**
     * @var Facility|mixed
     */
    public ?Facility $facility;

    public function mount($facility = null)
    {
        if ($facility instanceof Facility) {
            $this->facility = $facility;
            $this->name = $facility->name;
            $this->active = $facility->active;
        }
    }


    public function store()
    {
//        $this->validate();
//
//        /** @var Facility $facility */
//        $role = Role::create([
//            'name' => $this->name,
//            'guard_name' => 'web'
//        ]);
//        $role->syncPermissions($this->permissions);
//          $this->reset(['name', 'active']);
//        $this->emit('alert', ['type' => 'success', 'message' => 'New role has been created!']);
    }


    public function update()
    {
//        $this->rules['name'] = 'required|max:255|min:3|unique:roles,id,' . $this->role->id;
//        $this->validate();
//
//        $this->role->update([
//            'name' => $this->name,
//            'guard_name' => 'web'
//        ]);
//        $this->role->syncPermissions($this->permissions);
//        $this->emit('alert', ['type' => 'success', 'message' => 'Role has been updated!']);
    }

    public function render()
    {
        return view('livewire.facilities.facility-component');
    }
}
