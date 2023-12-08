<?php

namespace App\Http\Livewire\Components\Dashboard;

use App\Services\Book\BookService;
use Livewire\Component;

class ComponentDashboardDetail extends Component
{
    public $book_id;

    public $book;

    public function mount($id, BookService $book_service)
    {
        $this->book_id = $id;
        $this->book = $book_service->getById($id);
    }
    public function render()
    {
        return view('livewire.components.dashboard.component-dashboard-detail');
    }
}
