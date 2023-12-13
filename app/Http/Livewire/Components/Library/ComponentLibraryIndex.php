<?php

namespace App\Http\Livewire\Components\Library;

use App\Services\Loan\LoanService;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Services\Book\BookService;

class ComponentLibraryIndex extends Component
{
    public $search;

    protected $listeners = [
        'searchBook' => 'searchBook',
    ];

    public function render(LoanService $loan_service)
    {
        $loans = $loan_service->dataTable(
            new Request([
                'entries' => 12,
                'sort_type' => 'DESC',
                'search_columns' => 'stock.book.title',
                'search_key' => $this->search,
            ]),
        );
        return view('livewire.components.library.component-library-index', compact('loans'));
    }

    public function searchBook($search)
    {
        $this->search = $search;
    }
}
