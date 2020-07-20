<?php

namespace OilSeller\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class OilAppSelect extends Component
{
    public $currentApp;

    public function __construct()
    {
        $this->currentApp = Cookie::get('currentApp');
        // $this->apps = app()
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('oilseller::livewire.app-select');
    }
}
