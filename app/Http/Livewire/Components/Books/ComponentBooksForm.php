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

    public $book_id;
    protected function rules()
    {
        $rules = [
            'code' => 'required',
            'title' => 'required|string',
            'writer' => 'required|string',
            'isbn' => 'required|string',
            'stock' => 'required|string',
            'synopsis' => 'required|max:155',
            'image' => 'required|image|max:2048|mimes:jpg,png,jpeg',
        ];
        return $rules;
    }
    public function mount($book_id = null, BookService $book_service)
    {
        $this->book_id = $book_id;
        if ($this->book_id) {
            $this->book = $book_service->getById($this->book_id);
            $this->code = $this->book->code;
            $this->image = $this->book->image;
            $this->title = $this->book->title;
            $this->writer = $this->book->writer;
            $this->isbn = $this->book->isbn;
            $this->stock = $this->book->stock;
            $this->synopsis = $this->book->synopsis;
        }
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
            'code' => $this->code,
            'image' => $image,
            'title' => $this->title,
            'writer' => $this->writer,
            'isbn' => $this->isbn,
            'stock' => $this->stock,
            'synopsis' => $this->synopsis,
        ];
        $book_service->create($data);
        $this->flash('success', 'Book successfully added!', [], route('admin.books.index'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update(BookService $book_service)
    {
        $rules = $this->rules();
        if ($this->image) {
            $rules['image'] = 'nullable';
        }
        $this->validate($rules);
        $data = [
            'code' => $this->code,
            'title' => $this->title,
            'writer' => $this->writer,
            'isbn' => $this->isbn,
            'stock' => $this->stock,
            'synopsis' => $this->synopsis,
        ];
        if (!is_string($this->image) && $this->image != null) {
            $image = $this->image->store('images', 'public');
            $data['image'] = $image;
        }
        $book_service->update($this->book_id, $data);
        $this->flash('success', 'Book have been updated', [], route('admin.books.index'));
    }

    public function destroy(BookService $book_service)
    {
        $book_service->delete($this->book_id);
        $this->flash('success', 'Book have been deleted', [], route('admin.books.index'));
    }

    public function openDeleteModal()
    {
        $this->dispatchBrowserEvent('openDeleteModal');
    }
}
