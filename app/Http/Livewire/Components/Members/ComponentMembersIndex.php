<?php

namespace App\Http\Livewire\Components\Members;

use App\Services\Member\MemberService;
use Livewire\Component;

class ComponentMembersIndex extends Component
{
    public function render(MemberService $member_service)
    {
        $members = $member_service->getMemberOnly();
        return view('livewire.components.members.component-members-index', compact('members'));
    }
}
