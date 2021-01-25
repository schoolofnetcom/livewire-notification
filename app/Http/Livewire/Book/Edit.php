<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Book;

class Edit extends Component
{
    public Book $book;
    public $saved = false;

    protected $rules = [
        'book.name' => 'required|string',
        'book.pages' => 'required|integer',
        'book.author' => 'required|string',
    ];

    public function mount(Book $book) {
        $this->book = $book;
    }

    public function updated($field) {
        if($field != "saved") {
            $this->saved = false;
        }
    }

    // public function closeMessage() {
    //     $this->saved = false;
    // }

    public function save() {
        $this->validate();
        $this->book->update($this->book->toArray());
        $this->saved = true;
    }

    public function render()
    {
        return view('livewire.book.edit');
    }
}
