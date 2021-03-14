<?php

namespace App\Http\Livewire\Amenities;

use App\Models\Amenity;
use Livewire\Component;
use Livewire\WithFileUploads;

class AmenityComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $font_awesome;
    public bool $active = true;
    public $icon;

    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;

    protected array $rules = [
        'name' => 'required|max:255|min:1',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif'
    ];

    public ?Amenity $amenity;

    public function mount($amenity = null)
    {
        if ($amenity instanceof Amenity) {
            $this->amenity = $amenity;
            $this->name = $amenity->name;
            $this->font_awesome = $amenity->font_awesome;
            $this->active = $amenity->active;
        }
    }

    public function store()
    {
        $this->rules['name'] = 'required|max:255|min:1|unique:amenities';

        $this->validate();

        $iconPath = null;
        if($this->icon) {
            $iconPath = $this->icon->store('temporary');
        }

        $amenity = Amenity::create([
            'name' => $this->name,
            'font_awesome' => $this->font_awesome,
            'icon' => $iconPath,
            'active' => $this->active
        ]);

        $this->reset([
            'name',
            'font_awesome',
            'active',
            'icon'
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'New amenity has been added!']);
    }


    public function update()
    {
        $this->validate();

        $iconPath = $this->icon;

        if($this->icon) {
            $iconPath = $this->icon->store('amenities/icons');
            $this->reset([
                'icon'
            ]);
        }


        $this->amenity->update([
            'name' => $this->name,
            'font_awesome' => $this->font_awesome,
            'icon' => $iconPath ?? null,
            'active' => $this->active
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Amenity has been updated!']);
    }

    public function render()
    {
        return view('livewire.amenities.amenity-component');
    }
}
