<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use App\Models\RoleCategory;
use Livewire\Component;

class RoleComponent extends Component
{
    public $name;
    public array $permissions = [];

    public $selectedTab;

    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;
    protected array $rules = [
        'name' => 'required|max:255|min:3|unique:roles',
        'permissions' => 'required',
    ];
    /**
     * @var Role|mixed
     */
    public ?Role $role;

    public function mount($role = null)
    {
        $this->selectedTab =  RoleCategory::RootCategories()->first()->id;

        if ($role instanceof Role) {
            $this->role = $role;
            $this->name = $role->name;
            $this->permissions = array_map('strval', $role->permissions->pluck('id')->all());
        }
    }


    public function store()
    {
        $this->validate();

        /** @var Role $role */
        $role = Role::create([
            'name' => $this->name,
            'guard_name' => 'web'
        ]);
        $role->syncPermissions($this->permissions);
        $this->resetForm();
        $this->emit('alert', ['type' => 'success', 'message' => 'New role has been created!']);
    }

    public function resetForm(): void
    {
        $this->name = null;
        $this->permissions = [];
    }

    public function update()
    {
        $this->rules['name'] = 'required|max:255|min:3|unique:roles,id,' . $this->role->id;
        $this->validate();

        $this->role->update([
            'name' => $this->name,
            'guard_name' => 'web'
        ]);
        $this->role->syncPermissions($this->permissions);
        $this->emit('alert', ['type' => 'success', 'message' => 'Role has been updated!']);
    }

    public function render()
    {
        $categories = RoleCategory::RootCategories()->get();

        return view('livewire.roles.role-component',
            compact('categories')
        );
    }
}
