<?php

namespace App\Http\Livewire\Pages\Admin\Books;

use Livewire\Component;

class AdminBooksManage extends Component
{
    public $page_title = 'Add Book | Admin LibraReads';
    public $page_name = 'Add Book';
    public function render()
    {
        return view('livewire.pages.admin.books.admin-books-manage')
            ->extends('layouts.admin')
            ->section('content');
    }
}
