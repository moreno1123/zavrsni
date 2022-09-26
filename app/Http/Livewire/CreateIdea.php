<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateIdea extends Component
{
    use WithFileUploads;

    public $title;
    public $category = 1;
    public $description;
    public $filename;
    public $filetitle;

    public function createIdea()
    {
        if (auth()->guest()) {
            abort(403);
        }

        $this->validate([
            'title' => 'required|min:4',
            'category' => 'nullable|integer|exists:categories,id',
            'description' => 'required|min:4',
            'filetitle' => 'nullable|min:4',
            'filename' => 'required_with:filetitle'
        ]);

        $idea = Idea::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'title' => $this->title,
            'description' => $this->description,
            'filetitle' => $this->filetitle,
            'fileName' => $this->filename ? $this->filename->hashName() : null,
        ]);

        if (!empty($this->filename)) {
            $this->filename->store('images', 'public');
        };

        $idea->vote(auth()->user());

        session()->flash('success_message', 'Ideja je uspješno kreirana!');

        $this->reset();

        return redirect()->route('idea.index');
    }

    public function render()
    {
        return view('livewire.create-idea', [
            'categories' => Category::all(),
        ]);
    }
}
