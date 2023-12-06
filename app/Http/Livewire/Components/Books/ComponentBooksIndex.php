<?php

namespace App\Http\Livewire\Components\Books;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Services\Book\BookService;
use Livewire\WithPagination;

class ComponentBooksIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(BookService $book_service)
    {
        $books = $book_service->dataTable(
            new Request([
                'entries' => 12,
                'sort_type' => 'DESC',
            ]),
        );

        return view('livewire.components.books.component-books-index', compact('books'));
    }
}
