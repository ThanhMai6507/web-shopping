<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class Sort extends Component
{
    public $sortName;

    public function __construct($sortName)
    {
        $this->sortName = $sortName;
    }

    public function render()
    {
        return view('components.sort');
    }
}
