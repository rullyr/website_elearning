<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $href;
    public $title;
    public $icon;
    public $active;
    public $badge;

    /**
     * Create a new component instance.
     *
     * @param string $href
     * @param string $title
     * @param string $icon
     * @param bool $active
     * @param string|null $badge
     */
    public function __construct($href, $title, $icon, $active = false, $badge = null)
    {
        $this->href = $href;
        $this->title = $title;
        $this->icon = $icon;
        $this->active = $active;
        $this->badge = $badge;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar.menu-item');
    }
}
