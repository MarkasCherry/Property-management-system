@extends('layouts.app')

@section('content')
    <div class="card-grid-toolbar">
        <div class="control has-icon">
            <input class="input custom-text-filter" placeholder="Search..." data-filter-target=".column">
            <div class="form-icon">
                <i data-feather="search"></i>
            </div>
        </div>

        <div class="buttons">
            <div class="field h-hidden-mobile">
                <div class="control">
                    <div class="h-select">
                        <div class="select-box">
                            <span>All Projects</span>
                        </div>
                        <div class="select-icon">
                            <i data-feather="chevron-down"></i>
                        </div>
                        <div class="select-drop has-slimscroll-sm">
                            <div class="drop-inner">
                                <div class="option-row">
                                    <input type="radio" name="grid_filter">
                                    <div class="option-meta">
                                        <span>Web Apps</span>
                                    </div>
                                </div>
                                <div class="option-row">
                                    <input type="radio" name="grid_filter">
                                    <div class="option-meta">
                                        <span>Mobile Apps</span>
                                    </div>
                                </div>
                                <div class="option-row">
                                    <input type="radio" name="grid_filter">
                                    <div class="option-meta">
                                        <span>Dashboards</span>
                                    </div>
                                </div>
                                <div class="option-row">
                                    <input type="radio" name="grid_filter">
                                    <div class="option-meta">
                                        <span>Landing Pages</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('properties.create') }}" class="button h-button is-primary is-raised">
                <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span>Add Property</span>
            </a>
        </div>
    </div>

    <div class="page-content-inner">

        <div class="card-grid card-grid-v2">

            <!--List Empty Search Placeholder -->
            <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                <div class="placeholder-content">
                    <img class="light-image" src="assets/img/illustrations/placeholders/search-3.svg" alt=""/>
                    <img class="dark-image" src="assets/img/illustrations/placeholders/search-3-dark.svg" alt=""/>
                    <h3>We couldn't find any matching results.</h3>
                    <p class="is-larger">Too bad. Looks like we couldn't find any matching results for the
                        search terms you've entered. Please try different search terms or criteria.</p>
                </div>
            </div>

            <!--Card Grid v2-->
            <div class="columns is-multiline">
            @foreach($properties as $property)
                <!--Grid Item-->
                    <div class="column is-4">
                        <div class="card-grid-item">
                            <div class="card" >
                                <header class="card-header">
                                    <div class="card-header-title">
                                        <div class="meta">
                                            <h3 class="dark-inverted" data-filter-match>{{ $property->name }}</h3>
                                            <span class="rating p-t-10">
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star active"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-header-icon">
                                        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                            <div class="is-trigger" aria-haspopup="true">
                                                <i data-feather="more-vertical"></i>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-lock"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Permissions</span>
                                                            <span>Edit permissions</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-bubble"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Message</span>
                                                            <span>Send a message</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-share"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>Share</span>
                                                            <span>Share this profile</span>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-trash-can-alt"></i>
                                                        </div>
                                                        <div class="meta alertify-modal" data-property="{{ $property }}">
                                                            <span>{{ __('Delete') }}</span>
                                                            <span>{{ __('Delete from system') }}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </header>
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img
                                            src="https://lh3.googleusercontent.com/proxy/DUaq5ypDHhUH-ls69L8e2zwPzOylfjGeIBtj2lDUKM41myS7iwtYamLWJyHR-OoSqYUkpSBTpYUFYTRhfkrtFz_l61nrf05VEEvh5ItPrC2aVWK3gw8WG5Di2o8bf6UuLcgZU01o72FOfDCfTjZkgZdCCiD-ofuptozaQtDeY45usivnHAVM3EXu7QeLrLgptCXMnX1J9kPTlr-oUB_xSyCd3sGuEi7DbFx1XIunZ3w2IjX0MeDEj8sK75y837xPte18O0bw5ZvXFE1j2T_-u4y7BaOe16cCJeLnWdH4D3MfMPth"
                                            data-demo-src="https://lh3.googleusercontent.com/proxy/DUaq5ypDHhUH-ls69L8e2zwPzOylfjGeIBtj2lDUKM41myS7iwtYamLWJyHR-OoSqYUkpSBTpYUFYTRhfkrtFz_l61nrf05VEEvh5ItPrC2aVWK3gw8WG5Di2o8bf6UuLcgZU01o72FOfDCfTjZkgZdCCiD-ofuptozaQtDeY45usivnHAVM3EXu7QeLrLgptCXMnX1J9kPTlr-oUB_xSyCd3sGuEi7DbFx1XIunZ3w2IjX0MeDEj8sK75y837xPte18O0bw5ZvXFE1j2T_-u4y7BaOe16cCJeLnWdH4D3MfMPth"
                                            alt="">
                                    </figure>
                                </div>
                                <div class="card-content h-40">
                                    <div class="card-content-flex">
                                        <div class="card-info">
                                            <b data-filter-match><i
                                                    class="fas fa-map-marker-alt p-r-5"></i>{{ $property->address }}</b>
                                            <p data-filter-match
                                               class="dark-inverted m-t-10 has-text-justified hint--primary hint--bottom"
                                               @if(strlen($property->short_description) > 200) data-hint="{{ $property->short_description }} @endif">
                                                {{ mb_strimwidth($property->short_description, 0, 200, "...") }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <footer class="card-footer">
                                    <a href="#" class="card-footer-item">View</a>
                                    <a href="{{ route('properties.edit', $property) }}" class="card-footer-item">Settings</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush

@push('scripts')
    <script>
        $('.alertify-modal').on('click', function () {
            let test = $(this).data('property');

            initConfirm('Attention!',
                'Are you sure you want to DELETE<b>"' + test.name + '"</b> property from the system? All the data assigned to this property' +
                'would be destroy and you will not be able to recreate it. Are you sure you want to proceed DELETING property?',
                false, false,
                'Delete', 'Cancel',
                function (closeEvent) {
                    console.log(test);
                })
        })
    </script>
@endpush
