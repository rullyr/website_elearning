@props(['title', 'icon' => 'fas fa-folder', 'menuKeys' => [], 'activeMenu' => ''])

<li class="nav-item {{ in_array($activeMenu, $menuKeys) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array($activeMenu, $menuKeys) ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
