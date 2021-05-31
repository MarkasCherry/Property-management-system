<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcements as AnnouncementsModel;
use Livewire\WithPagination;

class Announcements extends Component
{
    use WithPagination;

    public $message;

    protected $rules = [
        'message' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        AnnouncementsModel::create([
            'user_id' => auth()->id(),
            'message' => $this->message
        ]);

        $this->reset('message');
        $this->emit('refresh');

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'You have successfully posted an announcement!'
        ]);
    }

    public function render()
    {
        $announcements = AnnouncementsModel::latest()->paginate(10);

        return view('livewire.announcments', compact('announcements'));
    }
}
