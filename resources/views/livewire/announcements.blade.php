<div>
    <form method="POST" wire:submit.prevent="submit">
        <div class="columns is-centered">
            <div class="column is-6">
                <x-inputs.textarea for="message" model="message" rows="4">
                    <x-slot name="title">{{ __('Leave your announcement') }}</x-slot>
                </x-inputs.textarea>
            </div>

            <div class="column is-1 m-t-50">
                <button id="save-button" class="button h-button is-primary is-raised" type="submit">
                    {{ __('SEND') }}
                </button>
            </div>
        </div>
    </form>

    <div class="timeline-wrapper">
        <div class="timeline-header"></div>
        <div class="timeline-wrapper-inner">
            <div class="timeline-container">
            @forelse($announcements as $announcement)
                <!--Timeline item-->
                    <div class="timeline-item is-unread">
                        <div class="date">
                            <span>{{ $announcement->created_at->format('j F, Y') }}</span>
                        </div>
                        <div class="dot is-info"></div>
                        <div class="content-wrap">
                            <div class="content-box">
                                <div class="h-avatar">
                                    <img class="avatar"
                                         src="{{ asset('storage/' . $announcement->user->profile_photo_path) ?? "https://via.placeholder.com/150x150" }}">
                                </div>
                                <div class="box-text">
                                    <div class="meta-text">
                                        <p>
                                            <span>@if(!empty($announcement->user->position))
                                                    {{ $announcement->user->position }}@endif
                                                <i class="text-danger">{{ $announcement->user->getFullName() }}</i></span><br><br>
                                            {{ $announcement->message }}</p><br>
                                        <span>{{ $announcement->created_at->format('g:i a') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="page-placeholder custom-text-filter-placeholder">
                        <div class="placeholder-content">
                            <img class="light-image"
                                 src="{{ asset('assets/img/illustrations/placeholders/search-3.svg') }}" alt=""/>
                            <img class="dark-image"
                                 src="{{ asset('assets/img/illustrations/placeholders/search-3-dark.svg') }}" alt=""/>
                            <h3>{{ __("There is no announcements at this moment") }}</h3>
                            <p class="is-larger">{{ __("Be the first one to post the announcement") }}</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div wire:ignore>
                {{ $announcements->onEachSide(1)->links('vendor.pagination.default') }}
            </div>

        </div>
    </div>
</div>
