<?php

namespace App\Http\Livewire\Clients;

use App\Mail\SendPassword;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ClientComponent extends Component
{
    public ?Client $client;

    public $name;
    public $lastname;
    public $phone;
    public $email;
    public bool $active = false;

    public $generatePassword;
    public $selectedTab;
    public $formTitle;
    public $indexRoute;
    public $formSubmitButtonText;
    public $formAction;

    protected array $rules = [
        'name' => 'required|min:3|max:255',
        'lastname' => 'required|min:3|max:255',
        'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:3|max:35',
        'email' => 'required|string|email|unique:clients'
    ];

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
        $rules['email'] = 'required|string|email' . Rule::unique('clients')->ignore($this->client->id);
        $this->validate();

//      Generate new password for client, if needed
        if($this->generatePassword) {
            $generatedPassword = Str::random(8);
            $this->client->update(['password' => bcrypt($generatedPassword)]);

            Mail::to($this->client->email)
                ->send(new SendPassword($generatedPassword));

            $this->reset(['generatePassword']);
        }

        $this->client->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'active' => $this->active
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Client has been updated!']);
    }

    public function store()
    {
        $this->validate();

        //Generate new password for client
        $generatedPassword = Str::random(8);

        $client = Client::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'active' => $this->active,
            'password' => bcrypt($generatedPassword)
        ]);

        Mail::to($client->email)
            ->send(new SendPassword($generatedPassword));

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Client has been created!'
        ]);
    }

    public function render()
    {
        return view('livewire.clients.client-component');
    }
}
