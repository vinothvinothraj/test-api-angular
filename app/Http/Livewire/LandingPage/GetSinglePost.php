<?php

namespace App\Http\Livewire\LandingPage;

use Livewire\Component;

class GetSinglePost extends Component
{
    public function render()
    {
        return view('livewire.landing-page.get-single-post')->layout('layouts.main');
    }
}
