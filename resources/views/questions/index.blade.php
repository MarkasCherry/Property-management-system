@extends('layouts.app')

@section('title') {{ __('Questions') }} @endsection

@section('content')

    @forelse($questions as $question)
        <livewire:questions.question-component :question="$question"/>
    @empty
        <div class="page-placeholder custom-text-filter-placeholder">
            <div class="placeholder-content">
                <img class="light-image"
                     src="{{ asset('assets/img/illustrations/placeholders/search-3.svg') }}" alt=""/>
                <img class="dark-image"
                     src="{{ asset('assets/img/illustrations/placeholders/search-3-dark.svg') }}" alt=""/>
                <h3>{{ __("There is no unanswered questions at this moment") }}</h3>
            </div>
        </div>
    @endforelse

    {{ $questions->onEachSide(1)->links('vendor.pagination.default') }}

@endsection
