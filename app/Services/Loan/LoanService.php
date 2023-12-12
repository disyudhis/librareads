<?php

namespace App\Services\Loan;

use App\Models\Table\LoanTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class LoanService extends AppService implements AppServiceInterface
{

    public function __construct(LoanTable $model)
    {
        parent::__construct($model);
    }


    public function dataTable($filter)
    {
        return LoanTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return LoanTable::find($id);
    }

    public function getStatusLoan($id) {
        return LoanTable::where('book_id', $id)->get();
    }

    public function create($data)
    {
        return LoanTable::create($data);
    }

    public function update($id, $data)
    {
        $row = LoanTable::findOrFail($id);
        $row->update([
            'name' => $data['name'],
        ]);
        return $row;
    }

    public function delete($id)
    {
        $row = LoanTable::findOrFail($id);
        $row->delete();
        return $row;
    }
}
