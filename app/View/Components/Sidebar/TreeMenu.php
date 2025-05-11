<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class TreeMenu extends Component
{
    public $title;
    public $icon;
    public $menuKeys;
    public $activeMenu;

    public function __construct($title, $icon = 'fas fa-folder', $menuKeys = [], $activeMenu = '')
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->menuKeys = $menuKeys;
        $this->activeMenu = $activeMenu;
    }

    public function render()
    {
        return view('components.sidebar.tree-menu');
    }
}
