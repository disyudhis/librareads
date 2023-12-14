<?php

namespace App\Services\Returning;

use App\Models\Table\ReturningTable;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class ReturningService extends AppService implements AppServiceInterface
{

    public function __construct(ReturningTable $model)
    {
        parent::__construct($model);
    }


    public function dataTable($filter)
    {
        return ReturningTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return ReturningTable::findOrFail($id);
    }

    public function create($data)
    {
        return ReturningTable::create($data);
    }

    public function update($id, $data)
    {
        $row = ReturningTable::findOrFail($id);
        $row->update([
            'name' => $data['name'],
        ]);
        return $row;
    }

    public function delete($id)
    {
        $row = ReturningTable::findOrFail($id);
        $row->delete();
        return $row;
    }
}
