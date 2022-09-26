<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class GaleryIndex extends Component
{
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.galery-index');
    }
}
