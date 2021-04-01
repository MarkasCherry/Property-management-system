<div class="column is-12">
    <div class="form-layout">
        <div class="form-outer">
            <div class="form-header ">
                <div class="form-header-inner">
                    <div class="left">
                        <h3>{{ $client->getFullName() }} profile</h3>
                    </div>
                    <div class="right">
                        <div class="buttons">
                            <a href="{{ $indexRoute }}" class="button h-button is-light is-dark-outlined">
                                <span class="icon">
                                    <i class="lnir lnir-arrow-left rem-100"></i>
                                </span>
                                <span>Go back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-body">
                <div class="tabs-wrapper is-squared">
{{--                    <div class="tabs-inner">--}}
{{--                        <div class="tabs">--}}
{{--                            <ul>--}}
{{--                                <li data-tab="role-tab1" class="@if($selectedTab == 1) is-active @endif" wire:click="$set('selectedTab', 1)">--}}
{{--                                    <a><span>Main information</span></a>--}}
{{--                                </li>--}}
{{--                                <li data-tab="role-tab2" class="@if($selectedTab == 2) is-active @endif" wire:click="$set('selectedTab', 2)">--}}
{{--                                    <a><span>Ordered services</span><span class="m-l-5 tag is-rounded is-info is-elevated">{{ $client->totalOrderedProducts() }}</span></a>--}}
{{--                                </li>--}}
{{--                                <li data-tab="role-tab3" class="@if($selectedTab == 3) is-active @endif" wire:click="$set('selectedTab', 3)">--}}
{{--                                    <a><span>Edit client information</span></a>--}}
{{--                                </li>--}}
{{--                                <li class="tab-naver"></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- First tab-->--}}
{{--                    <div id="role-tab1" class="tab-content @if($selectedTab == 1) is-active @endif">--}}
{{--                        <div class="columns">--}}

{{--                            <!--Navigation-->--}}
{{--                            <div class="column is-4">--}}
{{--                                <!--Widget-->--}}
{{--                                <div class="widget illustration-widget illustration-widget-v1">--}}
{{--                                    <div class="img-container">--}}
{{--                                        <img class="main" src="@if($client->avatar){{ env('PWA_URL') . '/storage/' . $client->avatar }}@else{{ asset('assets/img/placeholders/placeholder.png') }}@endif" alt="{{ $client->getFullName() }}">--}}
{{--                                    </div>--}}
{{--                                    <h3>{{ $client->getFullName() }}</h3>--}}
{{--                                    <p><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></p>--}}
{{--                                    <p><a href="tel:{{ $client->phone }}">{{ $client->phone }}</a></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!--Form-->--}}
{{--                            <div class="column is-8">--}}
{{--                                <div class="title is-5 text-center">--}}
{{--                                    <h3>All client's registered animals</h3>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <livewire:animals-table params="{{ $client->id }}"/>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Second tab-->--}}
{{--                    <div id="role-tab2" class="tab-content @if($selectedTab == 2) is-active @endif">--}}
{{--                        <div class="column is-12">--}}
{{--                            <div class="title is-5 text-center">--}}
{{--                                <h3>{{ __("All client's registered animals") }}</h3>--}}
{{--                            </div>--}}
{{--                            <div class="page-content-inner" wire:ignore>--}}
{{--                                <!-- Datatable -->--}}
{{--                                <div class="table-wrapper" style="min-height: unset; border: unset">--}}

{{--                                    <table class="table is-datatable is-hoverable table-is-bordered">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Service name</th>--}}
{{--                                            <th>Cost</th>--}}
{{--                                            <th>Status</th>--}}
{{--                                            <th>Date</th>--}}
{{--                                            <th>Actions</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach($client->orders()->completed()->get() as $order)--}}
{{--                                            @if($order->products()->getQuestions()->get()->isEmpty())--}}
{{--                                                @continue--}}
{{--                                            @endif--}}
{{--                                            @foreach($order->products()->getQuestions()->get() as $product)--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{ $product->question->consultation->name }} konsultacija</td>--}}
{{--                                                    <td>{{ $product->question->consultation->price }}€</td>--}}
{{--                                                    <td>--}}
{{--                                                        @if(!$product->question->answers->isEmpty())--}}
{{--                                                            <span class="tag is-rounded is-success">Answered</span>--}}
{{--                                                        @else--}}
{{--                                                            <span class="tag is-rounded is-danger">Not answered</span>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                    <td>{{ date('Y-m-d', strtotime($product->question->created_at)) }}</td>--}}
{{--                                                    <td>--}}
{{--                                                        <a href="{{ route('questions.edit', $product->question) }}" class="tag is-info">View</a>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="column is-12 m-t-80">--}}
{{--                            <div class="title is-5 text-center">--}}
{{--                                <h3>{{ __('Appointments') }}</h3>--}}
{{--                            </div>--}}
{{--                            <div class="page-content-inner" wire:ignore>--}}
{{--                                <!-- Datatable -->--}}
{{--                                <div class="table-wrapper" style="min-height: unset; border: unset">--}}

{{--                                    <table class="table is-datatable is-hoverable table-is-bordered">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Institution</th>--}}
{{--                                            <th>Specialist</th>--}}
{{--                                            <th>Service</th>--}}
{{--                                            <th>Appointment Day</th>--}}
{{--                                            <th>Appointment Time</th>--}}
{{--                                            <th>Duration</th>--}}
{{--                                            <th>Date registered</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach($client->appointments as $appointment)--}}
{{--                                            <tr>--}}
{{--                                                <td>{{ $appointment->institution->address }}</td>--}}
{{--                                                <td>{{ $appointment->veterinarian->getFullName() }}</td>--}}
{{--                                                <td>{{ $appointment->service->service }}</td>--}}
{{--                                                <td>{{ date('Y-m-d', strtotime($appointment->appointment_day)) }}</td>--}}
{{--                                                <td>{{ date('H:m', strtotime($appointment->appointment_day)) }}</td>--}}
{{--                                                <td>{{ $appointment->duration }}</td>--}}
{{--                                                <td>{{ date('Y-m-d', strtotime($appointment->date_registered)) }}</td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="column is-12 m-t-80">--}}
{{--                            <div class="title is-5 text-center">--}}
{{--                                <h3>{{ __('Gyvunumaistas.lt orders') }}</h3>--}}
{{--                            </div>--}}

{{--                            <div class="page-content-inner" wire:ignore>--}}
{{--                                <!-- Datatable -->--}}
{{--                                <div class="table-wrapper" style="min-height: unset; border: unset">--}}

{{--                                    <table class="table is-datatable is-hoverable table-is-bordered">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>ID</th>--}}
{{--                                            <th>Cost</th>--}}
{{--                                            <th>Status</th>--}}
{{--                                            <th>Date</th>--}}
{{--                                            <th>Products</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach($client->orders()->completed()->get() as $order)--}}
{{--                                            @if($order->products()->getProducts()->get()->isEmpty())--}}
{{--                                                @continue--}}
{{--                                            @endif--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <span>{{ $order->id }}</span>--}}
{{--                                                </td>--}}
{{--                                                <td>{{ $order->total_price }}€</td>--}}
{{--                                                <td>--}}
{{--                                                    <span class="tag is-rounded" style="color: white; background-color: {{ $order->status->color ?? null }}">{{ $order->status->status ?? __('unknown') }}</span>--}}
{{--                                                </td>--}}
{{--                                                <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>--}}
{{--                                                <td>--}}
{{--                                                    <ul class="bg-gray-100 p-2">--}}
{{--                                                        @foreach($order->products()->getProducts()->get() as $product)--}}
{{--                                                            <li>--}}
{{--                                                                {{ $product->quantity }}x {{ $product->product_title }} ({{ $product->product_price }} €)--}}
{{--                                                            </li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ul>--}}
{{--                                                </td >--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Third tab-->
{{--                    <div id="role-tab3" class="tab-content @if($selectedTab == 3) is-active @endif">--}}
                        <form method="POST" wire:submit.prevent="{{ $formAction ?? 'store' }}">
                            @csrf
                            <div class="form-body">
                                <div class="columns is-multiline">
                                    <!--Fieldset-->
                                    <div class="column is-6">
                                        <x-inputs.group for="name" value="{{ old('name') }}" model="name">
                                            <x-slot name="title">{{ __('First name') }}</x-slot>
                                        </x-inputs.group>
                                    </div>

                                    <!--Fieldset-->
                                    <div class="column is-6">
                                        <x-inputs.group for="lastname" value="{{ old('lastname') }}" model="lastname">
                                            <x-slot name="title">{{ __('Last name') }}</x-slot>
                                        </x-inputs.group>
                                    </div>

                                    <!--Fieldset-->
                                    <div class="column is-6">
                                        <x-inputs.group for="email" value="{{ old('email') }}" model="email">
                                            <x-slot name="title">{{ __('Email') }}</x-slot>
                                        </x-inputs.group>
                                    </div>

                                    <!--Fieldset-->
                                    <div class="column is-6">
                                        <x-inputs.group for="phone" value="{{ old('phone') }}" model="phone">
                                            <x-slot name="title">{{ __('Phone') }}</x-slot>
                                        </x-inputs.group>
                                    </div>

                                    <!--Fieldset-->
                                    <div class="column is-6">
                                        <div class="columns is-centered m-t-5">
                                            <x-inputs.switcher for="active" value="1" model="active">
                                                <x-slot name="title">{{ __('Active?') }}</x-slot>
                                            </x-inputs.switcher>
                                        </div>
                                    </div>

                                    <!--Fieldset-->
                                    <div class="column is-6">
                                        <label class="checkbox is-outlined is-danger">
                                            <input type="checkbox" wire:model="generatePassword" value="1">
                                            <span></span>
                                            <span class="text-h-red">Generate new password for a client?</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="has-text-right">
                                    <button id="save-button" class="button h-button is-primary is-raised">
                                        {{ $formSubmitButtonText ?? 'store' }}
                                    </button>
                                </div>

                            </div>
                        </form>
{{--                    </div>--}}
                </div>

            </div>
        </div>
    </div>
</div>

@push('styles_after')
    <link rel="stylesheet" href="{{ mix('assets/css/livewire-datatables.css') }}">
@endpush

