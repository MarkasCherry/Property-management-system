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
                    <img class="light-image" src="{{ asset('assets/img/illustrations/placeholders/search-3.svg') }}"
                         alt=""/>
                    <img class="dark-image" src="{{ asset('assets/img/illustrations/placeholders/search-3-dark.svg') }}"
                         alt=""/>
                    <h3>{{ __("We couldn't find any matching results.") }}</h3>
                    <p class="is-larger">{{ __("Too bad. Looks like we couldn't find any matching results for the
                        search terms you've entered. Please try different search terms or criteria.") }}</p>
                </div>
            </div>

            <!--Card Grid v2-->
            <div class="columns is-multiline">
                @forelse($properties as $property)
                    <div class="column is-4" id="property-{{ $property->id }}">
                        <div class="card-grid-item">
                            <div class="card">
                                <header class="card-header">
                                    <div class="card-header-title">
                                        <div class="meta">
                                            <h3 class="dark-inverted" data-filter-match>{{ $property->name }}</h3>
                                            <x-assets.stars-rating
                                                rating="{{ $property->rating }}"></x-assets.stars-rating>
                                        </div>
                                    </div>
                                    <div class="card-header-icon">
                                        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                            <div class="is-trigger" aria-haspopup="true">
                                                <i data-feather="more-vertical"></i>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="{{ env('FRONT_OFFICE_URL') . "properties/" . $property->id }}"
                                                       target="_blank" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-cloud-search"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>{{ __('Open in website') }}</span>
                                                            <span>{{ __('Clients view')  }}</span>
                                                        </div>
                                                    </a>
                                                    <a id="shareProp-{{ $property->id }}" class="dropdown-item is-media shareBtn">
                                                        <div class="icon">
                                                            <i class="lnil lnil-share"></i>
                                                        </div>
                                                        <div class="meta">
                                                            <span>{{ __('Share') }}</span>
                                                            <span>{{ __('Share this property') }}</span>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider ">
                                                    <a href="#" class="dropdown-item is-media">
                                                        <div class="icon">
                                                            <i class="lnil lnil-trash-can-alt"></i>
                                                        </div>
                                                        <div class="meta alertify-modal"
                                                             data-property="{{ $property }}">
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
                                            src="{{ $property->getMedia()->first() ? $property->getMedia()->first()->getUrl() : asset('assets/img/placeholders/placeholder.png') }}"
                                            alt="{{ $property->name }}">
                                    </figure>
                                </div>
                                <div class="card-content h-40">
                                    <div class="card-content-flex">
                                        <div class="card-info">
                                            <b data-filter-match><i
                                                    class="fas fa-map-marker-alt p-r-5"></i>{{ $property->address }}</b>
                                            <p data-filter-match
                                               class="dark-inverted m-t-10 has-text-justified @if(strlen($property->short_description) > 200) hint--primary hint--bottom @endif"
                                               @if(strlen($property->short_description) > 200) data-hint="{{ $property->short_description }} @endif">
                                                {!! mb_strimwidth($property->short_description, 0, 200, "...<span class='p-l-10 text-primary'>hover to read more</span>")  !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <footer class="card-footer">
                                    <a href="{{ route('properties.show', $property) }}"
                                       class="card-footer-item">{{ __('Rooms') }}</a>
                                    <a href="{{ route('properties.edit', $property) }}"
                                       class="card-footer-item">{{ __('Settings') }}</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                @empty
                <!--No results returned -->
                    <div class="page-placeholder custom-text-filter-placeholder">
                        <div class="placeholder-content">
                            <img class="light-image"
                                 src="{{ asset('assets/img/illustrations/placeholders/search-3.svg') }}" alt=""/>
                            <img class="dark-image"
                                 src="{{ asset('assets/img/illustrations/placeholders/search-3-dark.svg') }}" alt=""/>
                            <h3>{{ __("No properties found") }}</h3>
                            <p class="is-larger">{{ __("We were not able to find any properties. You can always add them by clicking '+add'
                                in the top right corner.") }}</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{ $properties->onEachSide(1)->links('vendor.pagination.default') }}

        </div>
    </div>
@endsection

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush

@push('scripts')
    <script>
        @foreach($properties as $property)
        document.querySelector('#shareProp-{{ $property->id }}').addEventListener('click', () => {
            navigator.share({
                title: 'Share this property with you friends!',
                text: 'Share this property with you friends!',
                url: '{{ env('FRONT_OFFICE_URL') . "properties/" . $property->id }}',
            });
        });
        @endforeach
    </script>

    <script>
        $('.alertify-modal').on('click', function () {
            let property = $(this).data('property');

            initConfirm('Attention!',
                'Are you sure you want to DELETE<b> "' + property.name + '"</b> property from the system? All the data assigned to this property ' +
                'will be destroyed. Are you sure you want to proceed with DELETING property?',
                false, false,
                'Delete', 'Cancel',
                function (closeEvent) {
                    axios({
                        method: 'DELETE',
                        url: 'properties/' + property.id,
                    }).then(
                        $('#property-' + property.id).hide()
                    );
                })
        })
    </script>
@endpush
