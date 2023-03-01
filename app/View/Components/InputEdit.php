<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputEdit extends Component
{
    public $type;
    public $name;
    public $value;
    public $id;
    public $table;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $value, $id, $table)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->id = $id;
        $this->table = $table;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-edit');
    }
}
