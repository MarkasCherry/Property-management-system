@component('mail::message')
    @if($breakfastNeeded > 0)
        <p>For today kitchen needs to prepare breakfast for at least <b>{{ $breakfastNeeded }}</b> people</p>
    @else
        <p>Today kitchen <b>does not need</b> to prepare breakfast</p>
    @endif
@endcomponent
