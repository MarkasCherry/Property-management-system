<div class="field has-text-centered">
    <x-jet-label for="{{ $attributes->get('for') }}" value="{{ $title }}"/>
    <div id="full-stars-example-two">
        <div class="rating-group">
            <input disabled @if(is_null(old($attributes->get('name')))) checked @endif class="rating__input rating__input--none" name="{{ $attributes->get('name') }}" id="rating3-none" value="0" type="radio">
            @for($stars = 1; $stars < 6; $stars++)
                <label aria-label="{{ $stars }} star" class="rating__label" for="rating3-{{ $stars }}">
                    <i class="rating__icon rating__icon--star fa fa-star"></i>
                </label>
                <input @if(old($attributes->get('name'), $attributes->get('value')) == $stars) checked @endif class="rating__input" name="{{ $attributes->get('name') }}" id="rating3-{{ $stars }}" value="{{ $stars }}" type="radio">
            @endfor
        </div>
    </div>
    <x-jet-input-error for="{{ $attributes->get('name') }}" class="mt-2"/>
</div>
