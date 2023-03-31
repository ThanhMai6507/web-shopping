<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class Sort extends Component
{
    public $sortName;
    public $columnTitle;

    public function __construct($sortName, $columnTitle)
    {
        $this->sortName = $sortName;
        $this->columnTitle = $columnTitle;
    }

    public function render()
    {
        return view('components.sort');
    }
}
