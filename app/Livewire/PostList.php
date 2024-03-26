<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;



    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    #[Url()]
    public $role = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();

    }

    public function clearFilters() {
        $this->search = '';
        $this->category = '';
        $this->role = '';
        $this->resetPage();
    }

    #[Computed()]
    public function posts()
    {


        return Post::orderBy('published_at',$this->sort)
            ->when($this->activeCategory(), function($query) {
                $query->withCategory($this->category);
            })

            ->where('title', 'like', "%{$this->search}%")

            ->when($this->activeRole(), function($query) {
                $query->whereHas('author', function($q) {
                    $q->where('role', $this->role);
                });
            })
            ->where('published_at', '<=', now())
            ->where('approved', 1)
            ->paginate(10);
    }

    #[Computed()]
    public function activeCategory()
    {
        return Category::where('slug', $this->category)->first();
    }

    #[Computed()]
    public function activeRole()
    {
        return User::where('role', $this->role)->first();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
