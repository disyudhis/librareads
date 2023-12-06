<?php

namespace App\Http\Livewire\Pages\Admin\Members;

use Livewire\Component;

class AdminMembersManage extends Component
{
    public $page_title = 'Add Member | Admin LibraReads';
    public $page_name = 'Add Member';
    public function render()
    {
        return view('livewire.pages.admin.members.admin-members-manage')
            ->extends('layouts.admin')
            ->section('content');
    }
}
