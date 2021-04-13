<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DarkMode extends Component
{
    public function setDarkMode()
    {
        auth()->user()->update([
            'dark_mode' => !auth()->user()->dark_mode
        ]);
    }

    public function render()
    {
        return view('livewire.dark-mode');
    }
}
