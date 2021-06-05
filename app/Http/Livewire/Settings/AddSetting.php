<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;

class AddSetting extends Component
{
    public $name;
    public $value;

    protected $rules = [
        'name' => 'required',
        'value' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        Setting::updateOrCreate([
            'name' => $this->name
        ], [
            'value' => $this->value
        ]);

        $this->reset();

        $this->emit('updateTable:settings');

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Settings updated'
        ]);
    }

    public function render()
    {
        return view('livewire.settings.add-setting');
    }
}
