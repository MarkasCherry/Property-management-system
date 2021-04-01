@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-content-inner">
                <div class="account-wrapper">
                    <div class="columns">
                        @livewire('clients.client-component', [
                            'formTitle' => 'Edit Client',
                            'indexRoute' => route('clients.index'),
                            'formAction' => 'update',
                            'formSubmitButtonText' => 'Update',
                            'client' => $client,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
