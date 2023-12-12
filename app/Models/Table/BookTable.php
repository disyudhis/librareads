<?php

namespace App\Models\Table;

use App\Models\Entity\Book;

class BookTable extends Book
{
    public function loans()
    {
        return $this->hasMany(LoanTable::class, 'book_id');
    }

    public function stocks()
    {
        return $this->hasMany(StockTable::class, 'book_id');
    }
}
