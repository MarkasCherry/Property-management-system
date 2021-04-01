@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-content-inner">
                <div class="account-wrapper">
                    <div class="columns">
                        @livewire('clients.client-component', [
                            'formTitle' => 'Create Client',
                            'indexRoute' => route('clients.index'),
                            'formSubmitButtonText' => 'Create'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
