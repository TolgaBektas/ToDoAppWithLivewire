<?php

namespace App\Http\Livewire;

use App\Models\Todos;
use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{
    public $content, $status;
    public function add()
    {
        $this->validate([
            'content' => 'required|max:255'
        ]);
        $this->status = $this->status ? 1 : 0;

        Todos::create([
            'content' => $this->content,
            'status' => $this->status
        ]);
        $this->content = null;
        $this->status = null;
    }
    public function render()
    {
        $todos = Todos::orderBy('created_at', 'DESC')->get();
        return view('livewire.index', compact('todos'));
    }
}
