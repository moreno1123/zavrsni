<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;
    public $votes;
    public $hasVoted;

    public function mount(Idea $idea)
    {
        $this->hasVoted = $idea->isVoted(auth()->user());
    }

    public function render()
    {
        return view('livewire.idea-show');
    }
}
