<?php

namespace App\Models\Table;

use App\Models\Entity\Book;

class BookTable extends Book
{
    public function transactions()
    {
        return $this->hasMany(TransactionTable::class, 'book_id');
    }
}
