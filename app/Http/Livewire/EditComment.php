<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditComment extends Component
{
    use WithFileUploads;

    public Comment $comment;
    public $body;
    public $fileName;

    protected $rules = [
        'body' => 'required|min:4',
        'fileName' => 'nullable|image|max:10000',
    ];

    protected $listeners = ['setEditComment'];

    public function setEditComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);
        $this->body = $this->comment->body;
        $this->comment->update([
            'fileName' => null,
        ]);

        $this->emit('editCommentWasSet');
    }

    public function updateComment()
    {
        if (auth()->guest() || auth()->user()->cannot('update', $this->comment)) {
            abort(403);
        }

        $this->validate();

        $this->comment->update([
            'body' => $this->body,
            'fileName' => $this->fileName ? $this->fileName->hashName() : 'no-photo',
        ]);

        if (!empty($this->fileName)) {
            $this->fileName->store('images', 'public');
        };

        $this->comment->save();

        $this->emit('commentWasUpdated', 'Komentar je ažuriran!');
    }

    public function render()
    {
        return view('livewire.edit-comment');
    }
}
