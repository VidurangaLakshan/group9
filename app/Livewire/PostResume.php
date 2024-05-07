<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostResume extends Component
{
    public Job $job;

    #[Rule('required')]
    public string $resume;


    #[Computed()]
    public function resumes()
    {
        return $this?->job?->resumes()->get();
    }


    public function render()
    {
        return view('livewire.post-resume');
    }
}
