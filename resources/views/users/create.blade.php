@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-content-inner">
                <div class="account-wrapper">
                    <div class="columns">
                        @livewire('users.user-component', [
                            'formTitle' => 'Create User',
                            'indexRoute' => route('users.index')
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
