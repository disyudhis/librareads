<?php

namespace App\Models\Table;

use App\Models\Entity\Transaction;

class TransactionTable extends Transaction
{
    public function libraries()
    {
        return $this->hasMany(LibraryTable::class, 'transaction_id');
    }

    public function book()
    {
        return $this->belongsTo(BookTable::class);
    }
}
