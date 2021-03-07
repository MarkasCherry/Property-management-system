<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SeoSettings extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $model;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.seo-settings');
    }
}
