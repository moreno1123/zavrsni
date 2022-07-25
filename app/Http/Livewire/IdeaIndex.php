<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaIndex extends Component
{
    public $idea;
    public $votes;
    public $hasVoted;

    public function mount(Idea $idea)
    {
        $this->hasVoted = $idea->voted_by_user;
    }

    public function render()
    {
        return view('livewire.idea-index');
    }
}
