@extends('layouts.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-content-inner">
                <div class="account-wrapper">
                    <div class="columns">
                        @livewire('amenities.amenity-component', [
                            'formTitle' => 'Update amenity',
                            'indexRoute' => route('amenities.index'),
                            'formAction' => 'update',
                            'formSubmitButtonText' => 'Update',
                            'amenity' => $amenity,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
