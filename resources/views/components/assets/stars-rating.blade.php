<div>
    <span class="rating p-t-10">
        <i class="fas fa-star @if(round($attributes->get('rating'), 0) >= 1) active @endif"></i>
        <i class="fas fa-star @if(round($attributes->get('rating'), 0) >= 2) active @endif"></i>
        <i class="fas fa-star @if(round($attributes->get('rating'), 0) >= 3) active @endif"></i>
        <i class="fas fa-star @if(round($attributes->get('rating'), 0) >= 4) active @endif"></i>
        <i class="fas fa-star @if(round($attributes->get('rating'), 0) >= 5) active @endif"></i>
    </span>
</div>
