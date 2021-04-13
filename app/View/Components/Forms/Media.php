<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Media extends Component
{
    public $model;
    public $modelId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model = null, $modelId = null)
    {
        $this->model = $model;
        $this->modelId = $modelId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.media');
    }
}
