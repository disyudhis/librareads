<?php

namespace App\Http\Livewire\Components\Books;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Book\BookService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ComponentBooksForm extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $image, $title, $writer, $isbn, $stock, $synopsis, $code;

    protected function rules()
    {
        $rules = [
            'code'     => 'required',
            'image'    => 'required|image',
            'title'    => 'required|string',
            'writer'   => 'required|string',
            'isbn'     => 'required|string',
            'stock'    => 'required|string',
            'synopsis' => 'required|max:155',
        ];
        return $rules;
    }
    public function render()
    {
        return view('livewire.components.books.component-books-form');
    }

    public function store(BookService $book_service)
    {
        $this->validate();
        if ($this->image) {
            $image = $this->image->store('images', 'public');
        }
        $data = [
            'code'     => $this->code,
            'image'    => $image,
            'title'    => $this->title,
            'writer'   => $this->writer,
            'isbn'     => $this->isbn,
            'stock'    => $this->stock,
            'synopsis' => $this->synopsis,
        ];
        $book_service->create($data);
        $this->flash('success', 'Book successfully added!', [], route('admin.books.index'));
    }
}
