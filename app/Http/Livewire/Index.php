<?php

namespace App\Http\Livewire;

use App\Models\Todos;
use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{
    public $content, $status, $selected_id, $message, $updateMode = false;
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
        $this->message = "Todo added successfully!";
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
            $todo = Todos::find($this->selected_id);
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
            $this->message = "Deleted";
        }
    }
    public function render()
    {
        $todos = Todos::orderBy('created_at', 'DESC')->get();
        return view('livewire.index', compact('todos'));
    }
}
