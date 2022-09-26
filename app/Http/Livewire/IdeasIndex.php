<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public $category;
    public $filter;
    public $search;

    protected $queryString = [
        'category',
        'filter',
        'search',
    ];

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilter()
    {
        if ($this->filter === 'My Ideas') {
            if (!auth()->check()) {
                return redirect(route('login'));
            }
        }
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.ideas-index', [
            'ideas' => Idea::with('user', 'category')
                ->when($this->category && $this->category !== 'Sve kategorije', function ($query) use ($categories) {
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })->when($this->filter === 'Najvise glasova', function ($query) {
                    return $query->orderBy('votes_count', 'desc');
                })->when($this->filter === 'Najstarije ideje', function ($query) {
                    return $query->orderBy('id', 'asc');
                })->when($this->filter === 'Galerija', function ($query) {
                    return $query->where('fileName', '!=', null);
                })->when($this->filter === 'Moje ideje', function ($query) {
                    return $query->where('user_id', auth()->id());
                })->when($this->filter === 'Spam ideje', function ($query) {
                    return $query->where('spam_reports', '>', 0)->orderByDesc('spam_reports');
                })->when($this->filter === 'Spam komentari', function ($query) {
                    return $query->whereHas('comments', function ($query) {
                        $query->where('spam_reports', '>', 0);
                    });
                })->when(strlen($this->search) >= 3, function ($query) {
                    return $query->where('filetitle', 'like', '%' . $this->search . '%')->orWhere('title', 'like', '%' . $this->search . '%');
                })
                ->addSelect([
                    'voted_by_user' => Vote::select('id')
                        ->where('user_id', auth()->id())
                        ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->withCount('comments')
                ->orderBy('id', 'desc')
                ->simplePaginate()
                ->withQueryString(),
            'categories' => $categories,
        ]);
    }
}
