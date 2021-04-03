<?php

namespace App\Http\Livewire\Clients;

use App\Mail\SendPassword;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class ClientComponent extends Component
{
    public ?string $name;
    public $lastname;
    public $phone;
    public $email;
    public $active = false;

    public $generatePassword;
    public $selectedTab;
    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;

    protected array $rules = [
        'name' => 'required|min:3|max:255',
        'lastname' => 'required|min:3|max:255',
        'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:3|max:35',
    ];
    /**
     * @var Client|mixed
     */
    public ?Client $client;

    public function mount($client = null)
    {
        if ($client instanceof Client) {
            $this->client = $client;
            $this->name = $client->name;
            $this->lastname = $client->lastname;
            $this->phone = $client->phone;
            $this->email = $client->email;
            $this->active = $client->active;
        }
    }

    public function update()
    {
        $this->validate();

//        Generate new password for client, if needed
        if($this->generatePassword) {
            $generatedPassword = Str::random(8);
            $this->client->update(['password' => bcrypt($generatedPassword)]);

            Mail::to($this->client->email)
                ->send(new SendPassword($generatedPassword));

            $this->reset(['generatePassword']);
        }

        /** @var Client $client */
        $this->client->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'active' => $this->active
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Client has been updated!']);
    }
    public function render()
    {
        return view('livewire.clients.client-component');
    }
}
