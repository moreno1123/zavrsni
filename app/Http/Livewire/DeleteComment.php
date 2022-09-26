<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class DeleteComment extends Component
{
    public ?Comment $comment;

    protected $listeners = ['setDeleteComment'];

    public function setDeleteComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);

        $this->emit('deleteCommentWasSet');
    }

    public function deleteComment()
    {
        if (auth()->guest() || auth()->user()->cannot('delete', $this->comment)) {
            abort(403);
        }

        Comment::destroy($this->comment->id);
        $this->comment = null;

        $this->emit('commentWasDeleted', 'Komentar je izbrisan!');
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
