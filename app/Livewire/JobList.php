<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class JobList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';


    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }


    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();

    }

    public function clearFilters() {
        $this->search = '';
        $this->resetPage();
    }

    #[Computed()]
    public function jobs()
    {
        return Job::orderBy('created_at',$this->sort)

            ->where('name', 'like', "%{$this->search}%")
            ->where('approved', 1)
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.job-list');
    }
}
