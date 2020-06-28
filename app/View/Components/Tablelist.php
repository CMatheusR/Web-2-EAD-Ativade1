<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tablelist extends Component
{
    public $header;
    public $data;

    /**
     * Tablelist constructor.
     * @param $header
     * @param $data
     */
    public function __construct($header, $data)
    {
        $this->header = $header;
        $this->data = $data;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tablelist');
    }
}
