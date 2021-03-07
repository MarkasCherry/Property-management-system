<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Tabs extends Component
{
    protected $tabs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $tabs)
    {
        $this->constructTabNames($tabs);
    }

    protected function constructTabNames(array $tabs)
    {
        foreach ($tabs as $tab) {
            $names = preg_split('/(?=[A-Z])/', $tab);
            $lastName = array_key_last($names);

            $tabName = '';

            foreach ($names as $key => $name) {
                if ($key == 0) {
                    $name = ucfirst($name);
                } else {
                    $name = lcfirst($name);
                }

                $tabName .= $name;

                if ($key !== $lastName) {
                    $tabName .= ' ';
                }
            }

            array_push($this->tabs, [
                'key' => $tab,
                'name' => $tabName,
            ]);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.ui.tabs', ['tabs' => $this->tabs]);
    }
}
