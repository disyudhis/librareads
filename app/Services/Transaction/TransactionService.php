<?php

namespace App\Services\Transaction;

use App\Models\Table\TransactionTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class TransactionService extends AppService implements AppServiceInterface
{

    public function __construct(TransactionTable $model)
    {
        parent::__construct($model);
    }


    public function dataTable($filter)
    {
        return TransactionTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return TransactionTable::findOrFail($id);
    }

    public function create($data)
    {
        return TransactionTable::create([
            'name' => $data['name'],
        ]);
    }

    public function update($id, $data)
    {
        $row = TransactionTable::findOrFail($id);
        $row->update([
            'name' => $data['name'],
        ]);
        return $row;
    }

    public function delete($id)
    {
        $row = TransactionTable::findOrFail($id);
        $row->delete();
        return $row;
    }
}
