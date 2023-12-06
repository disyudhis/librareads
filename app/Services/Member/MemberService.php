<?php

namespace App\Services\Member;

use App\Models\Table\MemberTable;
use App\Models\User;
use App\Services\AppService;
use App\Services\AppServiceInterface;

class MemberService extends AppService implements AppServiceInterface
{
    public function __construct(MemberTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return MemberTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function getById($id)
    {
        return MemberTable::findOrFail($id);
    }

    public function getMemberOnly()
    {
        return User::where('role', User::ROLE_MEMBER)->get();
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function update($id, $data)
    {
        $row = MemberTable::findOrFail($id);
        $row->update([
            'name' => $data['name'],
        ]);
        return $row;
    }

    public function delete($id)
    {
        $row = MemberTable::findOrFail($id);
        $row->delete();
        return $row;
    }
}
