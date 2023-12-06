<?php

namespace App\Services\Book;

use App\Models\Table\BookTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class BookService extends AppService implements AppServiceInterface
{
    public function __construct(BookTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return BookTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return BookTable::findOrFail($id);
    }

    public function getAll()
    {
        return BookTable::all();
    }

    public function getBookCover()
    {
        return BookTable::where('image')->get();
    }
    public function create($data)
    {
        return BookTable::create($data);
    }

    public function update($id, $data)
    {
        $row = BookTable::findOrFail($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = BookTable::findOrFail($id);
        $row->delete();
        return $row;
    }
}
