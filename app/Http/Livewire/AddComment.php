<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddComment extends Component
{
    use WithFileUploads;

    public $idea;
    public $comment;
    public $fileName;

    protected $rules = [
        'comment' => 'required|min:4',
        'fileName' => 'nullable',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function addComment()
    {
        if (auth()->guest()) {
            abort(403);
        }

        $this->validate();

        Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'body' => $this->comment,
            'fileName' => $this->fileName ? $this->fileName->hashName() : 'no-photo',
        ]);

        if (!empty($this->fileName)) {
            $this->fileName->store('images', 'public');
        };
        $this->reset('comment');

        $this->emit('commentWasAdded', 'Komentar je dodan!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
