<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditIdea extends Component
{
    use WithFileUploads;

    public $idea;
    public $title;
    public $category;
    public $description;
    public $fileName;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4',
        'fileName' => 'nullable|image|max:10000',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category_id;
        $this->description = $idea->description;
    }

    public function updateIdea()
    {
        if (auth()->guest() || auth()->user()->cannot('update', $this->idea)) {
            abort(403);
        }

        $this->validate();

        $this->idea->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description,
            'fileName' => $this->fileName ? $this->fileName->hashName() : 'no-photo',
        ]);

        if (!empty($this->fileName)) {
            $this->fileName->store('images', 'public');
        };

        $this->emit('ideaWasUpdated', 'Ideja je uspješno ažurirana!');
    }

    public function render()
    {
        return view('livewire.edit-idea', [
            'categories' => Category::all(),
        ]);
    }
}
