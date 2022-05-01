<?php

namespace App\Http\Livewire;

use App\Models\Todos;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $content, $status, $selected_id, $message, $searchContent, $searchCreatedAt, $searchUpdatedAt, $updateMode = false;

    public function add()
    {
        $this->validate([
            'content' => 'required|max:255'
        ]);
        $this->status = $this->status ? 1 : 0;

        $todo = Todos::create([
            'content' => $this->content,
            'status' => $this->status
        ]);
        if ($todo) {
            $this->content = null;
            $this->status = null;
            $this->message = "Todo added successfully!";
        }
    }
    public function resetInput()
    {
        $this->content = null;
        $this->status = null;
        $this->updateMode = false;
        $this->message = "Resetted";
    }
    public function edit($id)
    {
        $this->message = null;
        $todo = Todos::findOrFail($id);
        $this->selected_id = $id;
        $this->content = $todo->content;
        $this->status = $todo->status ? 1 : 0;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'content' => 'required|max:255'
        ]);
        if ($this->selected_id) {
            $todo = Todos::findOrFail($this->selected_id);
            $todo->update([
                'content' => $this->content,
                'status' => $this->status ? 1 : 0
            ]);

            $this->resetInput();
            $this->message = "Updated!";
        }
    }
    public function delete($id)
    {
        if ($id) {
            $todo = Todos::destroy($id);
            $this->resetInput();
            $this->message = "Deleted";
        }
    }
    public function clear()
    {
        $this->message = null;
    }
    public function render()
    {
        if ($this->searchContent) {
            $this->message = null;
            $todos = Todos::where('content', 'like', '%' . $this->searchContent . '%')->paginate(5);
            return view('livewire.index', compact('todos'));
        } else if ($this->searchCreatedAt) {
            $this->message = null;
            $todos = Todos::where('created_at', 'like', '%' . $this->searchCreatedAt . '%')->paginate(5);
            return view('livewire.index', compact('todos'));
        } else if ($this->searchUpdatedAt) {
            $this->message = null;
            $todos = Todos::where('updated_at', 'like', '%' . $this->searchUpdatedAt . '%')->paginate(5);
            return view('livewire.index', compact('todos'));
        } else {
            $todos = Todos::orderBy('created_at', 'DESC')->paginate(5);
            return view('livewire.index', compact('todos'));
        }
    }
}
