@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-content-inner">
                <div class="account-wrapper">
                    <div class="columns">
                        @livewire('roles.role-component', [
                            'formTitle' => 'Create Role',
                            'indexRoute' => route('roles.index')
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
