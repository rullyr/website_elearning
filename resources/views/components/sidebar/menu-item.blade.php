<li class="nav-item">
    <a href="{{ $href }}" class="nav-link {{ $active ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            @if ($badge)
                {!! $badge !!}
            @endif
        </p>
    </a>
</li>
